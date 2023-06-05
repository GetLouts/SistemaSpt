@extends('layouts.app')
@section('title')
    Cursos
@endsection
@section('content')
    <section class="section">
        <div class="section-header" style="justify-content: space-between">
            <h3 class="page__heading">Cursos</h3>
            <div>
                @can('crear-usuario')
                    <a class="btn btn-success" href="{{ route('cursos.create') }}">Nuevo Curso</a>
                    <!-- <a class="btn btn-success" href="{{ route('periodo_curso.create') }}">Añadir Cursos a Periodo</a> -->
                @endcan
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <form action="{{ route('cursos.index') }}" method="get">
                            <div class="search d-flex">
                                <input type="text" class="form-control mr-2" name="texto"
                                    value="{{ $texto }}" placeholder="Ingrese nombre del curso o codigo del curso para buscar">
                                <input type="submit" class="btn btn-primary" value="Buscar">
                                <a class="btn btn-primary" href="{{ route('cursos.index') }}">Volver</a>
                            </div>     
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-body">
            <div class="container">
                <div class="row">
                    @foreach ($cursos as $curso)
                    <div class="col-lg-4 mb-4">            
                        <div class="card w-100 h-100">       
                            <td >
                                <img src="/img/cursos/{{ $curso->imagen }}" class="card-img-top" style="margin: auto">
                                <hr>
                            </td>    
                            <div class="card-footer text-center">
                                <td class="text-center">{{ $curso->cursos }}</td>
                                <table class="table">
                                    <tr>  
                                        @can(('ver-usuario'))
                                        <td class="text-center">
                                            <a class="btn btn-primary"
                                                href="{{ route('cursos.show', $curso->id) }}""><abbr title="Ver Curso"><i class="
                                                fa fa-eye"></i></abbr></a>
                                        @endcan
                                        @can('editar-usuario')
                                            <a class="btn btn-info"
                                                href="{{ route('cursos.edit', $curso->id) }}"><abbr title="Editar Curso"><i
                                                    class="fa fa-pen"></i></abbr></a>
                                        @endcan
                                            {{-- Falta Rol --}}
                                                <button class="btn btn-warning agregarAPeriodo" type="button"
                                                    data-id="{{ $curso->id }}"><abbr title="Agregar Curso Al Periodo Actual"><i
                                                    class="fa fa-plus"></i></abbr>
                                                </button>
                                        @can('borrar-usuario')
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['cursos.destroy', $curso->id], 'style' => 'display:inline', 'class' => 'btn-eliminar']) !!}
                                            {!! Form::button('<abbr title="Borrar Curso"><i class="fa fa-trash"></i></abbr>', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </tr>
                                </table>   
                                @if ($curso->estado_id == 1)
                                    <span class="badge badge-success">Activo</span>
                                @else
                                    <span class="badge badge-danger">Inactivo</span>
                                @endif   
                            </div>
                        </div>
                    </div>
                
                
                {{-- <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-usuario')
                                <a class="btn btn-success" href="{{ route('cursos.create') }}">Nuevo Curso</a>
                                <!-- <a class="btn btn-success" href="{{ route('periodo_curso.create') }}">Añadir Cursos a Periodo</a> -->
                            @endcan
                            <div class="table-responsive">
                                <table class="table table-striped mt-2">
                                    <thead style="background-color: #6777ef;">

                                        <th style="color: #fff;" class="text-center" class="col-sm-1">Cursos</th>
                                        <th style="color: #fff;" class="text-center" class="col-sm-1">Alumnos</th>
                                        <th style="color: #fff;" class="text-center" class="col-sm-1">Clases</th>
                                        <th style="color: #fff;" class="text-center" class="col-sm-1">Descripción
                                        </th>
                                        <th>Imagen</th>
                                        <th style="color: #fff;" class="text-center" class="col-sm-1">Acciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($cursos as $curso)
                                            @can('ver-usuario')
                                                <tr>

                                                    <td class="text-center">{{ $curso->cursos }}</td>
                                                    <td class="text-center">
                                                        @if ($curso->cantidad_alumnos >= 1)
                                                            <span
                                                                class="badge badge-success">{{ $curso->cantidad_alumnos }}</span>
                                                        @else
                                                            <span class="badge badge-danger">Agotado</span>
                                                        @endif
                                                    </td>

                                                    <td class="text-center">{{ $curso->clases }}</td>
                                                    <td class="text-center">{{ $curso->descripcion }}</td>
                                                    <td class="border px-14 py-1">
                                                        <img src="/img/cursos/{{ $curso->imagen }}" width="60%">
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="btn btn-primary"
                                                            href="{{ route('cursos.show', $curso->id) }}""><abbr title="Ver Curso"><i class="
                                                            fa fa-eye"></i></abbr></a>
                                                    @endcan
                                                    @can('editar-usuario')
                                                        <a class="btn btn-info"
                                                            href="{{ route('cursos.edit', $curso->id) }}"><abbr title="Editar Curso"><i
                                                                class="fa fa-pen"></i></abbr></a>
                                                    @endcan

                                                        
                                                    <button class="btn btn-warning agregarAPeriodo" type="button"
                                                        data-id="{{ $curso->id }}"><abbr title="Agregar Curso Al Periodo Actual"><i
                                                            class="fa fa-plus"></i></abbr></button>

                                                    @can('borrar-usuario')
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['cursos.destroy', $curso->id], 'style' => 'display:inline', 'class' => 'btn-eliminar']) !!}
                                                        {!! Form::button('<abbr title="Borrar Curso"><i class="fa fa-trash"></i></abbr>', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                                                        {!! Form::close() !!}
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination justify-content-end">
                                {!! $cursos->links() !!}
                            </div>
                        </div>
                    </div>
                </div> --}}
                @endforeach
                </div>       
            </div>
        </div>
    </section>
    <a href="{{ route('periodo_curso.store') }}" id="route"></a>
@endsection
@section('scripts')
    <script>
        
        $('.agregarAPeriodo').on('click', function() {
            let curso_id = $(this).data('id');
            let route = $('#route').attr('href');
            // Ya teniendo el id del curso que se selecciono es cuestion de activar el metodo metiante ajax
            console.log(curso_id);

            $.ajax({
                url: route,
                type: 'POST',
                data: {
                    curso_id: curso_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // console.log(response);
                    // alert('Curso agregado al periodo');
                        Swal.fire({
                        icon: 'success',
                        title: 'Curso Agregado Al Periodo',
                        text: 'Correctamente!',
                        })
                },
                error: function(response) {
                    console.log(response);
                    alert(response.responseJSON.mensaje);    
                }
            });
        });
    </script>

    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                'Borrado!',
                'El Curso Ha Sido Borrado.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.btn-eliminar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Seguro de Borrar El Curso?',
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
