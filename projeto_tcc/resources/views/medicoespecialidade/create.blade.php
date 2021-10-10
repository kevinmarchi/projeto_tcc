@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Incluir Especialidade do Médico') }}</div>
                    <div class="card-body">

                        <form action="{{route('medicoespecialidade.store')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Médico</label>
                                <select class="form-control" name="medcodigo" required value="{{old('medcodigo')}}" readonly>
                                    <option value="{{$oMedico->medcodigo}}">{{$oMedico->usunome}}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Especialidade</label>
                                <select class="form-control" name="espcodigo" required value="{{old('espcodigo')}}">
                                    @foreach($oEspecialidades as $oEspecialidade)
                                        <option value="{{$oEspecialidade->espcodigo}}">{{$oEspecialidade->espnome}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-lg btn-success">Criar Especialidade do Médico</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
