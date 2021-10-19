@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Alterar Endereço') }}</div>
                    <div class="card-body">

                        <form action="{{route('endereco.update', ['endereco' => $oEndereco->endcodigo])}}" method="post">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label>Logradouro</label>
                                <input type="text" name="endlogradouro" class="form-control" value="{{$oEndereco->endlogradouro}}" required maxlength="255">
                            </div>

                            <div class="form-group">
                                <label>Número</label>
                                <input type="number" name="endnumero" class="form-control" value="{{$oEndereco->endnumero}}" required>
                            </div>

                            <div class="form-group">
                                <label>Complemento</label>
                                <textarea name="endcomplemento" class="form-control" required>{{$oEndereco->endcomplemento}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Cidade</label>
                                <select name="cidcodigo" class="form-control" disabled>
                                    <option value="{{$oEndereco->cidade->cidcodigo}}">{{$oEndereco->cidade->cidnome}}</option>
                                </select>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-lg btn-success">Alterar Endereço</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
