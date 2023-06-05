<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Models\Estado;
use App\Models\PeriodosHasCursos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PeriodoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-periodo|crear-periodo|editar-periodo|borrar-periodo')->only('index');
        $this->middleware('permission:crear-periodo', ['only'=>['create','store']]);
        $this->middleware('permission:editar-periodo', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-periodo', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodos = Periodo::paginate(10);
        return view('periodos.index', compact('periodos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periodos = Periodo::pluck('nombre_periodo','nombre_periodo')->all();
        $estados = Estado::all();
        $periodoshascursos = PeriodosHasCursos::all();
        return view('periodos.crear', compact('periodos', 'estados', 'periodoshascursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'nombre_periodo' => 'required', 
            'estado_id' => 'required',  
        ])->validate();
        $periodos = new Periodo();

            $periodos->nombre_periodo = $request->nombre_periodo;
            $periodos->creado_por = auth()->user()->id;
            $periodos->estado_id = $request->estado_id; 
            
            
            $periodos->save();
            Session::put('periodo', $periodos->id);

            //$periodoshascursos = new PeriodosHasCursos();
            
            //$periodoshascursos->periodo_id = 1;
            //$periodoshascursos->creado_por = auth()->user()->id;
            //dd($periodoshascursos);
            //$periodoshascursos->save();
            
            return redirect()->route('periodos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $periodos = Periodo::find($id);
        $estados = Estado::all();
        $periodoshascursos = PeriodosHasCursos::all();
        return view('periodos.editar', compact('periodos', 'estados', 'periodoshascursos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombre_periodo' => 'required',
            'estado_id' => 'required',
        ]);
        $input = $request->all();
        $periodos = Periodo::find($id);
        $periodos->actualizado_por = auth()->user()->id;
        $periodos->update($input);

        return redirect()->route('periodos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Periodo::find($id)->delete();
        return redirect()->route('periodos.index')->with('eliminar', 'ok');
    }
}
