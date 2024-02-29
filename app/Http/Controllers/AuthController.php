<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credenciais = $request->all('email','password');
        $token = auth('api')->attempt($credenciais); // retorna o token
        
        if($token) { //USUARIO AUTENTICADO
            return response()->json(['token' => $token], 200);
        }else {//ERRO DE LOGIN OU SENHA
            return response()->json(['ERRO' => 'Usuário ou senha inválido'], 403); //ERRO 403 => FORBIDDEN OU PROIBIDO
        }
        return 'login';
    }
    public function logout()
    {
        auth('api')->logout();
        return response()->json(['msg' => 'Logout realizado com sucesso']);
    }

    //ATUALIZA O TOKEN DE SEGURANÇA
    public function refresh()
    {
        $token = auth('api')->refresh(); //Cliente encaminhe um JWT válido
        return response()->json(['token' => $token]);
    }

    //RETORNA AS INFORMAÇÕES DO USUÁRIO LOGADO
    public function me()
    {
        return response()->json(auth()->user());
    }
}
