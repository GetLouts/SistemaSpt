<?php

namespace App\Http\Controllers;
use App\Models\Alumno;
use App\Models\AlumnosHasPeriodos;
use App\Models\PeriodosHasCursos;

use Illuminate\Http\Request;

class GraficaController extends Controller
{
    public function charts()
    {

        $cursos = PeriodosHasCursos::all();
        $data = [];
        foreach ($cursos as $curso) {
            $data['label'][] = $curso->periodo_id;
            $data['data'][] = $curso->curso_id;
        }
        $data = json_encode($data);

        return view('graficas.gcursos', compact('data'));
    }

    public function charts2()
    {

        $alumnos = Alumno::all();
        // $periodosXcurso = PeriodosHasCursos::all();
        $data = [];
        foreach ($alumnos as $alumno) {
            $data['data'][] = $alumno->id;
            $data['label'][] = $alumno->comunidad;
        }
        $data = json_encode($data);

        return view('graficas.gcomunidad', compact('data'));
    }

    public function charts3()
    {

        $ingresos = AlumnosHasPeriodos::all();
        $data = [];
        foreach ($ingresos as $ingreso) {
            $data['label'][] = $ingreso->periodo_id;
            $data['data'][] = $ingreso->id;
        }
        $data = json_encode($data);

        return view('graficas.gingresos', compact('data'));
    }
    
}