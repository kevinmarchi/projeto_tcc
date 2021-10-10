@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Alterar Especialidade') }}</div>
                    <div class="card-body">

                        <form action="{{route('especialidade.update', ['especialidade' => $oEspecialidade->espcodigo])}}" method="post">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" name="espnome" class="form-control" value="{{$oEspecialidade->espnome}}" required>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-lg btn-success">Alterar Especialidade</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
