<?php

namespace App\Http\Controllers;

use App\Models\Produto;
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
        return view('produto.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:20',
            'quantidade' => 'required',
            'marca' => 'required|max:20',
            'preco' => 'required',
            'categoria' => 'required|max:20'
        ]);

        Produto::create([
            'nome' => $request->get('nome'),
            'quantidade' => $request->get('quantidade'),
            'marca' => $request->get('marca'),
            'preco' => $request->get('preco'),
            'categoria' => $request->get('categoria'),
        ]);

        return redirect('produto');
    }

    public function edit($id)
    {
        $produtos = Produto::findOrFail($id);

        return view('produto.edit',['produto' => $produtos]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:20',
            'quantidade' => 'required',
            'marca' => 'required|max:20',
            'preco' => 'required',
            'categoria' => 'required|max:20'
        ]);

        $produtos = Produto::findOrFail($id);
        $produtos->nome = $request->get('nome');
        $produtos->quantidade = $request->get('quantidade');
        $produtos->marca = $request->get('marca');
        $produtos->preco = $request->get('preco');
        $produtos->categoria = $request->get('categoria');
        $produtos->save();

        return redirect('produto');
    }

    public function destroy($id)
    {
        Produto::destroy($id);
        return redirect('produto');
    }
}
