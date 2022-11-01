<?php

namespace App\Http\Controllers\Exercicio1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use DateTime;
class Exercicio1Controller extends Controller
{
    //Retorna o formulário de registro de novos projetos
    public function index(){
        return view ('pages.exercicio1.indexExercicio1');
    }

    //Retorna a lista de novos projetos  criados pelo usuário
    public function createList(Request $request){
        $activepl="active";
        $soapCsc = new SoapCsc();
        try{
            $listUser = NovoProjeto::select([
                'novos_projetos.id as id',
                'novos_projetos.nome_projeto as nome_projeto',
                'novos_projetos.superintendencia as superintendencia',
                'novos_projetos.escopo_inicial as escopo_inicial',
                'novos_projetos.observacoes_escopo as observacoes_escopo',
                'novos_projetos.prazo_inicial as prazo_inicial',
                'novos_projetos.aprovador_projeto as aprovador_projeto',
                'novos_projetos.setores as setores',
                'novos_projetos.stakeholders as stakeholders',
                'novos_projetos.fornecedores as fornecedores',
                'novos_projetos.chamado_csc as chamado_csc',
                'novos_projetos.created_at as data_cadastro',
                'novos_projetos.anexo as anexo',
                'novos_projetos.responsavel_id as responsavel_id',
                'novos_projetos.responsavel as responsavel',
                'novos_projetos.prazo_final as prazo_final',
                'novos_projetos.status as status'
                
            ])
            ->where('novos_projetos.solicitante_id','=', Auth::user()->id)
            ->get();
            $listUser->toArray();
        }catch(Exeception $e){
            log::notice("Ocorreu erro  pelo arquivo NovoProjetoController funcao createList:".$e->getMessage());
            report($e);
			return redirect('/ti/servicos/novoprojeto/create')->withErrors('Ocorreu um erro ao acessar a lista!');
        }
        return view ('pages.ti.servicos.ListarNovoProjeto', ['listUser'=>$listUser, 'activepl'=>$activepl]);
    }

    //Cadastra um novo projeto
    public function save(Request $request){
        /*$this->validate($request, [
            'severidade' => 'required',
            'tipo' => 'required',
            'categoria' => 'required',
            'descricao' => 'required',
        ]);*/
        try{
            $soapCsc = new SoapCsc();
            $arrFlexFields = [];
            $catalogoServicoId = 2750;
            $requestData = $request->all();
            $localAttachment=null;
            if(is_file($request->file('anexo'))){
                $fileAnexo = $request->file('anexo');
                $storageDadosRaiz = Storage::disk('local');
                $storageDadosRaiz->put('novo_projeto', $fileAnexo);
                $localAttachment = $fileAnexo->hashName();
            }
            $solicitante = User::select(['users.name as nome',
                        'users.email as email',
                        'rm_sectors.descricao as setor',
                        'rm_titles.nome as cargo',
                        'users.id as usuario_id',
                        'users.csc_id as csc_id'])           
                    ->join('rm_sectors','users.rmsector_id', '=', 'rm_sectors.id')
                    ->join('rm_titles','users.rmtitle_id', '=', 'rm_titles.id')
                    ->where('users.id','=', Auth::user()->id)
                    ->orderby('users.name')
                    ->first();
            $solicitante->toArray();
            if(isset($solicitante)){
                $arrayFiles = array("","","","","");
				$arrayNameFiles = array("","","","","");
                $descricaoCsc = "Solicitante: ".$solicitante['nome']." E-mail: ".$solicitante['email'].
                " \nCargo: ".$solicitante['cargo']." Setor: ".$solicitante['setor'].
                " \nNome Projeto: ".$requestData['nome_projeto']." Superintendencia: ".$requestData['superintendencia'].
                " \nAprovador Projeto: ".$requestData['aprovador_projeto']." Status: Aberto".
                " \nStakeholders: ".$requestData['stakeholders']." Setores: ".$requestData['setores'].
                " \nPrazo inicial: ".$requestData['prazo_inicial']." Fornecedores: ".$requestData['fornecedores'].
                " \nEscopo Inicial: \n".$requestData['escopo_inicial'].
                " \nObservações escopo: \n".$requestData['observacoes_escopo'];
                array_push($arrFlexFields, $descricaoCsc);
                if($localAttachment != null){
                    $arrayNameFiles[0] = $localAttachment;
				    $arrayFiles[0] = Storage::disk('local')->get('novo_projeto',$localAttachment);
                }
                
                $numeroChamado = $soapCsc->InserirChamadoPeloMobileComFlexFields($catalogoServicoId, $descricaoCsc, $solicitante['csc_id'], $arrFlexFields,$arrayNameFiles,$arrayFiles);                
        
                NovoProjeto::create([
                    'nome_projeto' => $requestData['nome_projeto'],
                    'superintendencia' => $requestData['superintendencia'],
                    'escopo_inicial' => $requestData['escopo_inicial'],
                    'observacoes_escopo' => $requestData['observacoes_escopo'],
                    'prazo_inicial' => $requestData['prazo_inicial'],
                    'aprovador_projeto' => $requestData['aprovador_projeto'],
                    'setores' => $requestData['setores'],
                    'stakeholders' => $requestData['stakeholders'],
                    'fornecedores' => $requestData['fornecedores'],
                    'nome_solicitante' => $solicitante['nome'],
                    'email_solicitante' => $solicitante['email'],
                    'solicitante_id' => $solicitante['usuario_id'],                    
                    'anexo' => $localAttachment,
                    'chamado_csc' => $numeroChamado,
                ]);            
            }
        }catch(\Exception $e){
            log::notice("Ocorreu erro  pelo arquivo NovoProjetoController funcao save:".$e->getMessage());
            report($e);
			return redirect('/ti/servicos/novoprojeto/create')->withErrors('Ocorreu um erro ao salvar a informação!');
        }
        return redirect('/ti/servicos/novoprojeto/create')->with('success', 'Novo projeto registrado com sucesso!');
       
    }

    //Retorna a lista de todas os novos projetos criados
    public function createListTi(Request $request){
        $activepl="active";
        try{
            $listUser = NovoProjeto::select([
                'novos_projetos.id as id',
                'novos_projetos.nome_projeto as nome_projeto',
                'novos_projetos.superintendencia as superintendencia',
                'novos_projetos.escopo_inicial as escopo_inicial',
                'novos_projetos.observacoes_escopo as observacoes_escopo',
                'novos_projetos.prazo_inicial as prazo_inicial',
                'novos_projetos.aprovador_projeto as aprovador_projeto',
                'novos_projetos.setores as setores',
                'novos_projetos.stakeholders as stakeholders',
                'novos_projetos.fornecedores as fornecedores',
                'novos_projetos.chamado_csc as chamado_csc',
                'novos_projetos.created_at as data_cadastro',
                'novos_projetos.anexo as anexo',
                'novos_projetos.responsavel_id as responsavel_id',
                'novos_projetos.responsavel as responsavel',
                'novos_projetos.prazo_final as prazo_final',
                'novos_projetos.status as status',
                'novos_projetos.solicitante_id as solicitante_id',
                'novos_projetos.nome_solicitante as nome_solicitante',
                'novos_projetos.email_solicitante as email_solicitante',
            ])->get();
            $listUser->toArray();
        }catch(\Exeception $e){
            log::notice("Ocorreu erro  pelo arquivo NovoProjetoController funcao createListTi:".$e->getMessage());
            report($e);
			return redirect('/ti/servicos/novoprojeto/create')->withErrors('Ocorreu um erro ao acessar a lista!');
        }
        return view ('pages.ti.servicos.ListarNovoProjetoTi', ['listUser'=>$listUser, 'activepl'=>$activepl]);
    }

    //Atualiza o status de todos os chamados.
    public function atualizaStatus(Request $request){
        $activepl="active";
        $soapCsc = new SoapCsc();
        try{
            $listUser = NovoProjeto::select([
                'novos_projetos.id as id',
                'novos_projetos.responsavel as responsavel',
                'novos_projetos.status as status',
                'novos_projetos.prazo_final as prazo_final',
                'novos_projetos.chamado_csc as chamadoCsc',
            ])->get();
            $listUser->toArray();
            foreach($listUser as $item){
                $incidenteid = substr($item['chamadoCsc'], 5);                
                if($incidenteid != ""){                    
                    $chamadocsc = $soapCsc->RetornaChamadoIntegracao($incidenteid);
                    
                    $responsavel = User::select([
                        'users.id as id',
                    ])->where('users.csc_id', $chamadocsc->GRUPO_RESPONSAVEL_USER)->first();                    
                        $item['status'] = $chamadocsc->STATUS;
                        $data = $chamadocsc->DATA_PREVISAO_SETOR;
                        $dataBD = null;                        
                        if($data != null && $data != ""){
                            $separaDataHora = explode(' ', $data);
                            $separaData = explode('/', $separaDataHora[0]);
                            $dia = $separaData[0];
                            $mes = $separaData[1];
                            $ano = $separaData[2];
                            $dataBD = $ano.'-'.$mes.'-'.$dia;
                        }                    
                        if($responsavel != null){
                            $update = NovoProjeto::where('id', $item['id'])
                            ->update([
                                 'status' => $chamadocsc->STATUS,                                                
                                 'prazo_final' => $dataBD,
                                 'responsavel' => $chamadocsc->NOME_RESPONSAVEL,
                                 'responsavel_id' => $responsavel->id,

                             ]);
                        }else{
                            $update = NovoProjeto::where('id', $item['id'])
                            ->update([
                                 'status' => $chamadocsc->STATUS,                                                
                                 'prazo_final' => $dataBD
                             ]);
                        }
                        
                    
                }
            }
            
            
        }catch(Exeception $e){
            log::notice("Ocorreu erro  pelo arquivo NovoProjetoController funcao atualiza com a createList ou createListTi:".$e->getMessage());
            report($e);
			return redirect('/ti/servicos/novoprojeto/create')->withErrors('Ocorreu um erro ao acessar a lista!');
        }
        return redirect()->back();
    }
    //Campos de seleção do formulário
    public static  $SUPERINTENDENCIA = [
        'SAF' => 'SAF',
        'SOP I' => 'SOP I',
        'SOP II' => 'SOP II',
        'SOP III' => 'SOP III'
    ];
}
