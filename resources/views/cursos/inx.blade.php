@extends('layouts.app')
@section('title')
    Cursos
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Cursos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                
                <div class="container">
                    
                       
                            {!! Form::model($cursos, ['method' => 'PATCH','route' => 'cursos.index']) !!}
                            <h1>Imagenes</h1>
                            <div class="container-flud">

                                <a class="btn btn-success" href="{{ route ('cursos.create')}}">Nuevo Curso</a>

                                <div class="card" style="width: 18rem;">
                            
                                <img src="{{ asset("/img/cursos/$cursos") }}" alt="" width="100%">
                                <div class="card-body">
                                    <h5 class="card-title">{{$cursos}}</h5>
                                </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </section>
@endsection
@section('scripts')
<script>
    $('.agregarAPeriodo').on('click', function () {
        let curso_id = $(this).data('id');
        // Ya teniendo el id del curso que se selecciono es cuestion de activar el metodo metiante ajax
        console.log(curso_id);
    });
</script>
@endsection

