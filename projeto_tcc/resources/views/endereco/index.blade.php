@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Endereços') }}</div>
                    <div class="card-body">
                        <a href="{{route('endereco.create')}}" class="btn btn-lg btn-success">Criar Endereço</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Logradouro</th>
                                    <th>Número</th>
                                    <th>Complemento</th>
                                    <th>Cidade</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($oEnderecos as $oEndereco)
                                    <tr>
                                        <td>{{$oEndereco->endcodigo}}</td>
                                        <td>{{$oEndereco->endlogradouro}}</td>
                                        <td>{{$oEndereco->endnumero}}</td>
                                        <td>{{$oEndereco->endcomplemento}}</td>
                                        <td>{{$oEndereco->cidade->cidnome}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{route('endereco.edit', array('endereco'=>$oEndereco->endcodigo))}}" class="btn btn-sm btn-primary">Editar</a>
                                                <form action="{{route('endereco.destroy', array('endereco'=>$oEndereco->endcodigo))}}" method="POST">
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
