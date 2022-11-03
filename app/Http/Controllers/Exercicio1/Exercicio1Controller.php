<?php

namespace App\Http\Controllers\Exercicio1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\UserExec1;

class Exercicio1Controller extends Controller
{
    //Retorna o formulário de registro de novo usuário
    public function index()
    {
        return view('pages.exercicio1.indexExercicio1');
    }

    //Cadastra um novo usuário
    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'userName' => 'required',
            'zipCode' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        try {
            $msgError = null;
            $usuario = new UserExec1();
            $usuario->nome_completo = $request->name;
            $usuario->login = $request->userName;
            if (strlen($request->zipCode) == 8 && !preg_match('/[a-zA-Z]/', $request->zipCode) && preg_match('/[0-9]/', $request->zipCode)) {
                $usuario->cep = $request->zipCode;
            } else {
                $msgError .= " Cep incorreto";
            }
            if (preg_match('/[@]/', $request->email) && !preg_match('/[ ]/', $request->email)) {
                $usuario->email = $request->email;
            } else {
                $msgError .= " email inválido!";
            }
            if (preg_match('/[a-zA-Z]/', $request->password) && preg_match('/[0-9]/', $request->password) && strlen($request->password) >= 8) {
                $usuario->senha = $request->password;
            } else {
                $msgError .= " Favor verificar a senha, deve conter no minimo 8 caracteres e ao menos 1 letra e 1 número!";
            }
            if ($msgError != null) {
                return redirect('/exercicio1/indexExercicio1')->withErrors($msgError);
            }
            $usuario->save();
            return redirect('/exercicio1/indexExercicio1')->with('success', 'Usuário registrado com sucesso!');
        } catch (Exeception $e) {
            log::notice("Ocorreu erro  pelo arquivo Exercicio1Controller função save: " . $e->getMessage());
            return redirect('/')->withErrors('Ocorreu um erro ao cadastrar o usuário!');
        }
    }
}
