<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    
    public function auth(Request $req){
     
        $user = User::where('cpf', $req->cpf)->first();

        if ($user != null) {
            $confirm = Hash::check($req->senha, $user->password);
        } else {
            $confirm = false;
        }
        

        if ($user && $confirm) // se existir um usuário e com a senha correta
        {
            Auth::login($user); //efetuando a operação de autenticação            
        } else {

            $msg = 'Usuário e/ou senha inválidos';
            $arr_err = Array('login' => $msg);

            return Redirect::route('login')->withErrors($arr_err);

        }

        if (Auth::check())
        {
            
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()
            ->json(['user' => $user->name, 'id' => $user->id, 'message' => 'Olá '.$user->name.', seja bem vindo!','access_token' => $token, 'token_type' => 'Bearer', ]);
            
        }

    }

}
