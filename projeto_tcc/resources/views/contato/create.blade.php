@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Incluir Contato') }}</div>
                    <div class="card-body">

                        <form action="{{route('contato/store', ['iTipo' => $iTipo, 'iCodigo' => $iCodigo])}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Tipo</label>
                                <select class="form-control" name="cnttipo" required value="{{old('cnttipo')}}">
                                    <option value="1">Telefone</option>
                                    <option value="2">E-mail</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Descrição</label>
                                <input type="text" name="cntdescricao" class="form-control" value="{{old('cntdescricao')}}" required>
                            </div>

                            <div class="form-group">
                                <label>Usuário</label>
                                <select name="usucodigo" class="form-control" readonly required>
                                    @isset($oUsuario)
                                        <option value="{{$oUsuario->usucodigo}}">{{$oUsuario->usunome}}</option>
                                    @endisset
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Consultório</label>
                                <select name="concodigo" class="form-control" readonly required>
                                    @isset($oConsultorio)
                                        <option value="{{$oConsultorio->concodigo}}">{{$oConsultorio->condescricao}}</option>
                                    @endisset
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Preferencial</label>
                                <input type="checkbox" name="cntpreferencial" class="form-check" value="1">
                            </div>

                            <div class="form-group">
                                <label>Ativo</label>
                                <input type="checkbox" name="cntativo" class="form-check" value="1" checked onclick="return false;">
                            </div>

                            <div>
                                <button type="submit" class="btn btn-lg btn-success">Criar Contato</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
