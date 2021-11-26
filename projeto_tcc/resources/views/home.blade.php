@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agendamento de Consultas') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h7>Filtros:</h7>
                    <form action="{{route('home/search')}}" class="form form-inline">
                        @csrf
                        <select name="filter-option" class="form-control mb-2 mr-1">
                            <option>Selecione...</option>
                            <option value="1">Cidade</option>
                            <option value="2">Nome do Médico</option>
                            <option value="3">Consultório</option>
                        </select>
                        <input type="text" name="filter-value" placeholder="Valor" class="form-control mb-2" style="width: 63%">
                        <button type="submit" class="btn btn-info mb-2">Pesquisar</button>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Médico</th>
                                <th>Consultório</th>
                                <th>Cidade</th>
                                <th>Especialidade(s)</th>
                                <th>Avaliações</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($oMedicos as $oMedico)
                                <tr>
                                    <td>{{$oMedico->medico->user->usunome}}</td>
                                    <td>{{$oMedico->consultorio->condescricao}}</td>
                                    <td>{{$oMedico->consultorio->endereco->cidade->cidnome}}</td>
                                    <td>
                                        @foreach($oMedico->medico->medicoespecialidade as $oMedicoEspecialidade)
                                            {{$oMedicoEspecialidade->especialidade->espnome}},
                                        @endforeach
                                    </td>
                                    <td>{{number_format($oMedico->nota,2,',','.')}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{route('consulta/create', ['iCodigo' => $oMedico->meccodigo])}}" class="btn btn-sm btn-primary">Agendar</a>
                                            <a href="{{route('avaliacao', ['iMedicoConsultorio' => $oMedico->meccodigo])}}" class="btn btn-sm btn-secondary">Avaliações</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
