<?php

namespace App\Http\Controllers\Exercicio2;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use DateTime;

class Exercicio2Controller extends Controller
{
    //Retorna a tela do exercicio 2
    public function index()
    {
        $this->arrayMethods();        
        return view('pages.exercicio2.indexExercicio2');
    }

    //Faz a manipulação do array
    public function arrayMethods()
    {
        try {
            //Criar o objeto Array
            $arr = [];

            //Preenche o array com 7 número aleatórios
            for($i = 0; $i < 7; $i++){
                array_push($arr, rand(0,1000));
            }
            //imprimi a 3 posição do array
            echo "A 3ª posição do array é: ".$arr[2].'<br>';
            //Transforma o array em string
            $arrayToString = implode(',',$arr);
            echo $arrayToString.'<br>';

            //Cria um novo array apartir da string criada e detroi o array anterior
            $stringToArray = explode(',', $arrayToString);            
            unset($arr);            

            //Verifica se possui o valor 14 dentro do array
            //para testar se quiser só descomentar  a linha abaixo:
                //array_push($stringToArray, 14);
            if(array_search(14,$stringToArray)){
                echo "O array possui o valor 14";
            }

            for($i = 7; $i > 0; $i--){
                
            }
        } catch (Exeception $e) {
            log::notice("Ocorreu erro  pelo arquivo Exercicio1Controller função save: " . $e->getMessage());
            return redirect('/')->withErrors('Ocorreu um erro ao cadastrar o usuário!');
        }
    }
 
}
