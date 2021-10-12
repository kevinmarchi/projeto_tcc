<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\AgendaHorario;
use App\Models\ListaUtil;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AgendaHorarioController extends Controller
{

    private $codigo;

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function index($iCodigo)
    {
        $this->setCodigo($iCodigo);

        $oAgendaHorarios = $this->getAgendaHorarios();

        foreach ($oAgendaHorarios as $oAgendaHorario) {
            $oAgendaHorario->setAttribute('aghdata', Carbon::parse($oAgendaHorario->getAttribute('aghdata'))->format('d/m/Y'));
            $oAgendaHorario->setAttribute('aghsituacao', ListaUtil::getListaSituacaoAgendaHorario($oAgendaHorario->getAttribute('aghsituacao')));
        }

        return view('agendahorario.index', [
            'oAgendaHorarios' => $oAgendaHorarios,
            'iCodigo' => $this->getCodigo()
        ]);
    }

    public function create($iCodigo)
    {
        $this->setCodigo($iCodigo);
        $oAgenda = Agenda::query()->find($iCodigo);

        return view('agendahorario.create', [
            'oAgenda' => $oAgenda,
            'iCodigo' => $this->getCodigo()
        ]);
    }

    public function store(Request $request, $iCodigo)
    {
        $this->setCodigo($iCodigo);
        $oData = $request->all();

        AgendaHorario::create($oData);

        return redirect()->route('agendahorario', ['iCodigo' => $this->getCodigo()]);
    }

    public function edit($iCodigoAgendaHorario, $iCodigo)
    {
        $this->setCodigo($iCodigo);

        $oAgendaHorario = AgendaHorario::find($iCodigoAgendaHorario);

        return view('agendahorario.edit', [
            'oAgendaHorario' => $oAgendaHorario,
            'iCodigo' => $this->getCodigo()
        ]);
    }

    public function update(Request $request, $iCodigoAgendaHorario, $iCodigo)
    {
        $this->setCodigo($iCodigo);
        $oData = $request->all();

        $oAgendahorario = AgendaHorario::find($iCodigoAgendaHorario);
        $oAgendahorario->update($oData);

        return redirect()->route('agendahorario', [
            'iCodigo' => $this->getCodigo()
        ]);
    }

    public function destroy($iCodigoAgendaHorario, $iCodigo)
    {
        $this->setCodigo($iCodigo);

        $oAgendaHorario = AgendaHorario::find($iCodigoAgendaHorario);
        $oAgendaHorario->delete();

        return redirect()->route('agendahorario', [
            'iCodigo' => $this->getCodigo()
        ]);
    }

    private function getAgendaHorarios() {
        $oQuery = AgendaHorario::query();
        $oQuery->where('agencodigo', '=', $this->getCodigo());
        return $oQuery->get();
    }
}
