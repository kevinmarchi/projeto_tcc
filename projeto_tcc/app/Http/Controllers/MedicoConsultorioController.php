<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Medico;
use App\Models\MedicoConsultorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicoConsultorioController extends Controller
{

    public function index()
    {
        $oMedicosConsultorios = $this->getMedicoConsultorios();

        return view('medicoconsultorio.index', compact('oMedicosConsultorios'));
    }

    public function create()
    {
        $oMedico = isset(Medico::query()->join('users', 'tbmedico.usucodigo', '=', 'users.usucodigo')
                   ->where('tbmedico.usucodigo', '=', Auth::user()->usucodigo)->get()[0]) ?
            Medico::query()->join('users', 'tbmedico.usucodigo', '=', 'users.usucodigo')
            ->where('tbmedico.usucodigo', '=', Auth::user()->usucodigo)->get()[0] : false;

        $oConsultorios = Consultorio::all();

        return view('medicoconsultorio.create', [
            'oMedico' => $oMedico,
            'oConsultorios' => $oConsultorios
        ]);
    }

    public function store(Request $request)
    {
        $oData = $request->all();
        MedicoConsultorio::create($oData);

        return redirect()->route('medicoconsultorio.index');
    }

    public function destroy($id)
    {
        $oMedicoConsultorio = MedicoConsultorio::find($id);
        $oMedicoConsultorio->delete();

        return redirect()->route('medicoconsultorio.index');
    }

    private function getMedicoConsultorios() {
        $oQuery = MedicoConsultorio::query()
                  ->select(['tbmedicoconsultorio.meccodigo', 'tbmedicoconsultorio.concodigo', 'tbmedicoconsultorio.medcodigo'])
                  ->join('tbmedico', 'tbmedicoconsultorio.medcodigo', '=', 'tbmedico.medcodigo')
                  ->leftJoin('tbusuariomedicoconsultorio', 'tbusuariomedicoconsultorio.meccodigo', '=', 'tbmedicoconsultorio.meccodigo')
                  ->where('tbmedico.usucodigo', '=', Auth::user()->usucodigo)
                  ->where('tbusuariomedicoconsultorio.usucodigo', '=', Auth::user()->usucodigo, 'OR');
        return $oQuery->get();
    }
}
