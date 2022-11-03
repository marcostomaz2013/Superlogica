@extends('layouts.default')
@section('content')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Resultado</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-body">
                        @include('layouts.return-messages')
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title mb-5">resultado das tabelas</h4>
                            </div>

                        </div>
                        <div class="row">
                            Resultado:<br>
                            <div class="col-12 table-responsive">
                                <table class="table table-striped" id="data-table-padrao" tbody-fixed="false">
                                    <thead>
                                        <tr>
                                            <th>Usuário</th>
                                            <th>maior_50_anos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($result))
                                            @foreach ($result as $item)
                                                <tr>
                                                    <td>
                                                        <div style="width:150px;">{{ $item->usuario }}</div>
                                                    </td>
                                                    <td>
                                                        <div style="width:125px;">{{ $item->maior_50_anos }}</div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                        {{-- <div class="row">
                            Usuário:<br>
                            <div class="col-12 table-responsive">
                                <table class="table table-striped" id="data-table-padrao" tbody-fixed="false">
                                    <thead>
                                        <tr>
                                            <th>Cpf</th>
                                            <th>Nome</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($users))
                                            @foreach ($users as $item)
                                                <tr>
                                                    <td>
                                                        <div style="width:125px;">{{ $item->cpf }}</div>
                                                    </td>
                                                    <td>
                                                        <div style="width:125px;">{{ $item->nome }}</div>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            Info:<br>
                            <div class="col-12 table-responsive">
                                <table class="table table-striped" id="data-table-padrao" tbody-fixed="false">
                                    <thead>
                                        <tr>
                                            <th>Cpf</th>
                                            <th>genero</th>
                                            <th>ano nascimento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($info))
                                            @foreach ($info as $item)
                                                <tr>
                                                    <td>
                                                        <div style="width:125px;">{{ $item->cpf }}</div>
                                                    </td>
                                                    <td>
                                                        <div style="width:125px;">{{ $item->genero }}</div>
                                                    </td>
                                                    <td>
                                                        <div style="width:125px;">{{ $item->ano_nascimento }}</div>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div> --}}
                      
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- main-panel ends -->
    </div>
@stop
@section('pagespecificscripts')
@endsection
