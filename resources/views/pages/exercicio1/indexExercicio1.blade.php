@extends('layouts.default')
@section('content')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Tecnologia da informação (TI)</li>                        
                        {{-- <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('novoprojeto.create') }}">Formulário de novo projeto</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Registros dos novos projetos</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-body">
                        @include('layouts.return-messages')
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title mb-5">Registros dos novos projetos do funcionário</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-right">
                                    {{-- <a href="{{  route('novoprojeto.atualiza') }}" class="btn btn-primary btn-fw" id="atualizar">Atualizar</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row">                               
                            <div class="col-12 table-responsive">
                                <table class="table table-striped" id="data-table-padrao" tbody-fixed="false">
                                    <thead>                                        
                                        <tr>
                                            <th>Chamado </th>
                                            <th>Nome Projeto </th>                                            
                                            <th>Superintendencia</th>
                                            <th>Setores</th>
                                            <th>Aprovador Projeto</th>
                                            <th>Stakeholders</th>
                                            <th>Fornecedores</th>
                                            <th>Responsavel</th>
                                            <th>Status</th>
                                            <th>Data de Cadastro</th>
                                            <th>Prazo Inicial</th>
                                            <th>Prazo Final</th>
                                            <th>Anexos</th>
                                            <th type="hidden"></th>                                            
                                        </tr>
                                        <tr>
                                            <th class="replace-th">Chamado</th>
                                            <th class="replace-th">Nome Projeto </th>
                                            <th class="replace-th">Superintendencia</th>
                                            <th class="replace-th">Setores</th>
                                            <th class="replace-th">Aprovador Projeto</th>
                                            <th class="replace-th">Stakeholders</th>
                                            <th class="replace-th">Fornecedores</th>
                                            <th class="replace-th">Responsavel</th>
                                            <th class="replace-th">Status</th>
                                            <th class="replace-th">Data de Cadastro</th>
                                            <th class="replace-th">Prazo Inicial</th>
                                            <th class="replace-th">Prazo Final</th>
                                            <th class="replace-th">Anexos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($listUser))
                                            @foreach ($listUser as $item)
                                            <tr>
                                                <td><div style="width:125px;">{{$item->chamado_csc}}</div></td>
                                                <td><div style="width:125px;">{{$item->nome_projeto}}</div></td>
                                                <td><div style="width:100px;">{{$item->superintendencia}}</div></td>
                                                <td><div style="width:100px;">{{$item->setores}}</div></td>
                                                <td><div style="width:100px;">{{$item->aprovador_projeto}}</div></td>
                                                <td><div style="width:100px;">{{$item->stakeholders}}</div></td>
                                                <td><div style="width:100px;">{{$item->fornecedores}}</div></td>
                                                <td><div style="width:110px;">{{$item->responsavel}}</div></td>
                                                <td><div style="width:75px;">{{$item->status}}</div></td>
                                                <td><div style="width:130px;">{{ formataDatetime($item->data_cadastro, 'd/m/Y') }}</div></td>
                                                <td><div style="width:130px;">{{ formataDatetime($item->prazo_inicial, 'd/m/Y') }}</div></td>
                                                @if ($item->prazo_final != null)
                                                    <td><div style="width:150px;">{{ formataDatetime($item->prazo_final, 'd/m/Y') }}</div></td>
                                                @else
                                                    <td></td>
                                                @endif                                                
                                                <td class="ignore">
                                                    @if(strstr($item->anexo, '.'))
                                                        {{-- <a href="{{  route('novo-projeto.file',[$item->anexo]) }}" class="btn btn-primary btn-fw" download id="download">Download</a> --}}
                                                    @else
                                                        <p style="text-align: center">-</p>
                                                    @endif
                                                </td>                                                    
                                                <td class="ignore">                                                            
                                                    <button id="{{$item->id}}" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapseExample">
                                                        <i id="iconList{{$item->id}}" class="icon-arrow-down"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="collapse hidden" id="collapse{{$item->id}}">                                         
                                                <td colspan="14">
                                                    <div  class="collapse hidden" id="collapse{{$item->id}}">
                                                        <h6>Escopo Inicial: </h6>{{$item->escopo_inicial}}
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr class="collapse hidden" id="collapse{{$item->id}}">                                         
                                                <td colspan="14">
                                                    <div  class="collapse hidden" id="collapse{{$item->id}}">
                                                        <h6>Observações Escopo: </h6>{{$item->observacoes_escopo}}
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Chamado </th>
                                            <th>Nome Projeto </th>                                            
                                            <th>Superintendencia</th>
                                            <th>Setores</th>
                                            <th>Aprovador Projeto</th>
                                            <th>Stakeholders</th>
                                            <th>Fornecedores</th>
                                            <th>Responsavel</th>
                                            <th>Status</th>
                                            <th>Data de Cadastro</th>
                                            <th>Prazo Inicial</th>
                                            <th>Prazo Final</th>
                                            <th>Anexos</th>
                                            <th></th>
                                        </tr>
                                        </tfoot>
                                </table>
                            </div>                                      
                            <div class="col-md-12">
                                <div class="form-group text-center mt-5">
                                    {{-- <a href="{{ route('novoprojeto.create') }}" class="btn btn-light btn-fw">Voltar</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- main-panel ends -->
    </div>
    <div class="modal fade" id="modalAnexo" tabindex="-1" role="dialog" aria-labelledby="modalAnexoLabel" style="overflow: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">                    
                    <div id="anexos"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    
@stop
@section('pagespecificscripts')
@endsection
