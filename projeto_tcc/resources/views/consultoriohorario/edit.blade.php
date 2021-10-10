@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Alterar Horário do Consultório') }}</div>
                    <div class="card-body">

                        <form action="{{route('consultoriohorario/update', ['iCodigoConsultorioHorario' => $oConsultorioHorario->cohcodigo, 'iCodigo' => $iCodigo])}}" method="post">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label>Consultório</label>
                                <select class="form-control" name="concodigo" required value="{{$oConsultorioHorario->consultorio->concodigo}}" readonly>
                                    <option value="{{$oConsultorioHorario->consultorio->concodigo}}">{{$oConsultorioHorario->consultorio->condescricao}}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tipo</label>
                                <select class="form-control" name="cohtipo" required value="{{$oConsultorioHorario->cohtipo}}">
                                    <option value="1" @if($oConsultorioHorario->cohtipo == 1) selected @endif>Consulta</option>
                                    <option value="2" @if($oConsultorioHorario->cohtipo == 2) selected @endif>Intervalo</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Hora de Início</label>
                                <input type="time" name="cohhorainicio" class="form-control" value="{{$oConsultorioHorario->cohhorainicio}}" required>
                            </div>

                            <div class="form-group">
                                <label>Hora de Término</label>
                                <input type="time" name="cohhorafim" class="form-control" value="{{$oConsultorioHorario->cohhorafim}}" required>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-lg btn-success">Alterar Horário do Consultório</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
