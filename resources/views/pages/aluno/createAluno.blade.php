@extends('layouts.default')
@section('content')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home') }}">Home page</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Registro de novo aluno</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-body">
                        @include('layouts.return-messages')
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title mb-5">Registro de novo aluno</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-right">
                                    <a href="{{  route('aluno.index') }}" class="btn btn-primary btn-fw" id="atualizar">Lista de alunos</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::open(['url' => 'aluno/save', 'method' => 'post']) }}
                                @csrf

                                <input type="hidden" id="id" name="id" value="{{isset($aluno)?$aluno->id:''}}">
                                <div class="col-md-6">
                                    <label class="col-sm-3" for="name">Nome:</label>
                                    <input class="col-sm-8" required type="text" id="name" name="name" value="{{isset($aluno)?$aluno->nome:''}}">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm-3" for="email">Email:</label>
                                    <input class="col-sm-8" required type="text" id="email" name="email" value="{{isset($aluno)?$aluno->email:''}}">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm-3" for="data_nascimento">Data de Nascimento :</label>
                                    <input class="col-sm-8" minlength="8" required type="date" id="data_nascimento" name="data_nascimento" value="{{isset($aluno)?$aluno->data_nascimento:''}}">                                    
                                </div>

                                <input type="submit" class="btn btn-primary" value="Cadastrar">
                                {{ Form::close() }}
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
