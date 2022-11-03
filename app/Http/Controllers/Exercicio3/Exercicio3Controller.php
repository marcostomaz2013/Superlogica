<?php

namespace App\Http\Controllers\Exercicio3;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\Info;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;

class Exercicio3Controller extends Controller
{
    //Retorna a tela do exercicio 2
    public function index()
    {
        try{
            $users = Usuario::all();
            $info = Info::all();
            $result = Usuario::select([
                DB::raw('concat(usuario.nome, " - ", info.genero) as usuario'),
                DB::raw('if((Year(now()) - info.ano_nascimento)>50,"sim","não" ) as maior_50_anos')
            ])->join('info', 'info.cpf', '=', 'usuario.cpf')->get();            
            return view('pages.exercicio3.indexExercicio3', ['users'=>$users, 'info'=>$info, 'result' =>$result]);
        }catch(Exception $e){

        }
    }   
}
