@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Incluir Horário do Consultório') }}</div>
                    <div class="card-body">

                        <form action="{{route('consultoriohorario/store', ['iCodigo' => $iCodigo])}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Consultório</label>
                                <select class="form-control" name="concodigo" required value="{{old('concodigo')}}" readonly>
                                    <option value="{{$oConsultorio->concodigo}}">{{$oConsultorio->condescricao}}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tipo</label>
                                <select class="form-control" name="cohtipo" required value="{{old('cohtipo')}}">
                                    <option value="1">Consulta</option>
                                    <option value="2">Intervalo</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Hora de Início</label>
                                <input type="time" name="cohhorainicio" class="form-control" value="{{old('cohhorainicio')}}" required>
                            </div>

                            <div class="form-group">
                                <label>Hora de Término</label>
                                <input type="time" name="cohhorafim" class="form-control" value="{{old('cohhorafim')}}" required>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-lg btn-success">Criar Horário do Consultório</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
