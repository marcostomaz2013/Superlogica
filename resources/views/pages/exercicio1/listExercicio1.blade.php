@extends('layouts.default')
@section('content')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('exercicio1.index') }}">Formulário de cadastro de usuário</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lista usuários cadastrados</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-body">
                        @include('layouts.return-messages')
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title mb-5">Lista os usuários cadastrados</h4>
                            </div>
                           
                        </div>
                        <div class="row">                               
                            <div class="col-12 table-responsive">
                                <table class="table table-striped" id="data-table-padrao" tbody-fixed="false">
                                    <thead>                                        
                                        <tr>
                                            <th>Nome Completo</th>
                                            <th>Login</th>                                            
                                            <th>Cep</th>
                                            <th>E-mail</th>
                                            <th>Senha</th>                                           
                                        </tr>                                       
                                    </thead>
                                    <tbody>
                                        @if (isset($users))
                                            @foreach ($users as $item)
                                            <tr>
                                                <td><div style="width:125px;">{{$item->nome_completo}}</div></td>
                                                <td><div style="width:125px;">{{$item->login}}</div></td>
                                                <td><div style="width:100px;">{{$item->cep}}</div></td>
                                                <td><div style="width:100px;">{{$item->email}}</div></td>
                                                <td><div style="width:100px;">{{$item->senha}}</div></td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>                                      
                            <div class="col-md-12">
                                <div class="form-group text-center mt-5">
                                    <a href="{{ route('exercicio1.index') }}" class="btn btn-light btn-fw">Voltar</a>
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
@stop
@section('pagespecificscripts')
@endsection
