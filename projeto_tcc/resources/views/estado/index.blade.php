@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Estados') }}</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>UF</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($oEstados as $oEstado)
                                    <tr>
                                        <td>{{$oEstado->estcodigo}}</td>
                                        <td>{{$oEstado->estnome}}</td>
                                        <td>{{$oEstado->estuf}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
