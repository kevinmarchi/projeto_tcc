@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Alterar Avaliação') }}</div>
                    <div class="card-body">

                        <form action="{{route('avaliacao/update', ['iCodigo' => $oAvaliacao->avacodigo,'iCodigoConsulta' => $iCodigoConsulta])}}" method="post">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label>Descrição</label>
                                <textarea name="avadescricao" class="form-control" required>{{$oAvaliacao->avadescricao}}</textarea>

                            </div>

                            <div class="form-group">
                                <label>Nota</label>
                                <input type="number" name="avanota" class="form-control" value="{{$oAvaliacao->avanota}}" min="0" max="10" step="1" required>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-lg btn-success">Alterar avaliação</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
