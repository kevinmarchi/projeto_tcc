@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Contato') }}</div>
                    <div class="card-body">
                        <a href="{{route('contato/create' , ['iTipo' => $iTipo, 'iCodigo' => $iCodigo])}}" class="btn btn-lg btn-success">Criar Contato</a>
{{--                        @dd($oContatos)--}}
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Tipo</th>
                                    <th>Descrição</th>
                                    <th>Preferencial</th>
                                    <th>Ativo</th>
                                    <th>Usuário</th>
                                    <th>Consultório</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($oContatos as $oContato)
                                    <tr>
                                        <td>{{$oContato->cntcodigo}}</td>
                                        <td>{{$oContato->cnttipo}}</td>
                                        <td>{{$oContato->cntdescricao}}</td>
                                        <td>{{$oContato->cntpreferencial}}</td>
                                        <td>{{$oContato->cntativo}}</td>
                                        <td>@isset($oContato->user->usunome) {{$oContato->user->usunome}} @endisset</td>
                                        <td>@isset($oContato->consultorio->condescricao) {{$oContato->consultorio->condescricao}} @endisset</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{route('contato/edit', ['iCodigoContato'=>$oContato->cntcodigo, 'iTipo' => $iTipo, 'iCodigo' => $iCodigo])}}" class="btn btn-sm btn-primary">Editar</a>
                                                <form action="{{route('contato/destroy', ['iCodigoContato'=>$oContato->cntcodigo, 'iTipo' => $iTipo, 'iCodigo' => $iCodigo])}}" method="POST">
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
