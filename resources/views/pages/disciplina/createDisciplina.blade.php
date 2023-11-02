@extends('layouts.default')
@section('content')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home') }}">Home page</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Registro de disciplina</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-body">
                        @include('layouts.return-messages')
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title mb-5">Registro de disciplina</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-right">
                                    <a href="{{  route('disciplina.index') }}" class="btn btn-primary btn-fw" id="atualizar">Lista de alunos</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::open(['url' => 'disciplina/save', 'method' => 'post']) }}
                                @csrf
                                <input type="hidden" id="id" name="id" value="{{isset($disciplina)?$disciplina->id:''}}">
                                <div class="col-md-6">
                                    <label class="col-sm-3" for="titulo">Titulo:</label>
                                    <input class="col-sm-8" required type="text" id="titulo" name="titulo" value="{{isset($disciplina)?$disciplina->titulo:''}}">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm-3" for="descricao">Descrição:</label>
                                    <input class="col-sm-8" required type="text" id="descricao" name="descricao" value="{{isset($disciplina)?$disciplina->descricao:''}}">
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
