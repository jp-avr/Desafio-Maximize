<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistroRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    public function register(UserRegistroRequest $request)
    {
        $credenciais = $request->only('name', 'email', 'password', 'password_confirmation');

        // Validação dos dados
        $validator = Validator::make($credenciais, ['name', 'email','password']);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Criar o usuário
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json(['message' => 'Usuário registrado com sucesso'], 201);
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
