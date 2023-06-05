@extends('layouts.app')
@section('title')
    Alumnos Inactivos
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Alumnos Inactivos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-xl-12">
                                <form action="{{route('alumnosinactivos.index')}}" method="get">
                                        <div class="form-row">
                                            <div class="col-xs-4">
                                                <input type="text" class="form-control" name="texto" value="{{$texto}}">
                                            </div>
                                            <div class="col-auto">
                                                <input type="submit" class="btn btn-primary" value="Buscar">
                                            </div>
                                        </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef;">
                                    <th style="color: #fff;" class="text-center">Nombres</th>
                                    <th style="color: #fff;" class="text-center">Apellidos</th>
                                    <th style="color: #fff;" class="text-center">Email</th>
                                    <th style="color: #fff;" class="text-center">Cedula</th>
                                    <th style="color: #fff;" class="text-center">Estado</th>
                                    <th style="color: #fff;" class="text-center">Acciones</th>
                                </thead>
                                <tbody>
                                    @if (count($alumnos) <= 0)
                                    <tr>
                                        <td class="badge-danger"></td>
                                        <td class="badge-danger"></td>
                                        <td class="badge-danger"></td>
                                        <td class="badge-danger" class="text-center">No hay registro</td>
                                        <td class="badge-danger"></td>
                                        <td class="badge-danger"></td>


                                    </tr>
                                @endif  
                                    @foreach ($alumnos as $alumno)
                                    <tr>
                                        @if($alumno->estado_id==2)
                                        <td class="text-center">{{$alumno->nombres}}</td>
                                        <td class="text-center">{{$alumno->apellidos}}</td>
                                        <td class="text-center">{{$alumno->correo}}</td>
                                        <td class="text-center">{{$alumno->cedula}}</td>
                                        
                                        <td class="text-center"> 
                                            @if ($alumno->estado_id==2)
                                            <span class="badge badge-danger">Inactivo</span>
                                             @endif
                                          </td>
                                          
                                        <td class="text-center">
                                            @can('show-alumnos')
                                            <a class="btn btn-primary" href="{{ route('alumnosinactivos.show', $alumno->id)}}"><abbr title="Ver Alumno Inactivo"><i class="fa fa-eye"></i></abbr></a>
                                            @endcan
                                            @can('editar-alumnos')
                                            <a class="btn btn-info" href="{{ route('alumnosinactivos.edit', $alumno->id)}}"><abbr title="Editar Alumno Inactivo"><i class="fa fa-pen"></i></abbr></a>
                                            @endcan
                                            
                                            
                                            @can('borrar-alumnos')
                                            {!! Form::open(['method'=> 'DELETE', 'route'=> ['alumnosinactivos.destroy', $alumno->id],'style'=>'display:inline', 'class' => 'btn-eliminar']) !!}
                                                {!! Form::button('<abbr title="Borrar Alumno Inactivo"><i class="fa fa-trash"></i></abbr>',  ['type' => 'submit', 'class'=> 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                            @endcan
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                            <div class="pagination justify-content-end">
                                {!! $alumnos->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                'Borrado!',
                'El Alumno Inactivo Ha Sido Borrado.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.btn-eliminar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Seguro de Borrar El Alumno Inactivo?',
                text: "No podras revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#6777ef',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Borrar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@endsection