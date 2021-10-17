<?php

namespace App\Http\Controllers;

use App\Models\AgendaHorario;
use App\Models\Consulta;
use App\Models\ListaUtil;
use App\Models\MedicoConsultorio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{

    public function index()
    {
        $oConsultasUsuario = Consulta::query()->where('usucodigo', '=', Auth::user()->usucodigo)->get();

        foreach ($oConsultasUsuario as $oConsultaHorario) {
            $oConsultaHorario->setAttribute('cnssituacao', ListaUtil::getListaSituacaoConsulta($oConsultaHorario->getAttribute('cnssituacao')));
        }

        $oConsultasAdmin = Consulta::query()
                          ->join('tbagendahorario', 'tbconsulta.aghcodigo', '=', 'tbagendahorario.aghcodigo')
                          ->join('tbagenda', 'tbagenda.agencodigo', '=', 'tbagendahorario.agencodigo')
                          ->join('tbmedicoconsultorio', 'tbmedicoconsultorio.meccodigo', '=', 'tbagenda.meccodigo')
                          ->join('tbmedico', 'tbmedico.medcodigo', '=', 'tbmedicoconsultorio.medcodigo')
                          ->leftJoin('tbusuariomedicoconsultorio', 'tbusuariomedicoconsultorio.meccodigo', '=', 'tbmedicoconsultorio.meccodigo')
                          ->where('tbmedico.usucodigo', '=', Auth::user()->usucodigo)
                          ->where('tbusuariomedicoconsultorio.usucodigo', '=', Auth::user()->usucodigo, 'OR')
                          ->get();

        foreach ($oConsultasAdmin as $oConsultaAdmin) {
            $oConsultaAdmin->setAttribute('cnssituacao', ListaUtil::getListaSituacaoConsulta($oConsultaAdmin->getAttribute('cnssituacao')));
        }

        return view('consulta.index', [
            'oConsultasUsuario' => $oConsultasUsuario,
            'oConsultasAdmin' => $oConsultasAdmin
        ]);
    }


    public function create($iCodigo)
    {
        $oMedicoConsultorio = MedicoConsultorio::find($iCodigo);

        $oAgenda = DB::table('tbagenda')
                   ->join('tbcalendario', 'tbagenda.calcodigo', '=', 'tbcalendario.calcodigo')
                   ->where('meccodigo', '=', $iCodigo)
                   ->where('calano', '=', Carbon::now()->format('Y'))
                   ->get()[0];

        $oAgendaHorario = DB::table('tbagendahorario')
                          ->where('agencodigo', '=', $oAgenda->agencodigo)
                          ->where('aghsituacao', '=', 1)
                          ->orderBy('aghdata')
                          ->get();

        return view('consulta.create', [
            'oMedicoConsultorio' => $oMedicoConsultorio,
            'oAgenda' => $oAgenda,
            'oAgendaHorario' => $oAgendaHorario
        ]);
    }


    public function store(Request $request)
    {
        $oData = $request->all();
        Consulta::create($oData);

        /** @var $oAgendaHorario AgendaHorario*/
        $oAgendaHorario = AgendaHorario::find($oData['aghcodigo']);
        $oAgendaHorario->update(['aghsituacao' => 2]);

        return redirect()->route('consulta');
    }

    public function cancel($consulta) {
        $oConsulta = Consulta::find($consulta);
        $oConsulta->update(['cnssituacao' => 4]);

        /** @var $oAgendaHorario AgendaHorario*/
        $oAgendaHorario = AgendaHorario::find($oConsulta->aghcodigo);
        $oAgendaHorario->update(['aghsituacao' => 1]);

        return redirect()->route('consulta');
    }

    public function confirm($consulta) {
        $oConsulta = Consulta::find($consulta);
        $oConsulta->update(['cnssituacao' => 2]);

        /** @var $oAgendaHorario AgendaHorario*/
        $oAgendaHorario = AgendaHorario::find($oConsulta->aghcodigo);
        $oAgendaHorario->update(['aghsituacao' => 2]);

        return redirect()->route('consulta');
    }

    public function finalize($consulta) {
        $oConsulta = Consulta::find($consulta);
        $oConsulta->update(['cnssituacao' => 3]);

        /** @var $oAgendaHorario AgendaHorario*/
        $oAgendaHorario = AgendaHorario::find($oConsulta->aghcodigo);
        $oAgendaHorario->update(['aghsituacao' => 2]);

        return redirect()->route('consulta');
    }

}
