<?php

namespace App\Http\Controllers;

use App\Models\MedicoConsultorio;
use App\Models\User;
use App\Models\UsuarioMedicoConsultorio;
use Illuminate\Http\Request;

class UsuarioMedicoConsultorioController extends Controller
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

        $oUsuariosMedicoConsultorio = $this->getUsuariosMedicoConsultorio();

        return view('usuariomedicoconsultorio.index', [
            'oUsuariosMedicoConsultorio' => $oUsuariosMedicoConsultorio,
            'iCodigo' => $this->getCodigo()
        ]);
    }


    public function create($iCodigo)
    {
        $this->setCodigo($iCodigo);
        $oMedicoConsultorio = MedicoConsultorio::query()->find($iCodigo);
        $oUsuarios = User::all();

        return view('usuariomedicoconsultorio.create', [
            'oMedicoConsultorio' => $oMedicoConsultorio,
            'iCodigo' => $this->getCodigo(),
            'oUsuarios' => $oUsuarios
        ]);
    }


    public function store(Request $request, $iCodigo)
    {
        $this->setCodigo($iCodigo);
        $oData = $request->all();

        UsuarioMedicoConsultorio::create($oData);

        return redirect()->route('usuariomedicoconsultorio', ['iCodigo' => $this->getCodigo()]);
    }

    public function destroy($iCodigoUsuarioMedicoConsultorio, $iCodigo)
    {
        $this->setCodigo($iCodigo);
        $oUsuarioMedicoConsultorio = UsuarioMedicoConsultorio::find($iCodigoUsuarioMedicoConsultorio);
        $oUsuarioMedicoConsultorio->delete();

        return redirect()->route('usuariomedicoconsultorio', [
            'iCodigo' => $this->getCodigo()
        ]);
    }

    private function getUsuariosMedicoConsultorio() {
        $oQuery = UsuarioMedicoConsultorio::query();
        $oQuery->where('meccodigo', '=', $this->getCodigo());
        return $oQuery->get();
    }
}
