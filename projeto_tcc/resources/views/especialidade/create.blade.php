@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Incluir Especialidade') }}</div>
                    <div class="card-body">

                        <form action="{{route('especialidade.store')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" name="espnome" class="form-control" value="{{old('espnome')}}" required>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-lg btn-success">Criar Especialidade</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
