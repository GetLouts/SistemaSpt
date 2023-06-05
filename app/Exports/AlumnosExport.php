<?php

namespace App\Exports;

use App\Models\Alumno;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AlumnosExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('alumnos.excel', [
            'alumnos' => Alumno::select(
                "id", 
                "nombres", 
                "apellidos", 
                "cedula", 
                "telefono", 
                "telefono_local", 
                "direccion", 
                "correo", 
                "nivel_de_estudio", 
                "fecha_nac",
                "comunidad",
                "patrocinador",
                "fecha_registro")->get()
        ]);
    }
}
