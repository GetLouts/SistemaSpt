@extends('layouts.app')
@section('title')
    Añadir Cursos a Periodo
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Añadir los Cursos a Periodos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                <strong>Revise los campos</strong>
                                @foreach ($errors->all as $error)
                                    <span class="badge badge-danger">{{$error}}</span>
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            {!! Form::open(array('route'=>'periodo_curso.store', 'method'=>'POST')) !!}
                                <div class="row">
                                    <td>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <label for="name">Periodo Actual</label>
                                            <select name="estado_id" class="form-control">
                                                <option hidden selected>--> Seleccione el Periodo <--</option>
                                                @foreach ($periodoshascursos as $periodoshascurso)
                                                    <option value="{{ $periodoshascurso->id }}">{{ $periodoshascurso->cursos->cursos }}</option>      
                                                @endforeach
                                            </select>
                                        </div>   
                                    </td>
                                    <td>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <br>
                                            <label for="name">Cursos Disponibles para el Periodo</label>
                                            <div class="form-group">
                                                <br/>
                                                @foreach($cursos as $curso)
                                                <label>{{ Form::checkbox('curso[]', $curso->id, false, array('class'=>'curso_id')) }}
                                                    {{ $curso->cursos }}</label>
                                                <br/>
                                                @endforeach
                                            </div>
                                        </div>
                                    </td>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <button type="submit" class="btn btn-success">Guardar</button>
                                            <a class="btn btn-primary" href="{{route('cursos.index') }}">Volver</a>
                                        </div>

                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

