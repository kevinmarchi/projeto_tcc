<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Contato;
use App\Models\User;
use App\Models\ListaUtil;
use Illuminate\Http\Request;

class ContatoController extends Controller
{

    private $tipo;

    private $codigo;

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }


    public function index($iTipo, $iCodigo)
    {
        $this->setTipo($iTipo);
        $this->setCodigo($iCodigo);

        $oContatos = $this->getContatos();

        foreach ($oContatos as $oContato) {
            $oContato->setAttribute('cnttipo', ListaUtil::getListaTipoContato($oContato->getAttribute('cnttipo')));
            $oContato->setAttribute('cntativo', ListaUtil::getListaAtivo($oContato->getAttribute('cntativo')));
            $oContato->setAttribute('cntpreferencial', ListaUtil::getListaContatoPreferencial($oContato->getAttribute('cntpreferencial')));
        }

        return view('contato.index',[
            'oContatos' => $oContatos,
            'iTipo' => $this->getTipo(),
            'iCodigo' => $this->getCodigo()
        ]);
    }


    public function create($iTipo, $iCodigo)
    {
        $oUsuario = null;
        $oConsultorio = null;
        $this->setTipo($iTipo);
        $this->setCodigo($iCodigo);

        if ($iTipo == 1) {
            $oUsuario = User::query()->find($this->getCodigo(), ['usucodigo', 'usunome']);
        } else {
            $oConsultorio = Consultorio::query()->find($this->getCodigo(), ['concodigo', 'condescricao']);
        }

        return view('contato.create', [
            'oUsuario' => $oUsuario,
            'oConsultorio' => $oConsultorio,
            'iTipo' => $this->getTipo(),
            'iCodigo' => $this->getCodigo()
        ]);
    }


    public function store(Request $request, $iTipo, $iCodigo)
    {
        $this->setTipo($iTipo);
        $this->setCodigo($iCodigo);
        $oData = $request->all();
        $oData['cntpreferencial'] = $request->input('cntpreferencial', 0);
        $oData['cntativo'] = $request->input('cntativo', 0);

        $oContato = Contato::create($oData);

        return redirect()->route('contato', ['iTipo' => $this->getTipo(), 'iCodigo' => $this->getCodigo()]);
    }


    public function edit($iCodigoContato, $iTipo, $iCodigo)
    {
        $this->setTipo($iTipo);
        $this->setCodigo($iCodigo);
        $oContato = Contato::find($iCodigoContato);

        return view('contato.edit', [
            'oContato' => $oContato,
            'iTipo' => $this->getTipo(),
            'iCodigo' => $this->getCodigo()
        ]);
    }


    public function update(Request $request, $iCodigoContato, $iTipo, $iCodigo)
    {
        $this->setTipo($iTipo);
        $this->setCodigo($iCodigo);
        $oData = $request->all();
        $oData['cntpreferencial'] = $request->input('cntpreferencial', 0);
        $oData['cntativo'] = $request->input('cntativo', 0);

        $oContato = Contato::find($iCodigoContato);
        $oContato->update($oData);

        return redirect()->route('contato', [
            'iTipo' => $this->getTipo(),
            'iCodigo' => $this->getCodigo()
        ]);
    }


    public function destroy($iCodigoContato, $iTipo, $iCodigo)
    {
        $this->setTipo($iTipo);
        $this->setCodigo($iCodigo);
        $oContato = Contato::find($iCodigoContato);
        $oContato->delete();

        return redirect()->route('contato', [
            'iTipo' => $this->getTipo(),
            'iCodigo' => $this->getCodigo()
        ]);
    }

    private function getContatos() {
        $oQuery = Contato::query();
        switch ($this->getTipo()) {
            case 1:
                $oQuery->where('usucodigo', '=', $this->getCodigo());
                break;
            case 2:
                $oQuery->where('concodigo', '=', $this->getCodigo());
                break;
        }
        return $oQuery->get();
    }

}
