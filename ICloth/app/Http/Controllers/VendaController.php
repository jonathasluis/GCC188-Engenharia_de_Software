<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\ProdutoVenda;
use App\Models\Venda;

class VendaController extends Controller
{

    public function index()
    {
        $vendas = Venda::all();
        return view('venda.tabela',['vendas' => $vendas]);
    }

   
    public function create()
    {
        $clientes = Cliente::all();
        $produtos = Produto::where('quantidade','>','0')->get();
        return view('venda.create',['clientes' => $clientes,'produtos' => $produtos]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'data' => 'required',
            'cliente' => 'required'
        ]);
        $produtos = $request->get('produto');
        $quantidades = $request->get('quantidade');
        $valor = 0.0;
        $venda = new Venda([
            'data' => $request->get('data'),
            'cliente_id' => $request->get('cliente'),
            'user_id' => 1,
            'valor' => 0
        ]);

        $venda->save();
        if($produtos != null){
            for($i = 0; $i < count($produtos);$i++){
                $produto = Produto::findOrFail($produtos[$i]);
                if($produto->quantidade < $quantidades[$i]){
                    foreach($venda->produtos as $vendaProduto){
                        $vendaProduto->produto->quantidade += $vendaProduto->quantidade;
                        $vendaProduto->produto->save();
                    }
                    $venda->delete();
                    return back()->withInput()->withErrors("O produto {$produto->nome} possui apenas {$produto->quantidade} unidades");
                }
                
                $produto->quantidade -= $quantidades[$i];
                $produto->save();
                
                $valor += $produto->preco * $quantidades[$i];

                ProdutoVenda::create([
                    'quantidade' => $quantidades[$i],
                    'venda_id' => $venda->id,
                    'produto_id' => $produto->id
                ]);
            }
        } else {
            $venda->delete();
            return back()->withInput()->withErrors("Selecione pelo menos um produto!");
        }

        $venda->valor = $valor;
        $venda->save();

        return redirect('venda');
    }

    public function edit($id)
    {
        $venda = Venda::findOrFail($id);
        $clientes = Cliente::all();
        $produtos = Produto::where('quantidade','>','0')->get();
        $produtosVenda = ProdutoVenda::where('venda_id','=',$id)->get();
        return view('venda.edit',['clientes' => $clientes,'produtos' => $produtos,'venda' => $venda,'produtosVenda' => $produtosVenda]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'data' => 'required',
            'cliente' => 'required'
        ]);
        $produtos = $request->get('produto');
        $quantidades = $request->get('quantidade');
        $valor = 0.0;
        $venda = Venda::findOrFail($id);
        $venda->data = $request->get('data');
        $venda->cliente_id = $request->get('cliente');

        if($produtos != null){
            foreach($venda->produtos as $vendaProduto){
                $vendaProduto->produto->quantidade += $vendaProduto->quantidade;
                $vendaProduto->produto->save();
                $vendaProduto->delete();
            }

            for($i = 0; $i < count($produtos);$i++){
                $produto = Produto::findOrFail($produtos[$i]);
                if($produto->quantidade < $quantidades[$i]){   
                    return back()->withInput()->withErrors("O produto {$produto->nome} possui apenas {$produto->quantidade} unidades");
                }
                
                $produto->quantidade -= $quantidades[$i];
                $produto->save();
                
                $valor += $produto->preco * $quantidades[$i];

                ProdutoVenda::create([
                    'quantidade' => $quantidades[$i],
                    'venda_id' => $venda->id,
                    'produto_id' => $produto->id
                ]);
            }
        }else{
            return back()->withInput()->withErrors("Selecione pelo menos um produto!");
        }

        $venda->valor = $valor;
        $venda->save();

        return redirect('venda');
    }

    public function destroy($id)
    {
        $venda = Venda::findOrFail($id);

        foreach($venda->produtos as $vendaProduto){
            $vendaProduto->produto->quantidade += $vendaProduto->quantidade;
            $vendaProduto->produto->save();
            $vendaProduto->delete();
        }
        
        $venda->delete();
        return redirect('venda');
    }
}
