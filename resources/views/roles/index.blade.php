@extends('layouts.app')
@section('title')
    Roles
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @can('crear-rol')
                            <a class="btn btn-success" href="{{route('roles.create') }}">Nuevo Rol</a>
                            @endcan
                            <div class="table-responsive">
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef;">
                                    <th style="color: #fff;" class="text-center">Roles</th>
                                    <th style="color: #fff;" class="text-center">Acciones</th>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($roles as $role)
                                    @can('ver-rol')
                                    <tr>
                                        <td class="text-center">{{$role->name}}</td>
                                        <td class="text-center">
                                    @endcan
                                    
                                            @can('editar-rol')
                                                <a class="btn btn-primary" href="{{route('roles.edit',$role->id)}}"><abbr title="Editar Rol"><i class="fa fa-pen"></i></abbr></a>
                                            @endcan

                                            @can('borrar-rol')
                                            {!! Form::open(['method'=> 'DELETE', 'route'=> ['roles.destroy', $role->id],'style'=>'display:inline', 'class' => 'btn-eliminar']) !!}
                                                {!! Form::button('<abbr title="Borrar Rol"><i class="fa fa-trash"></i></abbr>',  ['type' => 'submit', 'class'=> 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                            <div class="pagination justify-content-end">
                                {!! $roles->links() !!}
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
                'El Rol Ha Sido Borrado.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.btn-eliminar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Seguro de Borrar El Rol?',
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

