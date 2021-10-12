<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Calendario;
use App\Models\MedicoConsultorio;
use Illuminate\Http\Request;

class AgendaController extends Controller
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

        $oAgendas = $this->getAgendas();

        return view('agenda.index', [
            'oAgendas' => $oAgendas,
            'iCodigo' => $this->getCodigo()
        ]);
    }

    public function create($iCodigo)
    {
        $this->setCodigo($iCodigo);
        $oMedicoConsultorio = MedicoConsultorio::query()->find($this->getCodigo());
        $oCalendarios = Calendario::all();

        return view('agenda.create', [
            'oMedicoConsultorio' => $oMedicoConsultorio,
            'oCalendarios' => $oCalendarios,
            'iCodigo' => $iCodigo
        ]);
    }

    public function store(Request $request, $iCodigo)
    {
        $this->setCodigo($iCodigo);
        $oData = $request->all();

        Agenda::create($oData);

        return redirect()->route('agenda', ['iCodigo' => $this->getCodigo()]);
    }

    public function edit($iCodigoAgenda, $iCodigo)
    {
        $this->setCodigo($iCodigo);

        $oAgenda = Agenda::find($iCodigoAgenda);

        return view('agenda.edit', [
            'oAgenda' => $oAgenda,
            'iCodigo' => $this->getCodigo()
        ]);
    }

    public function update(Request $request, $iCodigoAgenda, $iCodigo)
    {
        $this->setCodigo($iCodigo);
        $oData = $request->all();

        $oAgenda = Agenda::find($iCodigoAgenda);
        $oAgenda->update($oData);

        return redirect()->route('agenda', [
            'iCodigo' => $this->getCodigo()
        ]);
    }

    public function destroy($iCodigoAgenda, $iCodigo)
    {
        $this->setCodigo($iCodigo);

        $oAgenda = Agenda::find($iCodigoAgenda);
        $oAgenda->delete();

        return redirect()->route('agenda', [
            'iCodigo' => $this->getCodigo()
        ]);
    }

    private function getAgendas() {
        $oQuery = Agenda::query();
        $oQuery->where('meccodigo', '=', $this->getCodigo());
        return $oQuery->get();
    }
}
