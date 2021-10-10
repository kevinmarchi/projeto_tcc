@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Equipe do Médico por Consultório') }}</div>
                    <div class="card-body">
                        <a href="{{route('usuariomedicoconsultorio/create', ['iCodigo' => $iCodigo])}}" class="btn btn-lg btn-success">Incluir Integrante da Equipe</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Usuário</th>
                                    <th>Consultório</th>
                                    <th>Médico</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($oUsuariosMedicoConsultorio as $oUsuarioMedicoConsultorio)
                                    <tr>
                                        <td>{{$oUsuarioMedicoConsultorio->usacodigo}}</td>
                                        <td>{{$oUsuarioMedicoConsultorio->user->usunome}}</td>
                                        <td>{{$oUsuarioMedicoConsultorio->medicoconsultorio->consultorio->condescricao}}</td>
                                        <td>{{$oUsuarioMedicoConsultorio->medicoconsultorio->medico->user->usunome}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <form action="{{route('usuariomedicoconsultorio/destroy', ['iCodigoUsuarioMedicoConsultorio'=>$oUsuarioMedicoConsultorio->usacodigo, 'iCodigo' => $iCodigo])}}" method="POST">
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
