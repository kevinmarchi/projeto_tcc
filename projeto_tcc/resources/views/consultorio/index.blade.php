@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Consultório') }}</div>
                    <div class="card-body">
                        <a href="{{route('consultorio.create')}}" class="btn btn-lg btn-success">Criar Consultório</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Descrição</th>
                                    <th>Endereço - Código</th>
                                    <th>Endereço - Logradouro</th>
                                    <th>Ativo</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($oConsultorios as $oConsultorio)
                                    <tr>
                                        <td>{{$oConsultorio->concodigo}}</td>
                                        <td>{{$oConsultorio->condescricao}}</td>
                                        <td>{{$oConsultorio->endereco->endcodigo}}</td>
                                        <td>{{$oConsultorio->endereco->endlogradouro}}</td>
                                        <td>
                                            @if($oConsultorio->conativo)
                                                Sim
                                            @else
                                                Não
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{route('consultorio.edit', array('consultorio'=>$oConsultorio->concodigo))}}" class="btn btn-sm btn-primary">Editar</a>
                                                <form action="{{route('consultorio.destroy', array('consultorio'=>$oConsultorio->concodigo))}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                                                </form>
                                                <a href="{{route('contato', ['iTipo' => '2', 'iCodigo' => $oConsultorio->concodigo])}}" class="btn btn-sm btn-success">Contatos</a>
                                                <a href="{{route('consultoriohorario', ['iCodigo' => $oConsultorio->concodigo])}}" class="btn btn-sm btn-secondary">Horário</a>
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
