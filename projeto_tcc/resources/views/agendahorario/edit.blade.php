@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Alterar Horário da Agenda') }}</div>
                    <div class="card-body">

                        <form action="{{route('agendahorario/update', ['iCodigoAgendaHorario' => $oAgendaHorario->aghcodigo,'iCodigo' => $iCodigo])}}" method="post">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label>Agenda</label>
                                <select class="form-control" name="agencodigo" required value="{{$oAgendaHorario->agencodigo}}" disabled>
                                    <option value="{{$oAgendaHorario->agencodigo}}">{{$oAgendaHorario->agenda->agendescricao}}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Descrição</label>
                                <input type="text" name="aghdescricao" class="form-control" value="{{$oAgendaHorario->aghdescricao}}" required maxlength="100">
                            </div>

                            <div class="form-group">
                                <label>Data</label>
                                <input type="date" name="aghdata" class="form-control" value="{{$oAgendaHorario->aghdata}}" required disabled>
                            </div>

                            <div class="form-group">
                                <label>Horário de Início</label>
                                <input type="time" name="aghhorarioinicio" class="form-control" value="{{$oAgendaHorario->aghhorarioinicio}}" required disabled>
                            </div>

                            <div class="form-group">
                                <label>Horário de Término</label>
                                <input type="time" name="aghhorariofim" class="form-control" value="{{$oAgendaHorario->aghhorariofim}}" required disabled>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-lg btn-success">Alterar Horário da Agenda</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
