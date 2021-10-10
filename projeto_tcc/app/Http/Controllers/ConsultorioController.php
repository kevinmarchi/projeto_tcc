<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Endereco;
use Illuminate\Http\Request;

class ConsultorioController extends Controller
{
    public function index()
    {
        $oConsultorios = Consultorio::all();

        return view('consultorio.index', compact('oConsultorios'));
    }


    public function create()
    {
        $oEnderecos = Endereco::query()->orderBy('endlogradouro')->get();

        return view('consultorio.create', compact('oEnderecos'));
    }


    public function store(Request $request)
    {
        $oData = $request->all();

        Consultorio::create($oData);

        return redirect()->route('consultorio.index');
    }


    public function edit($id)
    {
        $oConsultorio = Consultorio::find($id);

        return view('consultorio.edit', compact('oConsultorio'));
    }


    public function update(Request $request, $id)
    {
        $oData = $request->all();

        $oConsultorio = Consultorio::find($id);
        $oConsultorio->update($oData);

        return redirect()->route('consultorio.index');
    }


    public function destroy($id)
    {
        $oConsultorio = Consultorio::find($id);
        $oConsultorio->delete();

        return redirect()->route('consultorio.index');
    }
}
