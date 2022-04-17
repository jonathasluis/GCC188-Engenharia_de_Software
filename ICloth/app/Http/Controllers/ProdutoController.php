<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    public function index()
    {
        $produtos = Produto::all();
        return view('produto.tabela',['produtos' => $produtos]);
    }


    public function create()
    {
        $categorias = Categoria::all();
        return view('produto.create',['categorias' => $categorias]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:20',
            'quantidade' => 'required',
            'marca' => 'required|max:20',
            'preco' => 'required',
            'categoria' => 'required'
        ]);

        Produto::create([
            'nome' => $request->get('nome'),
            'quantidade' => $request->get('quantidade'),
            'marca' => $request->get('marca'),
            'preco' => $request->get('preco'),
            'categoria_id' => $request->get('categoria'),
        ]);

        return redirect('produto');
    }

    public function edit($id)
    {
        $produtos = Produto::findOrFail($id);
        $categorias = Categoria::all();
        return view('produto.edit',['produto' => $produtos,'categorias' => $categorias]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:20',
            'quantidade' => 'required',
            'marca' => 'required|max:20',
            'preco' => 'required',
            'categoria' => 'required'
        ]);

        $produtos = Produto::findOrFail($id);
        $produtos->nome = $request->get('nome');
        $produtos->quantidade = $request->get('quantidade');
        $produtos->marca = $request->get('marca');
        $produtos->preco = $request->get('preco');
        $produtos->categoria_id = $request->get('categoria');
        $produtos->save();

        return redirect('produto');
    }

    public function destroy($id)
    {
        try{
            Produto::destroy($id);  
        }catch(QueryException $e){
            return back()->withInput()->withErrors("Produto cadastrado em uma venda, não é possível excluir!");
        }
        
        return redirect('produto');
    }
}
