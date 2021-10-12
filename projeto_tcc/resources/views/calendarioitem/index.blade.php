@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Itens do Calendário') }}</div>
                    <div class="card-body">
                        <a href="{{route('calendarioitem/create', ['iCodigo' => $iCodigo])}}" class="btn btn-lg btn-success">Incluir Item do Calendário</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Calendário</th>
                                    <th>Data</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($oCalendarioItens as $oCalendarioItem)
                                    <tr>
                                        <td>{{$oCalendarioItem->caicodigo}}</td>
                                        <td>{{$oCalendarioItem->calendario->calano}}</td>
                                        <td>{{$oCalendarioItem->caidata}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <form action="{{route('calendarioitem/destroy', ['iCodigoCalendarioItem'=>$oCalendarioItem->caicodigo, 'iCodigo' => $iCodigo])}}" method="POST">
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
