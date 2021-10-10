@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Incluir Equipe do Médico x Consultório') }}</div>
                    <div class="card-body">

                        <form action="{{route('usuariomedicoconsultorio/store', ['iCodigo' => $iCodigo])}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Médico x Consultório</label>
                                <select class="form-control" name="meccodigo" required value="{{old('meccodigo')}}" readonly>
                                    <option value="{{$oMedicoConsultorio->meccodigo}}">{{$oMedicoConsultorio->medico->user->usunome}} x {{$oMedicoConsultorio->consultorio->condescricao}}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Usuário</label>
                                <select class="form-control" name="usucodigo" required value="{{old('usucodigo')}}">
                                    @foreach($oUsuarios as $oUsuario)
                                        <option value="{{$oUsuario->usucodigo}}">{{$oUsuario->usunome}}</option>
                                    @endforeach
                                </select>
                            </div>



                            <div>
                                <button type="submit" class="btn btn-lg btn-success">Criar Equipe do Médico x Consultório</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
