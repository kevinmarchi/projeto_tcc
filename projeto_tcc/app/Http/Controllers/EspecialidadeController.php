<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use Illuminate\Http\Request;

class EspecialidadeController extends Controller
{

    public function index()
    {
        $oEspecialidades = Especialidade::all();

        return view('especialidade.index', compact('oEspecialidades'));
    }


    public function create()
    {
        return view('especialidade.create');
    }


    public function store(Request $request)
    {
        $oData = $request->all();
        Especialidade::create($oData);

        return redirect()->route('especialidade.index');
    }

    public function edit($id)
    {
        $oEspecialidade = Especialidade::find($id);

        return view('especialidade.edit', compact('oEspecialidade'));
    }

    public function update(Request $request, $id)
    {
        $oData = $request->all();
        $oEspecialidade = Especialidade::find($id);
        $oEspecialidade->update($oData);

        return redirect()->route('especialidade.index');
    }

    public function destroy($id)
    {
        $oEspecialidade = Especialidade::find($id);
        $oEspecialidade->delete();

        return redirect()->route('especialidade.index');
    }
}
