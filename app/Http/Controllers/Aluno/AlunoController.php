<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    //Retorna a listagem de alunos
    public function index()
    {
        $alunos = Aluno::all();
        return view('pages.aluno.indexAluno',['alunos'=>$alunos]);
    }

    //retorna o formulário de criar aluno
    public function create(){
        return view('pages.aluno.createAluno');
    }

    //retorna o formulario para editar o aluno
    public function update(Request $request){
        $aluno = Aluno::where('id', '=', $request->id)->first();

        return view('pages.aluno.createAluno', ['aluno'=>$aluno]);
    }
    //Salva um novo aluno
    public function save(Request $request)
    {
        try{
            if(isset($request->id)){
                Aluno::where('id','=', $request->id)->update([
                    'nome'=> $request->name,
                    'email'=> $request->email,
                    'data_nascimento' => $request->data_nascimento
                ]);
                return redirect(route('aluno.index'))->with('success', 'Aluno atualizado com sucesso!');
            }else{
                Aluno::create([
                    'nome'=> $request->name,
                    'email'=> $request->email,
                    'data_nascimento' => $request->data_nascimento
                ]);
                return redirect(route('aluno.index'))->with('success', 'Aluno criado com sucesso!');
            }

        }catch(Exeception $e){
            return redirect(route('aluno.index'))->withErrors('Ocorreu um erro ao cadastrar/editar a Aluno!');
        }
    }
    

    public function delete(Request $request){
        try{
            Aluno::where('id', '=', $request->id)->delete();
            return redirect(route('aluno.index'))->with('success', 'Aluno excluido com sucesso!');
        }catch(Exeception $e){
            return redirect(route('aluno.index'))->withErrors('Ocorreu um erro ao excluir a Aluno!');
        }
    }
}
