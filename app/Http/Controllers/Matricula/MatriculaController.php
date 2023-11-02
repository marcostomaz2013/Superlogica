<?php

namespace App\Http\Controllers\Matricula;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matricula;
use App\Models\Aluno;
use App\Models\Disciplina;

class MatriculaController extends Controller
{
    //Retorna a listagem de alunos
    public function index()
    {
        $matriculas = Matricula::select([
            'matriculas.id as id',
            'alunos.nome as nome_aluno',
            'disciplinas.titulo as disciplina'
        ]) ->join('alunos', 'alunos.id', '=', 'matriculas.aluno_id')
        ->join('disciplinas', 'disciplinas.id', '=', 'matriculas.disciplina_id')->get();
        return view('pages.matricula.indexMatricula',['matriculas'=>$matriculas]);
    }

    //retorna o formulário de criar aluno
    public function create(){
        $alunos = Aluno::all();
        $disciplinas = Disciplina::all();
        return view('pages.matricula.createMatricula',['alunos'=> $alunos, 'disciplinas'=>$disciplinas]);
    }

    //retorna o formulario para editar o aluno
    public function update(Request $request){
        
        $matriculas = Matricula::select([
            'matriculas.id as id',
            'alunos.nome as nome_aluno',
            'disciplinas.titulo as disciplina'
        ]) ->join('alunos', 'alunos.id', '=', 'matriculas.aluno_id')
        ->join('disciplinas', 'disciplinas.id', '=', 'matriculas.disciplina_id')->where('matriculas.id','=',$request->id)->first();
        return view('pages.matricula.createMatricula', ['matriculas'=>$matriculas]);
    }
    //Salva um novo aluno
    public function save(Request $request)
    {
        try{
            if(isset($request->id)){
                Matricula::selectwhere('id', '=', $request->id)->update([
                    'aluno_id'=>$request->aluno_id,
                    'disciplina_id'=>$request->disciplina_id
                ]);
                return redirect(route('matricula.index'))->with('success', 'Matricula atualizada com sucesso!');
            }else{
                Matricula::create([
                    'aluno_id'=>$request->aluno_id,
                    'disciplina_id'=>$request->disciplina_id
                ]);
                return redirect(route('matricula.index'))->with('success', 'Matricula criada com sucesso!');
            }

        }catch(Exeception $e){
            return redirect(route('matricula.index'))->withErrors('Ocorreu um erro ao cadastrar/editar a Matricula!');
        }
    }
    

    public function delete(Request $request){
        try{
            Matricula::where('id', '=', $request->id)->delete();
            return redirect(route('matricula.index'))->with('success', 'Matricula excluido com sucesso!');
        }catch(Exeception $e){
            return redirect(route('matricula.index'))->withErrors('Ocorreu um erro ao excluir a Matricula!');
        }
    }
}
