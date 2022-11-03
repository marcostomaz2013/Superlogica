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
            array_push($strMsg, $arrayToString);

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
            $posExist = null;
            for($i = 1; $i < sizeof($stringToArray); $i++){
                if(isset($stringToArray[$i-1])){
                    $minVal = min($stringToArray[$i-1], $stringToArray[$i]);
                }else{
                    $minVal = min($stringToArray[$posExist], $stringToArray[$i]);
                }
                if($stringToArray[$i] == $minVal){
                    $exclude = array_search($minVal, $stringToArray);
                    unset($stringToArray[$exclude]);
                    $posExist = $i-1;
                    echo '<br>'.$posExist.'<br>';
                }else{
                    $posExist = $i;
                }
            }
            
            //Removendo a última posição do array
            array_pop($stringToArray);                
            //Quantidade de elementos no array
            count($stringToArray);
            //Inverter as posições do array
            array_reverse($stringToArray);
            

            return $strMsg;
        } catch (Exeception $e) {
            log::notice("Ocorreu erro  pelo arquivo Exercicio1Controller função save: " . $e->getMessage());
            return redirect('/')->withErrors('Ocorreu um erro ao cadastrar o usuário!');
        }
    }
 
}
