@extends('layouts.default')
@section('content')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home') }}">Home page</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Registro de novo matricula</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-body">
                        @include('layouts.return-messages')
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title mb-5">Registro de novo matricula</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-right">
                                    <a href="{{  route('matricula.index') }}" class="btn btn-primary btn-fw" id="atualizar">Lista de matriculas</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::open(['url' => 'matricula/save', 'method' => 'post']) }}
                                @csrf
                                <input type="hidden" id="id" name="id" value="{{isset($matricula)?$matricula->id:''}}">
                                <div class="col-md-6">
                                    <label class="col-sm-3" for="name">Aluno:</label>
                                    <select  class="col-sm-8" id="aluno_id" name="aluno_id">
                                        @foreach($alunos as $aluno)
                                            <option value="{{$aluno->id}}">{{$aluno->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm-3" for="email">Disciplina:</label>
                                    <select  class="col-sm-8" id="disciplina_id" name="disciplina_id">
                                        @foreach($disciplinas as $disciplina)
                                            <option value="{{$disciplina->id}}">{{$disciplina->titulo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Salvar">
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
