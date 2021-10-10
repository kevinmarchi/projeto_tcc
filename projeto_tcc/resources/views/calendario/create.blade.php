@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Incluir Calendário') }}</div>
                    <div class="card-body">

                        <form action="{{route('calendario.store')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Ano</label>
                                <input type="number" name="calano" class="form-control" value="{{old('calano')}}" required>
                            </div>

                            <div class="form-group">
                                <label>Data</label>
                                <input type="date" name="caldata" class="form-control" value="{{old('caldata')}}" required>
                            </div>

                            <div class="form-group">
                                <label>Ativo</label>
                                <input type="checkbox" name="calativo" class="form-check" value="1" checked onclick="return false;">
                            </div>

                            <div>
                                <button type="submit" class="btn btn-lg btn-success">Criar Calendário</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
