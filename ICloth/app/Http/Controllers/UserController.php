<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        return view('usuario',['usuario' => $usuario]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'max:11']
        ]);

        $user = User::findORFail( Auth::user()->id);
        $user->name = $request->name;
        $user->cpf = $request->cpf;
        $user->save();
        return redirect('/');
    }
}
