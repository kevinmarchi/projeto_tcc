<?php

namespace App\Http\Controllers;

use App\Models\Calendario;
use App\Models\ListaUtil;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{

    public function index()
    {
        $oCalendarios = Calendario::all();

        foreach ($oCalendarios as $oCalendario) {
            $oCalendario->setAttribute('calativo', ListaUtil::getListaAtivo($oCalendario->getAttribute('calativo')));
            $oCalendario->setAttribute('caldata', Carbon::parse($oCalendario->getAttribute('caldata'))->format('d/m/Y'));
        }

        return view('calendario.index', compact('oCalendarios'));
    }

    public function create()
    {
        return view('calendario.create');
    }

    public function store(Request $request)
    {
        $oData = $request->all();
        $oData['calativo'] = $request->input('calativo', 0);
        Calendario::create($oData);

        return redirect()->route('calendario.index');
    }

    public function edit($id)
    {
        $oCalendario = Calendario::find($id);

        return view('calendario.edit', compact('oCalendario'));
    }

    public function update(Request $request, $id)
    {
        $oData = $request->all();
        $oData['calativo'] = $request->input('calativo', 0);

        $oCalendario = Calendario::find($id);
        $oCalendario->update($oData);

        return redirect()->route('calendario.index');
    }

    public function destroy($id)
    {
        $oCalendario = Calendario::find($id);
        $oCalendario->delete();

        return redirect()->route('calendario.index');
    }
}
