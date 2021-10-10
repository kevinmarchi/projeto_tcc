@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Calendário') }}</div>
                    <div class="card-body">
                        <a href="{{route('calendario.create')}}" class="btn btn-lg btn-success">Criar Calendário</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Ano</th>
                                    <th>Data</th>
                                    <th>Ativo</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($oCalendarios as $oCalendario)
                                    <tr>
                                        <td>{{$oCalendario->calcodigo}}</td>
                                        <td>{{$oCalendario->calano}}</td>
                                        <td>{{$oCalendario->caldata}}</td>
                                        <td>{{$oCalendario->calativo}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{route('calendario.edit', array('calendario'=>$oCalendario->calcodigo))}}" class="btn btn-sm btn-primary">Editar</a>
                                                <form action="{{route('calendario.destroy', array('calendario'=>$oCalendario->calcodigo))}}" method="POST">
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
