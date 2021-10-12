@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Incluir Horário da Agenda') }}</div>
                    <div class="card-body">

                        <form action="{{route('agendahorario/store', ['iCodigo' => $iCodigo])}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Agenda</label>
                                <select class="form-control" name="agencodigo" required value="{{old('agencodigo')}}" readonly>
                                    <option value="{{$oAgenda->agencodigo}}">{{$oAgenda->agendescricao}}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Descrição</label>
                                <input type="text" name="aghdescricao" class="form-control" value="{{old('aghdescricao')}}" required maxlength="100">
                            </div>

                            <div class="form-group">
                                <label>Data</label>
                                <input type="date" name="aghdata" class="form-control" value="{{old('aghdata')}}" required>
                            </div>

                            <div class="form-group">
                                <label>Horário de Início</label>
                                <input type="time" name="aghhorarioinicio" class="form-control" value="{{old('aghhorarioinicio')}}" required>
                            </div>

                            <div class="form-group">
                                <label>Horário de Término</label>
                                <input type="time" name="aghhorariofim" class="form-control" value="{{old('aghhorariofim')}}" required>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-lg btn-success">Criar Horário da Agenda</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
