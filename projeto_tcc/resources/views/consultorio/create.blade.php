@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Incluir Consultório') }}</div>
                    <div class="card-body">

                        <form action="{{route('consultorio.store')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Descrição</label>
                                <input type="text" name="condescricao" class="form-control value="{{old('condescricao')}}">
                            </div>

                            <div class="form-group">
                                <label>Endereço</label>
                                <select name="endcodigo" class="form-control" required>
                                    @foreach($oEnderecos as $oEndereco)
                                        <option value="{{$oEndereco->endcodigo}}" @if($oEndereco->endcodigo == old('endcodigo')) selected @endif>{{$oEndereco->endlogradouro}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Ativo</label>
                                <input type="checkbox" name="conativo" class="form-check" value="1" checked>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-lg btn-success">Criar Consultório</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
