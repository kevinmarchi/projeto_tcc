<?php

namespace App\Http\Controllers;

use App\Models\Calendario;
use App\Models\CalendarioItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarioItemController extends Controller
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

        $oCalendarioItens = $this->getCalendarioItens();

        foreach ($oCalendarioItens as $oCalendarioItem) {
            $oCalendarioItem->setAttribute('caidata', Carbon::parse($oCalendarioItem->getAttribute('caidata'))->format('d/m/Y'));
        }

        return view('calendarioitem.index', [
            'oCalendarioItens' => $oCalendarioItens,
            'iCodigo' => $this->getCodigo()
        ]);
    }

    public function create($iCodigo)
    {
        $this->setCodigo($iCodigo);
        $oCalendario = Calendario::query()->find($iCodigo);

        return view('calendarioitem.create', [
            'oCalendario' => $oCalendario,
            'iCodigo' => $this->getCodigo(),
        ]);
    }

    public function store(Request $request, $iCodigo)
    {
        $this->setCodigo($iCodigo);
        $oData = $request->all();

        CalendarioItem::create($oData);

        return redirect()->route('calendarioitem', ['iCodigo' => $this->getCodigo()]);
    }

    public function destroy($iCodigoCalendarioItem, $iCodigo)
    {
        $this->setCodigo($iCodigo);
        $oCalendarioItem = CalendarioItem::find($iCodigoCalendarioItem);
        $oCalendarioItem->delete();

        return redirect()->route('calendarioitem', [
            'iCodigo' => $this->getCodigo()
        ]);
    }

    private function getCalendarioItens() {
        $oQuery = CalendarioItem::query();
        $oQuery->where('calcodigo', '=', $this->getCodigo());
        return $oQuery->get();
    }
}
