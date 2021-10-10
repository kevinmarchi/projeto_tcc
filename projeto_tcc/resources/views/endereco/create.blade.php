@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Incluir Endereço') }}</div>
                    <div class="card-body">

                        <form action="{{route('endereco.store')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Logradouro</label>
                                <input type="text" name="endlogradouro" class="form-control" value="{{old('endlogradouro')}}" required maxlength="255">
                            </div>

                            <div class="form-group">
                                <label>Número</label>
                                <input type="number" name="endnumero" class="form-control" value="{{old('endnumero')}}" required>
                            </div>

                            <div class="form-group">
                                <label>Logradouro</label>
                                <textarea name="endcomplemento" class="form-control" required>{{old('endcomplemento')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Cidade</label>
                                <select name="cidcodigo" class="form-control" required>
                                    @foreach($oCidades as $oCidade)
                                        <option value="{{$oCidade->cidcodigo}}" @if($oCidade->cidcodigo == old('cidcodigo')) selected @endif>{{$oCidade->cidnome}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-lg btn-success">Criar Endereço</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
