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
        $arrayMethods = $this->arrayMethods();
        return view('pages.exercicio2.indexExercicio2', ['arrayMethods' => $arrayMethods]);
    }

    //Faz a manipulação do array
    public function arrayMethods()
    {
        try {
            //Criar o objeto Array
            $arr = [];
            $strMsg = [];
            //Preenche o array com 7 número aleatórios
            for($i = 0; $i < 7; $i++){
                array_push($arr, rand(0,1000));
            }
            //imprimi a 3 posição do array
            array_push($strMsg ,"A 3ª posição do array é: ".$arr[2]);
            //Transforma o array em string
            $arrayToString = implode(',',$arr);
            array_push($strMsg, 'Transforma o array em string: '.$arrayToString);

            //Cria um novo array apartir da string criada e detroi o array anterior
            $stringToArray = explode(',', $arrayToString);            
            unset($arr);            

            //Verifica se possui o valor 14 dentro do array
            //para testar se quiser só descomentar  a linha abaixo:
                //array_push($stringToArray, 14);
            if(array_search(14,$stringToArray)){
                array_push($strMsg,"O array possui o valor 14");
            }

            //Busca no array e exclui o menor número!
            for($i = 1; $i < sizeof($stringToArray); $i++){               
                $minVal = min($stringToArray[$i-1], $stringToArray[$i]);

                if($stringToArray[$i] == $minVal){                
                    $stringToArray[$i] = $stringToArray[$i-1];
                }
            }
            $arrayExlude = array_unique($stringToArray);
            array_push($strMsg, 'Buscar no array e tirar o menor número: '.implode(',', array_unique($stringToArray)));         
            //Removendo a última posição do array
            array_pop($arrayExlude);
            array_push($strMsg, 'Removendo a última posição do array: '.implode(',',$arrayExlude));
            //Quantidade de elementos no array
            count($stringToArray);
            array_push($strMsg, 'Quantidade de elementos no array: '.count($arrayExlude));
            //Inverter as posições do array
            array_reverse($arrayExlude);
            array_push($strMsg, 'Inverter as posições do array: '.implode(',',$arrayExlude));
            

            return $strMsg;
        } catch (Exeception $e) {
            log::notice("Ocorreu erro  pelo arquivo Exercicio1Controller função save: " . $e->getMessage());
            return redirect('/')->withErrors('Ocorreu um erro ao cadastrar o usuário!');
        }
    }
 
}
