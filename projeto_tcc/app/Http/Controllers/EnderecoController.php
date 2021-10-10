<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Endereco;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function index()
    {
        $oEnderecos = Endereco::all();

        return view('endereco.index', compact('oEnderecos'));
    }

    public function create()
    {
        $oCidades = Cidade::query()->orderBy('cidnome')->get();

        return view('endereco.create', compact('oCidades'));
    }

    public function store(Request $request)
    {
        $oData = $request->all();

        Endereco::create($oData);

        return redirect()->route('endereco.index');
    }

    public function edit($id)
    {
        $oEndereco = Endereco::find($id);

        return view('endereco.edit', compact('oEndereco'));
    }

    public function update(Request $request, $id)
    {
        $oData = $request->all();

        $oEndereco = Endereco::find($id);
        $oEndereco->update($oData);

        return redirect()->route('endereco.index');
    }

    public function destroy($id)
    {
        $oEndereco = Endereco::find($id);
        $oEndereco->delete();

        return redirect()->route('endereco.index');
    }
}
