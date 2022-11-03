@extends('layouts.default')
@section('content')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home') }}">Home page</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Registro de novo usuário</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-body">
                        @include('layouts.return-messages')
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title mb-5">Registro de novo usuário</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-right">
                                    <a href="{{  route('exercicio1.list') }}" class="btn btn-primary btn-fw" id="atualizar">Lista de usuários</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::open(['url' => 'exercicio1/save', 'method' => 'post']) }}
                                @csrf

                                <div class="col-md-6">
                                    <label class="col-sm-3" for="name">Nome completo:</label>
                                    <input class="col-sm-8" required type="text" id="name" name="name">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm-3" for="userName">Nome de login:</label>
                                    <input class="col-sm-8" required type="text" id="userName" name="userName">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm-3" for="zipCode">CEP</label>
                                    <input class="col-sm-8" minlength="8" required type="text" id="zipCode"
                                        name="zipCode">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm-3" for="email">Email:</label>
                                    <input class="col-sm-8" required type="text" id="email" name="email">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm-3" for="password">Senha :</label>
                                    <input class="col-sm-8" minlength="8" required type="password" id="password"
                                        name="password">
                                    <label>(A senha deve conter 8 caracteres mínimo, contendo pelo menos 1 letra
                                        e 1 número)</label>
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
