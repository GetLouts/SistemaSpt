@extends('layouts.app')
@section('title')
    Panel de Control
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Panel de Control</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <h5>Usuarios</h5>
                                            @php
                                                use App\Models\User;
                                                $cant_usuarios = User::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-users f-left"></i><span>{{ $cant_usuarios }}</span></h2>
                                            <p class="m-b-0 text-right"><a href="/usuarios" class="text-white">Ver
                                                    más</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Alumnos</h5>
                                            @php
                                                use App\Models\Alumno;
                                                $cant_alumnos = Alumno::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-users f-left"></i><span>{{ $cant_alumnos }}</span></h2>
                                            <p class="m-b-0 text-right"><a href="/alumnos" class="text-white">Ver
                                                    más</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h5>Cursos</h5>
                                            @php
                                                use App\Models\Curso;
                                                $cant_curso = Curso::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-book f-left"></i><span>{{ $cant_curso }}</span></h2>
                                            <p class="m-b-0 text-right"><a href="/cursos" class="text-white">Ver más</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
@endsection
