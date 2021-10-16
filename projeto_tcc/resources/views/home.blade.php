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

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Médico</th>
                                <th>Consultório</th>
                                <th>Especialidade(s)</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($oMedicos as $oMedico)
                                <tr>
                                    <td>{{$oMedico->medico->user->usunome}}</td>
                                    <td>{{$oMedico->consultorio->condescricao}}</td>
                                    <td>
                                        @foreach($oMedico->medico->medicoespecialidade as $oMedicoEspecialidade)
                                            {{$oMedicoEspecialidade->especialidade->espnome}},
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{route('consulta/create', ['iCodigo' => $oMedico->meccodigo])}}" class="btn btn-sm btn-primary">Agendar</a>
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
