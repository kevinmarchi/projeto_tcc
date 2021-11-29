<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use App\Models\Medico;
use App\Models\MedicoEspecialidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicoEspecialidadeController extends Controller
{

    public function index()
    {
        $oMedicosEspecialidades = $this->getMedicoEspecialidades();

        return view('medicoespecialidade.index', compact('oMedicosEspecialidades'));
    }

    public function create()
    {
        $oQuery = Medico::query()->join('users', 'tbmedico.usucodigo', '=', 'users.usucodigo')
                                  ->where('tbmedico.usucodigo', '=', Auth::user()->usucodigo)->get();
        $oEspecialidades = Especialidade::all();

        $oMedico = new Medico();
        if (isset($oQuery[0])) {
            $oMedico = $oQuery[0];
        }

        return view('medicoespecialidade.create', [
            'oMedico' => $oMedico,
            'oEspecialidades' => $oEspecialidades
        ]);
    }

    public function store(Request $request)
    {
        $oData = $request->all();
        MedicoEspecialidade::create($oData);

        return redirect()->route('medicoespecialidade.index');
    }

    public function destroy($id)
    {
        $oMedicoEspecialidade = MedicoEspecialidade::find($id);
        $oMedicoEspecialidade->delete();

        return redirect()->route('medicoespecialidade.index');
    }

    private function getMedicoEspecialidades() {
        $oQuery = MedicoEspecialidade::query()->join('tbmedico', 'tbmedicoespecialidade.medcodigo', '=', 'tbmedico.medcodigo')
                                              ->where('usucodigo', '=', Auth::user()->usucodigo);
        return $oQuery->get();
    }
}
