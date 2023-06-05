<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class GraficaalumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnosData =Alumno::Select (DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');
        

        $months =Alumno::Select (DB::raw("Month(created_at) as month"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('month');

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($months as $index => $month) {
            $datas[$month] = $alumnosData[$index];
        }
        return view('graficas.galumnos', compact('datas'));

        /*$graf = [];
        // $aux = Alumno::whereYear('created_at', date('Y'))->get();
        $aux = Alumno::all();

        foreach ($aux as $g) {
            $date = Carbon::parse($g->created_at);
            $mes = $date->locale('es')->monthName;
            if (array_key_exists($mes, $graf)) {
                $graf[$mes] ++;
            }
            else {
                $graf[$mes] = 1;
            }
            // echo $date->locale('es')->monthName;
            
        }

       // dd($graf);

        return view('graficas.galumnos', compact('aux'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
