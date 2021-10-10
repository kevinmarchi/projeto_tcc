@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Alterar Consultório') }}</div>
                    <div class="card-body">

                        <form action="{{route('consultorio.update', ['consultorio' => $oConsultorio->concodigo])}}" method="post">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label>Descrição</label>
                                <input type="text" name="condescricao" class="form-control" value="{{$oConsultorio->condescricao}}">
                            </div>

                            <div class="form-group">
                                <label>Endereço</label>
                                <select name="endcodigo" class="form-control" disabled>
                                    <option value="{{$oConsultorio->endereco->endcodigo}}">{{$oConsultorio->endereco->endlogradouro}}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Ativo</label>
                                <input type="checkbox" name="cntativo" class="form-check" value="1" checked>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-lg btn-success">Alterar Consultório</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
