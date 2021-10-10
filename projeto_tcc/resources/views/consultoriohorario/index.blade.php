@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Horário do Consultório') }}</div>
                    <div class="card-body">
                        <a href="{{route('consultoriohorario/create', ['iCodigo' => $iCodigo])}}" class="btn btn-lg btn-success">Criar Horário do Consultório</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Consultório</th>
                                    <th>Tipo</th>
                                    <th>Horário de Início</th>
                                    <th>Horário de Término</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($oConsultoriosHorarios as $oConsultorioHorario)
                                    <tr>
                                        <td>{{$oConsultorioHorario->cohcodigo}}</td>
                                        <td>{{$oConsultorioHorario->consultorio->condescricao}}</td>
                                        <td>{{$oConsultorioHorario->cohtipo}}</td>
                                        <td>{{$oConsultorioHorario->cohhorainicio}}</td>
                                        <td>{{$oConsultorioHorario->cohhorafim}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{route('consultoriohorario/edit', ['iCodigoConsultorioHorario'=>$oConsultorioHorario->cohcodigo, 'iCodigo' => $iCodigo])}}" class="btn btn-sm btn-primary">Editar</a>
                                                <form action="{{route('consultoriohorario/destroy', ['iCodigoConsultorioHorario'=>$oConsultorioHorario->cohcodigo, 'iCodigo' => $iCodigo])}}" method="POST">
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
