<?php

namespace App\Http\Controllers;

use App\Models\MedicoConsultorio;
use App\Models\MedicoEspecialidade;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $oMedicos = MedicoConsultorio::query()
                    ->join('tbmedicoespecialidade', 'tbmedicoespecialidade.medcodigo', '=', 'tbmedicoconsultorio.medcodigo')
                    ->get();

        return view('home', compact('oMedicos'));
    }
}
