@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Incluir Item do Calendário') }}</div>
                    <div class="card-body">

                        <form action="{{route('calendarioitem/store', ['iCodigo' => $iCodigo])}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Calendário</label>
                                <select class="form-control" name="calcodigo" required value="{{old('calcodigo')}}" readonly>
                                    <option value="{{$oCalendario->calcodigo}}">{{$oCalendario->calano}}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Data</label>
                                <input type="date" name="caidata" class="form-control", required value="{{old('caidata')}}">
                            </div>



                            <div>
                                <button type="submit" class="btn btn-lg btn-success">Criar Item do Calendário</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
