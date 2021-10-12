@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Agenda') }}</div>
                    <div class="card-body">
                        <a href="{{route('agenda/create', ['iCodigo' => $iCodigo])}}" class="btn btn-lg btn-success">Criar Agenda</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Descrição</th>
                                    <th>Calendário - Código</th>
                                    <th>Calendário - Ano</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($oAgendas as $oAgenda)
                                    <tr>
                                        <td>{{$oAgenda->agencodigo}}</td>
                                        <td>{{$oAgenda->agendescricao}}</td>
                                        <td>{{$oAgenda->calendario->calcodigo}}</td>
                                        <td>{{$oAgenda->calendario->calano}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{route('agenda/edit', ['iCodigoAgenda'=>$oAgenda->agencodigo, 'iCodigo' => $iCodigo])}}" class="btn btn-sm btn-primary">Editar</a>
                                                <form action="{{route('agenda/destroy', ['iCodigoAgenda'=>$oAgenda->agencodigo, 'iCodigo' => $iCodigo])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                                                </form>
                                                <a href="{{route('agendahorario', ['iCodigo' => $oAgenda->agencodigo])}}" class="btn btn-sm btn-success">Itens</a>
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
