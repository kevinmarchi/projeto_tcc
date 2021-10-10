@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Especialidade') }}</div>
                    <div class="card-body">
                        <a href="{{route('especialidade.create')}}" class="btn btn-lg btn-success">Criar Especialidade</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($oEspecialidades as $oEspecialidade)
                                    <tr>
                                        <td>{{$oEspecialidade->espcodigo}}</td>
                                        <td>{{$oEspecialidade->espnome}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{route('especialidade.edit', array('especialidade'=>$oEspecialidade->espcodigo))}}" class="btn btn-sm btn-primary">Editar</a>
                                                <form action="{{route('especialidade.destroy', array('especialidade'=>$oEspecialidade->espcodigo))}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                                                </form>
                                            </div>
                                        </td>
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
