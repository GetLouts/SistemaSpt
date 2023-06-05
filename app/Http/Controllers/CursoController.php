<?php

namespace App\Http\Controllers;

USE App\Models\Curso;
use App\Models\Estado;
use App\Models\Modalidad;
use App\Models\PeriodosHasCursos;
use App\Models\Periodo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-cursos|crear-cursos|editar-cursos|borrar-cursos')->only('index');
        $this->middleware('permission:crear-cursos', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-cursos', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-cursos', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        {
            $texto = trim($request->get('texto'));
            $cursos = DB::table('cursos')
                ->select(
                    'id',
                    'cursos',
                    'descripcion',
                    'cantidad_alumnos',
                    'clases',
                    'fecha_inicio',
                    'codigo',
                    'imagen',
                    'estado_id',
                    'modalidad_id',
                    'creado_por',
                    'actualizado_por',          
                )
                ->where('cursos', 'LIKE', '%' . $texto . '%')
                ->orWhere('codigo', 'LIKE', '%' . $texto . '%')
                ->orderBy('cursos', 'asc')
                ->paginate(10);
    
            return view('cursos.index', compact('cursos', 'texto'));
        }
        // $cursos = Curso::paginate(5);
        // return view('cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Curso::get();
        $estados = Estado::all();
        $modalidades = Modalidad::all();
        $periodoshascursos = PeriodosHasCursos::where('periodo_id', 1)->get();

        return view('cursos.crear', compact('cursos', 'estados', 'periodoshascursos', 'modalidades'));
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
            'cursos' => 'required', 
            'descripcion' => 'required', 
            'cantidad_alumnos' => 'required', 
            'clases' => 'required',
            'fecha_inicio' => 'required',
            'codigo' => 'required',
            'imagen' => 'required |image|mimes:jpeg,png,svg|max:1024',
            'modalidad_id' => 'required',
            'estado_id' => 'required',  
        ])->validate();
        $cursos = new Curso();
        $cursos->cursos = $request->cursos;
        $cursos->descripcion = $request->descripcion;
        $cursos->cantidad_alumnos = $request->cantidad_alumnos;
        $cursos->clases = $request->clases;
        $cursos->fecha_inicio = $request->fecha_inicio;
        $cursos->codigo = $request->codigo;

        if($imagen = $request->file('imagen')){
            $rutaGuardarImg =  'img/cursos/';
            $imagenCurso = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenCurso);
            $cursos['imagen'] = "$imagenCurso";
        }
        $cursos->modalidad_id = $request->modalidad_id;
        $cursos->estado_id = $request->estado_id;
        $cursos->creado_por = auth()->user()->id;
        $cursos->save();

       /* $periodoshascursos = new PeriodosHasCursos();
            
             
            $periodoshascursos->curso_id = $cursos->id;;
            $periodoshascursos->periodo_id = 1;
            $periodoshascursos->creado_por = auth()->user()->id;
           //dd($periodoshascursos);
            $periodoshascursos->save();
*/
        
        return redirect()->route('cursos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cursos = Curso::find($id);
        $estados = Estado::all();
        $modalidades = Modalidad::get();
        $periodoshascursos = PeriodosHasCursos::all();
        return view('cursos.show', compact('cursos', 'id', 'estados', 'periodoshascursos', 'modalidades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $cursos = Curso::find($id);
        $estados = Estado::all();
        $modalidades = Modalidad::all();
        $periodoshascursos = PeriodosHasCursos::all();
        return view('cursos.editar', compact('cursos', 'estados', 'periodoshascursos', 'modalidades'));
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
        Validator::make($request->all(), [
            'cursos' => 'required', 
            'descripcion' => 'required', 
            'cantidad_alumnos' => 'required', 
            'clases' => 'required',
            'fecha_inicio' => 'required',
            'codigo' => 'required',
            'imagen' => 'required |image|mimes:jpeg,png,svg|max:1024',
            'modalidad_id' => 'required',
            'estado_id' => 'required',  
        ])->validate();

        $input = $request->all();
        $cursos = Curso::find($id);
        $cursos->cursos = $request->input('cursos');
        $cursos->actualizado_por = auth()->user()->id;
        $cursos->update($input);

        if($request->hasFile("imagen")){
            $imagen = $request->file("imagen");
            $rutaGuardarImg =  'img/cursos/';
            $imagenCurso = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenCurso);
            $cursos['imagen'] = "$imagenCurso";
            $cursos->save();
        }

        return redirect()->route('cursos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('cursos')->where('id', $id)->delete();
        return redirect()->route('cursos.index')->with('eliminar', 'ok');
    }
}
