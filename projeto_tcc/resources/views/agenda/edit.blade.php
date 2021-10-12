@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Alterar Agenda') }}</div>
                    <div class="card-body">

                        <form action="{{route('agenda/update', ['iCodigoAgenda' => $oAgenda->agencodigo,'iCodigo' => $iCodigo])}}" method="post">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label>Médico x Consultório</label>
                                <select class="form-control" name="meccodigo" required value="{{$oAgenda->medicoconsultorio->meccodigo}}" disabled>
                                    <option value="{{$oAgenda->medicoconsultorio->meccodigo}}">{{$oAgenda->medicoconsultorio->medico->user->usunome}} - {{$oAgenda->medicoconsultorio->consultorio->condescricao}}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Calendário</label>
                                <select class="form-control" name="calcodigo" required value="{{$oAgenda->calcodigo}}" disabled>
                                    <option value="{{$oAgenda->calcodigo}}">{{$oAgenda->calendario->calano}}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Descrição</label>
                                <input type="text" name="agendescricao" class="form-control" value="{{$oAgenda->agendescricao}}" required maxlength="100">
                            </div>

                            <div>
                                <button type="submit" class="btn btn-lg btn-success">Alterar Agenda</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
