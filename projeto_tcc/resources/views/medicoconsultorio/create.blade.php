@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Incluir Consultório do Médico') }}</div>
                    <div class="card-body">

                        <form action="{{route('medicoconsultorio.store')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Médico</label>
                                <select class="form-control" name="medcodigo" required value="{{old('medcodigo')}}" readonly>
                                    <option value="{{$oMedico->medcodigo}}">{{$oMedico->usunome}}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Consultório</label>
                                <select class="form-control" name="concodigo" required value="{{old('concodigo')}}">
                                    @foreach($oConsultorios as $oConsultorio)
                                        <option value="{{$oConsultorio->concodigo}}">{{$oConsultorio->condescricao}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-lg btn-success">Criar Consultório do Médico</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
