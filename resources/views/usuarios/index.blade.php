@extends('layouts.app')
@section('title')
    Usuarios
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-usuario')
                                <a class="btn btn-success" href="{{ route('usuarios.create') }}">Nuevo Usuario</a>
                            @endcan
                            <div class="table-responsive">
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef;">
                                    <th style="color: #fff;" class="text-center">Nombre</th>
                                    <th style="color: #fff;" class="text-center">Email</th>
                                    <th style="color: #fff;" class="text-center">Rol</th>
                                    <th style="color: #fff;" class="text-center">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                    @can('ver-usuario')
                                    <tr>
                                        <td class="text-center">{{$usuario->name}}</td>
                                        <td class="text-center">{{$usuario->email}}</td>
                                        <td class="text-center">
                                            @if(!empty($usuario->getRoleNames()))
                                                @foreach($usuario->getRoleNames() as $rolName)
                                                <h5><span class="badge badge-dark">{{$rolName}}</span></h5>
                                                @endforeach
                                            @endif
                                        </td>
                                        
                                        <td class="text-center">
                                            @endcan
                                            @can('editar-usuario')
                                            <a class="btn btn-info" href="{{ route('usuarios.edit', $usuario->id)}}"><abbr title="Editar Usuario"><i class="fa fa-pen"></i></abbr></a>
                                            @endcan
                                            
                                            
                                            @can('borrar-usuario')
                                            {!! Form::open(['method'=> 'DELETE', 'route'=> ['usuarios.destroy', $usuario->id],'style'=>'display:inline', 'class' => 'btn-eliminar']) !!}
                                                {!! Form::button('<abbr title="Borrar Usuario"><i class="fa fa-trash"></i></abbr>',  ['type' => 'submit', 'class'=> 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                            <div class="pagination justify-content-end">
                                {!! $usuarios->links() !!}
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
                'El Usuario Ha Sido Borrado.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.btn-eliminar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Seguro de Borrar El Usuario?',
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