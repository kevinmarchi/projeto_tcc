@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Cidades') }}</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Estado</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($oCidades as $oCidade)
                                    <tr>
                                        <td>{{$oCidade->cidcodigo}}</td>
                                        <td>{{$oCidade->cidnome}}</td>
                                        <td>{{$oCidade->estado->estuf}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$oCidades->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
