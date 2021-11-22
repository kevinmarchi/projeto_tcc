@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Avaliações') }}</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Usuário</th>
                                    <th>Descrição</th>
                                    <th>Nota</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($oAvaliacoes as $oAvaliacao)
                                    <tr>
                                        <td>{{explode(' ', $oAvaliacao->consulta->user->usunome)[0]}}</td>
                                        <td>{{$oAvaliacao->avadescricao}}</td>
                                        <td>{{$oAvaliacao->avanota}}</td>
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
