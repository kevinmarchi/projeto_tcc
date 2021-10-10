@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Consultório do Médico') }}</div>
                    <div class="card-body">
                        <a href="{{route('medicoconsultorio.create')}}" class="btn btn-lg btn-success">Criar Consultório do Médico</a>
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
