<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Estado;
use App\Models\PeriodosHasCursos;
use App\Models\Periodo;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PeriodosHasCursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Curso::get();
        $periodos = Periodo::all();
        $periodoshascursos = PeriodosHasCursos::all();

        return view('cursos.periodohascurso', compact('cursos', 'periodoshascursos', 'periodos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $perico = PeriodosHasCursos::where('curso_id', $request->curso_id)->where('periodo_id', Session::get('periodo'))->get();
        if (count($perico) > 0) {
            return response()->json([
                'success' => false,
                'mensaje' => 'El curso ya esta asignado en el periodo actual'
            ],401);
        } else {
            $periodoshascursos = new PeriodosHasCursos();
            $periodoshascursos->curso_id = $request->curso_id;
            $periodoshascursos->periodo_id = Session::get('periodo');
            $periodoshascursos->creado_por = auth()->user()->id;
            $periodoshascursos->save();

            return response()->json([
                'success' => true,
                'mensaje' => 'Curso agregado correctamente',
                'data' => $periodoshascursos,
            ]);
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
