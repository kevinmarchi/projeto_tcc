@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Alterar Contato') }}</div>
                    <div class="card-body">

                        <form action="{{route('contato.update', ['contato' => $oContato->cntcodigo])}}" method="post">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label>Descrição</label>
                                <input type="text" name="cntdescricao" class="form-control" value="{{$oContato->cntdescricao}}">
                            </div>

                            <div class="form-group">
                                <label>Usuário</label>
                                <select name="usucodigo" class="form-control" disabled>
                                    <option value="{{$oContato->user->usucodigo}}">{{$oContato->user->usunome}}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Preferencial</label>
                                <input type="checkbox" name="cntpreferencial" class="form-check" value="1">
                            </div>

                            <div class="form-group">
                                <label>Ativo</label>
                                <input type="checkbox" name="cntativo" class="form-check" value="1" checked>
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
