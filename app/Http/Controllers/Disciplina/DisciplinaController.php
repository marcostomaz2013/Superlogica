<?php

namespace App\Http\Controllers\Disciplina;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Disciplina;

class DisciplinaController extends Controller
{
    //Lista as diciplinas cadastradas
    public function index()
    {
        $disciplinas = Disciplina::all();
        return view('pages.disciplina.indexDisciplina', ['disciplinas'=> $disciplinas]);
    }

    public function create(){
        return view('pages.disciplina.createDisciplina');
    }

    public function update(Request $request){
        $disciplina = Disciplina::where('id', '=', $request->id)->first();

        return view('pages.disciplina.createDisciplina', ['disciplina'=>$disciplina]);
    }
    //Salva uma nova disciplina
    public function save(Request $request)
    {
        try{
            if(isset($request->id)){
                Disciplina::where('id','=', $request->id)->update([
                    'titulo'=> $request->titulo,
                    'descricao'=> $request->descricao
                ]);
                return redirect(route('disciplina.index'))->with('success', 'Disciplina atualizada com sucesso!');
            }else{
                Disciplina::create([
                    'titulo'=> $request->titulo,
                    'descricao'=> $request->descricao
                ]);
                return redirect(route('disciplina.index'))->with('success', 'Disciplina criada com sucesso!');
            }

        }catch(Exeception $e){
            return redirect(route('disciplina.index'))->withErrors('Ocorreu um erro ao cadastrar/editar a disciplina!');
        }
    }
    
    //deleta uma disciplina
    public function delete(Request $request){
        try{
            Disciplina::where('id', '=', $request->id)->delete();
            return redirect(route('disciplina.index'))->with('success', 'Disciplina excluida com sucesso!');
        }catch(Exeception $e){
            return redirect(route('disciplina.index'))->withErrors('Ocorreu um erro ao excluir a disciplina!');
        }
    }
}
