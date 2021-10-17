@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Consultório do Médico') }}</div>
                    <div class="card-body">
                        @php
                            $bMedico = isset(\App\Models\Medico::query()->join('users', 'tbmedico.usucodigo', '=', 'users.usucodigo')->where('tbmedico.usucodigo', '=', Auth::user()->usucodigo)->get()[0])
                        @endphp
                        @if($bMedico)
                            <a href="{{route('medicoconsultorio.create')}}" class="btn btn-lg btn-success">Criar Consultório do Médico</a>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Médico</th>
                                    <th>Consultório</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($oMedicosConsultorios as $oMedicoConsultorio)
                                    <tr>
                                        <td>{{$oMedicoConsultorio->meccodigo}}</td>
                                        <td>{{$oMedicoConsultorio->medico->user->usunome}}</td>
                                        <td>{{$oMedicoConsultorio->consultorio->condescricao}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <form action="{{route('medicoconsultorio.destroy', ['medicoconsultorio'=>$oMedicoConsultorio->meccodigo])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                                                </form>
                                                <a href="{{route('usuariomedicoconsultorio', ['iCodigo' => $oMedicoConsultorio->meccodigo])}}" class="btn btn-sm btn-secondary">Equipe Administrativa</a>
                                                <a href="{{route('agenda', ['iCodigo' => $oMedicoConsultorio->meccodigo])}}" class="btn btn-sm btn-success">Agenda</a>
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
