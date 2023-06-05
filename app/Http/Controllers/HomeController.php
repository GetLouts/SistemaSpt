<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Se busca el periodo activo - "DEBERIA HABER SOLO 1"
        $periodo = Periodo::where('estado_id', 1)->first();
        if (isset($periodo)) {
            session(['periodo' => $periodo->id]); // se setea en la sesion del usuario
            # code...
        }
        // Para recuperar en cualquier parte que se necesite el periodo
        /*session()->get('periodo')->id; // suplantar id con las propiedades existentes en la tabla periodo de ser necesario
        */
        return view('home');
    }
}
