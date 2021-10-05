<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\User;
use Illuminate\Http\Request;

class ContatoController extends Controller
{

    public function index()
    {
        $oContatos = Contato::all();

        return view('contato.index', compact('oContatos'));
    }


    public function create()
    {
        $oUsuarios = User::all(['usucodigo', 'usunome']);

        return view('contato.create', compact('oUsuarios'));
    }


    public function store(Request $request)
    {
        $oData = $request->all();
        $oData['cntpreferencial'] = $request->input('cntpreferencial', 0);
        $oData['cntativo'] = $request->input('cntativo', 0);

        $oContato = Contato::create($oData);

        return redirect()->route('contato.index');
    }


    public function edit($id)
    {
        $oContato = Contato::find($id);

        return view('contato.edit', compact('oContato'));
    }


    public function update(Request $request, $id)
    {
        $oData = $request->all();
        $oData['cntpreferencial'] = $request->input('cntpreferencial', 0);
        $oData['cntativo'] = $request->input('cntativo', 0);

        $oContato = Contato::find($id);
        $oContato->update($oData);

        return redirect()->route('contato.index');
    }


    public function destroy($id)
    {
        $oContato = Contato::find($id);
        $oContato->delete();

        return redirect()->route('contato.index');
    }
}
