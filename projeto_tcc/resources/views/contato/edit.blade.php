@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Alterar Contato') }}</div>
                    <div class="card-body">

                        <form action="{{route('contato/update', ['iCodigoContato' => $oContato->cntcodigo, 'iTipo' => $iTipo, 'iCodigo' => $iCodigo])}}" method="post">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label>Tipo</label>
                                <select class="form-control" name="cnttipo" required value="{{$oContato->cnttipo}}" disabled>
                                    <option value="1" @if($oContato->cnttipo == 1) selected @endif>Telefone</option>
                                    <option value="2" @if($oContato->cnttipo == 2) selected @endif>E-mail</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Descrição</label>
                                <input type="text" name="cntdescricao" class="form-control" value="{{$oContato->cntdescricao}}" required>
                            </div>

                            <div class="form-group">
                                <label>Usuário</label>
                                <select name="usucodigo" class="form-control" readonly required>
                                    @isset($oContato->user)
                                        <option value="{{$oContato->user->usucodigo}}">{{$oContato->user->usunome}}</option>
                                    @endisset
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Consultório</label>
                                <select name="concodigo" class="form-control" readonly required>
                                    @isset($oContato->consultorio)
                                        <option value="{{$oContato->consultorio->concodigo}}">{{$oContato->consultorio->condescricao}}</option>
                                    @endisset
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Preferencial</label>
                                <input type="checkbox" name="cntpreferencial" class="form-check" value="1" @if ($oContato->cntpreferencial == 1) checked @endif}>
                            </div>

                            <div class="form-group">
                                <label>Ativo</label>
                                <input type="checkbox" name="cntativo" class="form-check" value="1" @if ($oContato->cntativo == 1) checked @endif>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-lg btn-success">Alterar Contato</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
