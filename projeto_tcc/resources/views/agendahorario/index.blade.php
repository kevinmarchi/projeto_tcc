@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Horários da Agenda') }}</div>
                    <div class="card-body">
                        <a href="{{route('agendahorario/create', ['iCodigo' => $iCodigo])}}" class="btn btn-lg btn-success">Criar Horário da Agenda</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Agenda</th>
                                    <th>Descrição</th>
                                    <th>Data</th>
                                    <th>Horário de Início</th>
                                    <th>Horário de Término</th>
                                    <th>Situação</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($oAgendaHorarios as $oAgendaHorario)
                                    <tr>
                                        <td>{{$oAgendaHorario->aghcodigo}}</td>
                                        <td>{{$oAgendaHorario->agenda->agendescricao}}</td>
                                        <td>{{$oAgendaHorario->aghdescricao}}</td>
                                        <td>{{$oAgendaHorario->aghdata}}</td>
                                        <td>{{$oAgendaHorario->aghhorarioinicio}}</td>
                                        <td>{{$oAgendaHorario->aghhorariofim}}</td>
                                        <td>{{$oAgendaHorario->aghsituacao}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{route('agendahorario/edit', ['iCodigoAgendaHorario'=>$oAgendaHorario->aghcodigo, 'iCodigo' => $iCodigo])}}" class="btn btn-sm btn-primary">Editar</a>
                                                <form action="{{route('agendahorario/destroy', ['iCodigoAgendaHorario'=>$oAgendaHorario->aghcodigo, 'iCodigo' => $iCodigo])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                                                </form>
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
