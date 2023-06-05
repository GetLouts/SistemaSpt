@extends('layouts.app')
@section('title')
    Alumnos
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Alumnos</h3>
        </div>
        <div class="section-body">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-xl-12">
                                <form action="{{ route('alumnos.index') }}" method="get">
                                    <div class="form-row justify-content-between mb-1">

                                        <div class="anadir text-center">
                                            <a class="btn btn-success mr-2" href="{{ route('alumnos.create') }}">Nuevo
                                                Alumno</a>
                                            <a class="btn btn-danger" href="{{ route('alumnos.pdf') }}"><i
                                                    class="fa fa-file-pdf pt-1" style="font-size: 20px;"></i></a>
                                                    <a class="btn btn-success" href="{{ route('alumnos.excel') }}"><i
                                                        class="fa fa-file-excel pt-1 Ml-5-" style="font-size: 20px;"></i></a>
                                        </div>
                                        <div class="search d-flex">
                                            <input type="text" class="form-control mr-2" name="texto"
                                                value="{{ $texto }}">
                                            <input type="submit" class="btn btn-primary" value="Buscar">
                                        </div>

                                    </div>
                                </form>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped mt-2">
                                    <thead style="background-color: #6777ef;">
                                        <th style="color: #fff;" class="text-center" class="col-lg-2">Nombres</th>
                                        <th style="color: #fff;" class="text-center" class="col-lg-2">Apellidos</th>
                                        <th style="color: #fff;" class="text-center" class="col-lg-2">Email</th>
                                        <th style="color: #fff;" class="text-center" class="col-lg-2">Cedula</th>
                                        <th style="color: #fff;" class="text-center" class="col-lg-2">Estado</th>
                                        <th style="color: #fff;" class="text-center" class="col-lg-2">Acciones</th>

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
                                                @if ($alumno->estado_id == 1)
                                                    <td class="text-center">{{ $alumno->nombres }}</td>
                                                    <td class="text-center">{{ $alumno->apellidos }}</td>
                                                    <td class="text-center">{{ $alumno->correo }}</td>
                                                    <td class="text-center">{{ $alumno->cedula }}</td>

                                                    <td class="text-center">
                                                        @if ($alumno->estado_id == 1)
                                                            <span class="badge badge-success">Activo</span>
                                                        @else
                                                            <span class="badge badge-danger">Inactivo</span>
                                                        @endif
                                                    </td>
                                                    
                                                    <td class="text-center">
                                                        @can('show-alumnos')
                                                        <a class="btn btn-primary"
                                                            href="{{ route('alumnos.show', $alumno->id) }}"><abbr title="Ver Alumno"><i class="fa fa-eye"></i></abbr></a>
                                                        @endcan

                                                        @can('editar-alumnos')
                                                            <a class="btn btn-info"
                                                                href="{{ route('alumnos.edit', $alumno->id) }}"><abbr title="Editar Alumno"><i
                                                                    class="fa fa-pen"></i></abbr></a>
                                                        @endcan

                                                        {{-- @can('editar-alumnos')
                                                            <a class="btn btn-success"
                                                                href="{{ route('metodos.create', $alumno->id) }}"><abbr title="Agregar Cursos y Metodos de pago"><i
                                                                    class="fa fa-book"></i></abbr></a>
                                                        @endcan --}}


                                                        @can('borrar-alumnos')
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['alumnos.destroy', $alumno->id], 'style' => 'display:inline', 'class' => 'btn-eliminar']) !!}
                                                            {!! Form::button('<abbr title="Borrar Alumno"><i class="fa fa-trash"></i></abbr>', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
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
                'El Alumno Ha Sido Borrado.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.btn-eliminar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Seguro de Borrar El Alumno?',
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
