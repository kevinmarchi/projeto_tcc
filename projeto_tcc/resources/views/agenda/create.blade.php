@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Incluir Agenda') }}</div>
                    <div class="card-body">

                        <form action="{{route('agenda/store', ['iCodigo' => $iCodigo])}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Médico x Consultório</label>
                                <select class="form-control" name="meccodigo" required value="{{old('meccodigo')}}" readonly>
                                    <option value="{{$oMedicoConsultorio->meccodigo}}">{{$oMedicoConsultorio->medico->user->usunome}} - {{$oMedicoConsultorio->consultorio->condescricao}}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Calendário</label>
                                <select class="form-control" name="calcodigo" required value="{{old('calcodigo')}}">
                                    @foreach($oCalendarios as $oCalendario)
                                        <option value="{{$oCalendario->calcodigo}}">{{$oCalendario->calano}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Descrição</label>
                                <input type="text" name="agendescricao" class="form-control" value="{{old('agendescricao')}}" required maxlength="100">
                            </div>

                            <div>
                                <button type="submit" class="btn btn-lg btn-success">Criar Agenda</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
