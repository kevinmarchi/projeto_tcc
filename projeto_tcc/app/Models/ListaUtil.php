<?php

namespace App\Models;

class ListaUtil
{

    public static function getListaAtivo($iValor) {
        switch ($iValor) {
            case 0: return 'Não';
            case 1: return 'Sim';
        }
    }

    public static function getListaContatoPreferencial($iValor) {
        switch ($iValor) {
            case 0: return 'Não';
            case 1: return 'Sim';
        }
    }

    public static function getListaTipoContato($iValor) {
        switch ($iValor) {
            case 1: return 'Telefone';
            case 2: return 'E-mail';
        }
    }

    public static function getListaTipoConsultorioHorario($iValor) {
        switch ($iValor) {
            case 1: return 'Consulta';
            case 2: return 'Intervalo';
        }
    }

    public static function getListaSituacaoAgendaHorario($iValor) {
        switch ($iValor) {
            case 1: return 'Disponível';
            case 2: return 'Alocado';
        }
    }

    public static function getListaSituacaoConsulta($iValor) {
        switch ($iValor) {
            case 1: return 'Aguardando';
            case 2: return 'Confirmada';
            case 3: return 'Finalizada';
            case 4: return 'Cancelada';
        }
    }

}
