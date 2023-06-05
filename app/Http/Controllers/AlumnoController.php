<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\User;
use App\Models\Estado;
use App\Models\Metodo;
use App\Models\AlumnosHasPeriodos;
use App\Models\PeriodosHasCursos;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\MetodosHasAlumnos;
use Illuminate\Support\Arr;

use Maatwebsite\Excel\Facades\Excel;

use App\Exports\AlumnosExport;

class AlumnoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-alumnos|crear-alumnos|editar-alumnos|borrar-alumnos')->only('index');
        $this->middleware('permission:crear-alumnos', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-alumnos', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-alumnos', ['only' => ['destroy']]);
        $this->middleware('permission:show-alumnos', ['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $alumnos = DB::table('alumnos')
            ->select(
                'id',
                'nombres',
                'apellidos',
                'cedula',
                'telefono',
                'telefono_local',
                'direccion',
                'correo',
                'nivel_de_estudio',
                'fecha_nac',
                'comunidad',
                'patrocinador',
                'fecha_registro',
                'estado_id'
            )
            ->where('cedula', 'LIKE', '%' . $texto . '%')
            ->orWhere('nombres', 'LIKE', '%' . $texto . '%')
            ->orderBy('cedula', 'asc')
            ->paginate(10);

        return view('alumnos.index', compact('alumnos', 'texto'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $cursos = Curso::all();
        // $cursos = Periodo::where('id', $periodo activo)->get();
        $estados = Estado::all();
        //$metodos = Metodo::all();
        //$metodohasalumnos = MetodosHasAlumnos::all();
        $cursos = PeriodosHasCursos::where('periodo_id', 1)->get();
        // dd($cursos->first()->cursos);
        return view('alumnos.crear', compact('cursos', 'estados'));
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
            'nombres' => 'required',
            'apellidos' => 'required',
            'cedula' => 'required',
            'telefono' => 'required',
            'telefono_local' => 'required',
            'direccion' => 'required',
            'correo' => 'required',
            'nivel_de_estudio' => 'required',
            'fecha_nac' => 'required',
            'comunidad' => 'required',
            'patrocinador' => 'required',
            'fecha_registro' => 'required',
        ])->validate();

        $alumnos = new Alumno();

        $alumnos->nombres = $request->nombres;
        $alumnos->apellidos = $request->apellidos;
        $alumnos->cedula = $request->cedula;
        $alumnos->telefono = $request->telefono;
        $alumnos->telefono_local = $request->telefono_local;
        $alumnos->direccion = $request->direccion;
        $alumnos->correo = $request->correo;
        $alumnos->nivel_de_estudio = $request->nivel_de_estudio;
        $alumnos->fecha_nac = $request->fecha_nac;
        $alumnos->comunidad = $request->comunidad;
        $alumnos->patrocinador = $request->patrocinador;
        $alumnos->fecha_registro = $request->fecha_registro;
        //script para subir imagen al servidor
        if ($request->hasFile("imagen")) {
            $imagen = $request->file("imagen");
            $nombreimagen = $alumnos->id . "." . $imagen->getClientOriginalName();
            $ruta = public_path("img/alumnos/");
            $imagen->move($ruta, $nombreimagen);
            $alumnos->imagen = $nombreimagen;
        }

        $alumnos->estado_id = 1;
        $alumnos->creado_por = auth()->user()->id;

        $alumnos->save();

        return redirect()->route('metodos.create', ['id' => $alumnos->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumnos = Alumno::find($id);
        $cursos = PeriodosHasCursos::where('periodo_id', 1)->get();
        $users = User::all();
        $alumnoshasperiodos = AlumnosHasPeriodos::where('alumno_id','=', $id)->get();
        $metodohasalumnos = MetodosHasAlumnos::where('alumno_id','=', $id)->get();
        $metodos = Metodo::all();
        return view('alumnos.show', compact('alumnos', 'id', 'alumnoshasperiodos', 'cursos', 'metodohasalumnos', 'metodos', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $alumnos = Alumno::find($id);
        $cursos = PeriodosHasCursos::where('periodo_id', 1)->get();
        $estados = Estado::all();
        $metodos = Metodo::all();
        $users = User::all();
        $metodohasalumnos = MetodosHasAlumnos::where('alumno_id','=', $id)->get();

        return view('alumnos.editar', compact('alumnos', 'cursos', 'estados', 'metodos', 'metodohasalumnos', 'users'));
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
        $this->validate($request, [
            'nombres' => 'required',
            'apellidos' => 'required',
            'cedula' => 'required',
            'telefono' => 'required',
            'telefono_local' => 'required',
            'direccion' => 'required',
            'correo' => 'required',
            'nivel_de_estudio' => 'required',
            'fecha_nac' => 'required',
            'comunidad' => 'required',
            'fecha_registro' => 'required',
            'estado_id' => 'required',
        ]);

        $input = $request->all();
        $alumno = Alumno::find($id);
        $alumno->update($input);
        if ($request->hasFile("imagen")) {
            $imagen = $request->file("imagen");
            $nombreimagen =  $imagen->getClientOriginalName();
            $ruta = public_path("img/alumnos/");
            $imagen->move($ruta, $nombreimagen);
            $alumno->imagen = $nombreimagen;
            $alumno->save();
        }

        $input = $request->all();
        $metodohasalumnos = MetodosHasAlumnos::find($id);
        $metodohasalumnos->update($input);      

        return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alumno::find($id)->delete();
        return redirect()->route('alumnos.index')->with('eliminar', 'ok');
    }

    public function excel()
    {
        return Excel::download(new AlumnosExport, 'alumnos.xlsx');
    }

}
