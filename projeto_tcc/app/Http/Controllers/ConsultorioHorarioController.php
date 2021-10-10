<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\ConsultorioHorario;
use App\Models\ListaUtil;
use Illuminate\Http\Request;

class ConsultorioHorarioController extends Controller
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

        $oConsultoriosHorarios = $this->getConsultoriosHorarios();

        foreach ($oConsultoriosHorarios as $oConsultorioHorario) {
            $oConsultorioHorario->setAttribute('cohtipo', ListaUtil::getListaTipoConsultorioHorario($oConsultorioHorario->getAttribute('cohtipo')));
        }

        return view('consultoriohorario.index', [
            'oConsultoriosHorarios' => $oConsultoriosHorarios,
            'iCodigo' => $this->getCodigo()
        ]);
    }

    public function create($iCodigo)
    {
        $this->setCodigo($iCodigo);
        $oConsultorio = Consultorio::query()->find($this->getCodigo(), ['concodigo', 'condescricao']);
        return view('consultoriohorario.create', [
            'oConsultorio' => $oConsultorio,
            'iCodigo' => $iCodigo
        ]);
    }

    public function store(Request $request, $iCodigo)
    {
        $this->setCodigo($iCodigo);
        $oData = $request->all();

        ConsultorioHorario::create($oData);

        return redirect()->route('consultoriohorario', ['iCodigo' => $this->getCodigo()]);
    }

    public function edit($iCodigoConsultorioHorario, $iCodigo)
    {
        $this->setCodigo($iCodigo);
        $oConsultorioHorario = ConsultorioHorario::find($iCodigoConsultorioHorario);

        return view('consultoriohorario.edit', [
            'oConsultorioHorario' => $oConsultorioHorario,
            'iCodigo' => $this->getCodigo()
        ]);
    }

    public function update(Request $request, $iCodigoConsultorioHorario, $iCodigo)
    {
        $this->setCodigo($iCodigo);
        $oData = $request->all();

        $oConsultorioHorario = ConsultorioHorario::find($iCodigoConsultorioHorario);
        $oConsultorioHorario->update($oData);

        return redirect()->route('consultoriohorario', [
            'iCodigo' => $this->getCodigo()
        ]);
    }

    public function destroy($iCodigoConsultorioHorario, $iCodigo)
    {
        $this->setCodigo($iCodigo);
        $oConsultorioHorario = ConsultorioHorario::find($iCodigoConsultorioHorario);
        $oConsultorioHorario->delete();

        return redirect()->route('consultoriohorario', [
            'iCodigo' => $this->getCodigo()
        ]);
    }

    private function getConsultoriosHorarios() {
        $oQuery = ConsultorioHorario::query();
        $oQuery->where('concodigo', '=', $this->getCodigo());
        return $oQuery->get();
    }
}
