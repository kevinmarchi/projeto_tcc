@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Agendar Consulta Médica') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="card mb-2 col-6">
                                <div class="card-body">
                                    <h5 class="card-title">Informações do Médico</h5>
                                    <p class="card-text">Nome: {{$oMedicoConsultorio->medico->user->usunome}}</p>
                                    <p class="card-text">CPF: {{$oMedicoConsultorio->medico->user->usucpf}}</p>
                                    <p class="card-text">Registro: {{$oMedicoConsultorio->medico->medregistro}}</p>
                                    <p class="card-text">Especialidade(s):
                                        @foreach($oMedicoConsultorio->medico->medicoespecialidade as $oMedicoEspecialidade)
                                            {{$oMedicoEspecialidade->especialidade->espnome}},
                                        @endforeach
                                    </p>
                                </div>
                            </div>

                            <div class="card mb-2 col-6">
                                <div class="card-body">
                                    <h5 class="card-title">Informações do Consultório</h5>
                                    <p class="card-text">Nome: {{$oMedicoConsultorio->consultorio->condescricao}}</p>
                                    <p class="card-text">
                                        Endereço: {{$oMedicoConsultorio->consultorio->endereco->endlogradouro}},
                                        Número: {{$oMedicoConsultorio->consultorio->endereco->endnumero}},
                                        Complemento: {{$oMedicoConsultorio->consultorio->endereco->endcomplemento}}.
                                    </p>
                                    <p class="card-text">Cidade: {{$oMedicoConsultorio->consultorio->endereco->cidade->cidnome}}</p>
                                    <p class="card-text">Estado: {{$oMedicoConsultorio->consultorio->endereco->cidade->estado->estnome}}</p>
                                    <h5>Contatos:</h5>
                                    @foreach($oMedicoConsultorio->consultorio->contato as $oContato)
                                        <p class="card-text">Tipo: {{\App\Models\ListaUtil::getListaTipoContato($oContato->cnttipo)}}, Descrição: {{$oContato->cntdescricao}}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <form action="{{route('consulta/store')}}" method="post" style="width: 100%">
                                @csrf

                                <input type="hidden" name="usucodigo" value="{{Auth::user()->usucodigo}}">

                                <div class="card mb-2 col-12">
                                    <div class="card-body">
                                        <h5 class="card-title">Horários disponíveis</h5>
                                        @foreach($oAgendaHorario as $oHorario)
                                            <div class="form-check">
                                                <input type="radio" name="aghcodigo" value="{{$oHorario->aghcodigo}}" id="{{$oHorario->aghcodigo}}" class="form-check-input">
                                                <label for="{{$oHorario->aghcodigo}}" class="form-check-label">
                                                    Dia: {{\Carbon\Carbon::parse($oHorario->aghdata)->format('d/m/Y')}}
                                                    Horario: {{$oHorario->aghhorarioinicio}} - {{$oHorario->aghhorariofim}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-lg btn-success">Agendar Consulta</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
