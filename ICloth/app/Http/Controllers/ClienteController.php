<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    
    public function index()
    {
        $clientes = Cliente::all();
        return view('cliente.tabela',['clientes' => $clientes]);
    }

    
    public function create()
    {
        return view('cliente.create');
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:50',
            'cpf' => 'required|unique:App\Models\Cliente,cpf|max:11',
            'endereco' => 'required',
            'telefone' => 'required|max:11'
        ]);

        Cliente::create([
            'nome' => $request->get('nome'),
            'cpf' => $request->get('cpf'),
            'endereco' => $request->get('endereco'),
            'telefone' => $request->get('telefone'),
        ]);

        return redirect('cliente');

    }

    
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('cliente.edit',['cliente' => $cliente]);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:50',
            'cpf' => 'required|max:11',
            'endereco' => 'required',
            'telefone' => 'required|max:11'
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->nome = $request->get('nome');
        $cliente->cpf = $request->get('cpf');
        $cliente->telefone = $request->get('telefone');
        $cliente->endereco = $request->get('endereco');
        $cliente->save();

        return redirect('cliente');

    }


    public function destroy($id)
    {
        Cliente::destroy($id);
        return redirect('cliente');
    }
}
