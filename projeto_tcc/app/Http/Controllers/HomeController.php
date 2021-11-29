<?php

namespace App\Http\Controllers;

use App\Models\MedicoConsultorio;
use App\Models\MedicoEspecialidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $oMedicos = $this->getQueryConsulta()->get();

        return view('home', compact('oMedicos'));
    }

    public function search(Request $request) {
        $oRequest = $request->all();
        $oQuery = $this->getQueryConsulta();

        if (isset($oRequest['filter-option'])) {
            switch ($oRequest['filter-option']) {
                case 1:
                    $oQuery->where('tbcidade.cidnome', 'ILIKE', '%'.$oRequest['filter-value'].'%');
                break;
                case 2:
                    $oQuery->where('users.usunome', 'ILIKE', '%'.$oRequest['filter-value'].'%');
                break;
                case 3:
                    $oQuery->where('tbconsultorio.condescricao', 'ILIKE', '%'.$oRequest['filter-value'].'%');
                break;
            }
        }

        $oMedicos = $oQuery->get();

        return view('home', compact('oMedicos'));
    }

    private function getQueryConsulta() {
        $oMedicos = MedicoConsultorio::query()
            ->select([
                'tbmedicoconsultorio.meccodigo',
                'tbmedicoconsultorio.concodigo',
                'tbmedicoconsultorio.medcodigo',
                DB::raw("(
                                        SELECT AVG(avanota)::numeric(4,2)
                                          FROM tbavaliacao
                                          JOIN tbconsulta
                                            ON tbavaliacao.cnscodigo = tbconsulta.cnscodigo
                                          JOIN tbagendahorario
                                            ON tbagendahorario.aghcodigo = tbconsulta.aghcodigo
                                          JOIN tbagenda
                                            ON tbagenda.agencodigo = tbagendahorario.agencodigo
                                          JOIN tbmedicoconsultorio as \"1\"
                                            ON \"1\".meccodigo = tbagenda.meccodigo
                                         WHERE \"1\".meccodigo = tbmedicoconsultorio.meccodigo
                                        ) as nota"
                ),
                DB::raw("(
                                        SELECT string_agg(espnome::text, ', ')
                                          FROM(
                                               SELECT espnome
                                                 FROM tbmedicoespecialidade
                                                 JOIN tbespecialidade
                                                   ON tbmedicoespecialidade.espcodigo = tbespecialidade.espcodigo
                                                WHERE medcodigo = tbmedico.medcodigo) as especialidades
                                        ) as especialidade"
                ),
                'users.usunome',
                'tbcidade.cidnome',
                'tbconsultorio.condescricao',
                'tbcidade.cidnome'
            ])
            ->join('tbmedico'             , 'tbmedico.medcodigo'             , '=', 'tbmedicoconsultorio.medcodigo')
            ->join('users'                , 'users.usucodigo'                , '=', 'tbmedico.usucodigo')
            ->join('tbconsultorio'        , 'tbconsultorio.concodigo'        , '=', 'tbmedicoconsultorio.concodigo')
            ->join('tbendereco'           , 'tbendereco.endcodigo'           , '=', 'tbconsultorio.endcodigo')
            ->join('tbcidade'             , 'tbcidade.cidcodigo'           , '=', 'tbendereco.cidcodigo');

        return $oMedicos;

    }
}
