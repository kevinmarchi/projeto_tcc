@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Especialidade do Médico') }}</div>
                    <div class="card-body">
                        <a href="{{route('medicoespecialidade.create')}}" class="btn btn-lg btn-success">Criar Especialidade do Médico</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Médico</th>
                                    <th>Especialidade</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($oMedicosEspecialidades as $oMedicoEspecialidade)
                                    <tr>
                                        <td>{{$oMedicoEspecialidade->mescodigo}}</td>
                                        <td>{{$oMedicoEspecialidade->medico->user->usunome}}</td>
                                        <td>{{$oMedicoEspecialidade->especialidade->espnome}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <form action="{{route('medicoespecialidade.destroy', ['medicoespecialidade'=>$oMedicoEspecialidade->mescodigo])}}" method="POST">
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
