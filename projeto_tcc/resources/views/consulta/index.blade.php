@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Consulta') }}</div>
                    <div class="card-body">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Usuário</a>
                            </li>
                            @isset($oConsultasAdmin[0])
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Administrativo</a>
                                </li>
                            @endisset
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Usuário</th>
                                        <th>Médico</th>
                                        <th>Consultório</th>
                                        <th>Data</th>
                                        <th>Horário de Início</th>
                                        <th>Horário de Término</th>
                                        <th>Situação</th>
                                        <th>Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($oConsultasAdmin as $oConsultaAdmin)
                                        <tr>
                                            <td>{{$oConsultaAdmin->cnscodigo}}</td>
                                            <td>{{\App\Models\Consulta::find($oConsultaAdmin->cnscodigo)->user->usunome}}</td>
                                            <td>{{$oConsultaAdmin->agendahorario->agenda->medicoconsultorio->medico->user->usunome}}</td>
                                            <td>{{$oConsultaAdmin->agendahorario->agenda->medicoconsultorio->consultorio->condescricao}}</td>
                                            <td>{{\Carbon\Carbon::parse($oConsultaAdmin->agendahorario->aghdata)->format('d/m/Y')}}</td>
                                            <td>{{$oConsultaAdmin->agendahorario->aghhorarioinicio}}</td>
                                            <td>{{$oConsultaAdmin->agendahorario->aghhorariofim}}</td>
                                            <td>{{$oConsultaAdmin->cnssituacao}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{route('consulta/cancel', ['consulta'=>$oConsultaAdmin->cnscodigo])}}" class="btn btn-sm btn-danger">Cancelar</a>
                                                    <a href="{{route('consulta/confirm', ['consulta'=>$oConsultaAdmin->cnscodigo])}}" class="btn btn-sm btn-success">Confirmar</a>
                                                    <a href="{{route('consulta/finalize', ['consulta'=>$oConsultaAdmin->cnscodigo])}}" class="btn btn-sm btn-primary">Finalizar</a>
                                                    <a href="{{route('contato', ['iTipo' => '1', 'iCodigo' => $oConsultaAdmin->usucodigo])}}" class="btn btn-sm btn-secondary">Contato</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Médico</th>
                                            <th>Consultório</th>
                                            <th>Data</th>
                                            <th>Horário de Início</th>
                                            <th>Horário de Término</th>
                                            <th>Situação</th>
                                            <th>Ações</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($oConsultasUsuario as $oConsultaUsuario)
                                                <tr>
                                                    <td>{{$oConsultaUsuario->cnscodigo}}</td>
                                                    <td>{{$oConsultaUsuario->agendahorario->agenda->medicoconsultorio->medico->user->usunome}}</td>
                                                    <td>{{$oConsultaUsuario->agendahorario->agenda->medicoconsultorio->consultorio->condescricao}}</td>
                                                    <td>{{\Carbon\Carbon::parse($oConsultaUsuario->agendahorario->aghdata)->format('d/m/Y')}}</td>
                                                    <td>{{$oConsultaUsuario->agendahorario->aghhorarioinicio}}</td>
                                                    <td>{{$oConsultaUsuario->agendahorario->aghhorariofim}}</td>
                                                    <td>{{$oConsultaUsuario->cnssituacao}}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{route('consulta/cancel', ['consulta'=>$oConsultaUsuario->cnscodigo])}}" class="btn btn-sm btn-danger">Cancelar</a>
                                                            @if($oConsultaUsuario->cnssituacao == 'Finalizada')
                                                                <a href="{{route('avaliacao/create', ['iCodigoConsulta'=>$oConsultaUsuario->cnscodigo])}}" class="btn btn-sm btn-primary">Avaliação</a>
                                                            @endif
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
        </div>
    </div>

@endsection
