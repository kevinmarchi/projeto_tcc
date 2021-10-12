@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Alterar Calendário') }}</div>
                    <div class="card-body">

                        <form action="{{route('calendario.update', ['calendario' => $oCalendario->calcodigo])}}" method="post">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label>Ano</label>
                                <input type="number" name="calano" class="form-control" value="{{$oCalendario->calano}}" disabled>
                            </div>

                            <div class="form-group">
                                <label>Ativo</label>
                                <input type="checkbox" name="calativo" class="form-check" value="1" @if ($oCalendario->calativo == 1) checked @endif>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-lg btn-success">Alterar Calendário</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
