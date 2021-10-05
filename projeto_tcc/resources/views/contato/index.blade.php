@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Contato') }}</div>
                    <div class="card-body">
                        <a href="{{route('contato.create')}}" class="btn btn-lg btn-success">Criar Contato</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Descrição</th>
                                    <th>Preferencial</th>
                                    <th>Ativo</th>
                                    <th>Usuário</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($oContatos as $oContato)
                                    <tr>
                                        <td>{{$oContato->cntcodigo}}</td>
                                        <td>{{$oContato->cntdescricao}}</td>
                                        <td>
                                            @if($oContato->cntpreferencial)
                                                Sim
                                            @else
                                                Não
                                            @endif
                                        </td>
                                        <td>
                                            @if($oContato->cntativo)
                                                Sim
                                            @else
                                                Não
                                            @endif
                                        </td>
                                        <td>{{$oContato->user->usunome}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{route('contato.edit', array('contato'=>$oContato->cntcodigo))}}" class="btn btn-sm btn-primary">Editar</a>
                                                <form action="{{route('contato.destroy', array('contato'=>$oContato->cntcodigo))}}" method="POST">
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
