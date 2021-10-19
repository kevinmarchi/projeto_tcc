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
                                         WHERE \"1\".medcodigo = tbmedicoconsultorio.medcodigo
                                        ) as nota"
                        )
                    ])
                    ->join('tbmedicoespecialidade', 'tbmedicoespecialidade.medcodigo', '=', 'tbmedicoconsultorio.medcodigo')
                    ->get();

        return view('home', compact('oMedicos'));
    }
}
