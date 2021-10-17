<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{

    public function index($iMedicoConsultorio)
    {
        $oAvaliacoes = Avaliacao::query()
                      ->join('tbconsulta', 'tbconsulta.cnscodigo', '=', 'tbavaliacao.cnscodigo')
                      ->join('tbagendahorario', 'tbagendahorario.aghcodigo', '=', 'tbconsulta.aghcodigo')
                      ->join('tbagenda', 'tbagenda.agencodigo', '=', 'tbagendahorario.agencodigo')
                      ->join('tbmedicoconsultorio', 'tbmedicoconsultorio.meccodigo', '=', 'tbagenda.meccodigo')
                      ->where('tbmedicoconsultorio.meccodigo', '=', $iMedicoConsultorio)
                      ->get();

        return view('avaliacao.index', compact('oAvaliacoes'));
    }

    public function create($iCodigoConsulta)
    {
        $oAvaliacao = Avaliacao::query()->where('cnscodigo', '=', $iCodigoConsulta)->get();

        if (isset($oAvaliacao[0])) {
            return view('avaliacao.edit', ['oAvaliacao' => $oAvaliacao[0], 'iCodigoConsulta' => $iCodigoConsulta]);
        }

        return view('avaliacao/create', ['iCodigoConsulta' => $iCodigoConsulta]);
    }

    public function store(Request $request, $iCodigoConsulta)
    {
        $oData = $request->all();
        $oData['cnscodigo'] = $iCodigoConsulta;
        Avaliacao::create($oData);

        return redirect()->route('consulta');
    }

    public function update(Request $request, $iCodigo, $iCodigoConsulta)
    {
        $oData = $request->all();
        $oAvaliacao = Avaliacao::find($iCodigo);
        $oAvaliacao->update($oData);

        return redirect()->route('consulta');
    }

}
