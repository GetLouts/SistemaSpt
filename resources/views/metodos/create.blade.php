@extends('layouts.app')
@section('title')
    Registro de Curso y Métodos de Pago
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Cursos y Métodos de Pago</h3>
        </div>
        <div class="section-body">
            <div class="row">
                {{-- <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(array('route'=> ['metodos.store', $alumno->id], 'method'=>'POST', 'enctype'=>'multipart/form-data', 'id'=>'formalumno')) !!}
                            <div class="text-center">
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <img id="imagenSeleccionada" width="100%"">
                                </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="file" name="imagen" accept="image/*" hidden>
                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir Imagen</label>
                                            <div class="flex items-center justify-center w-full">
                                                <label class="flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group">
                                                    <div class="flex flex-col items-center justify-center pt-7">
                                                    
                                                    <p class="btn btn-primary">Seleccionar comprobante</p>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <input id="imagen" type="file" name="imagen" accept="image/*" hidden>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
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

                            {!! Form::open(array('route'=>['metodos.store', $alumno->id], 'method'=>'POST', 'enctype'=>'multipart/form-data', 'id'=>'formalumno')) !!}
                                <div class="row">
                                <td>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <label for="name">Curso</label>
                                    <select name="curso" class="form-control">
                                        <option hidden selected>--> Selecione un Curso <--</option>
                                        @foreach ($cursos as $curso)
                                            <option value="{{ $curso->cursos->id }}">{{ $curso->cursos->cursos }}</option>                                                   
                                        @endforeach
                                    </select>
                                </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name">Pagó</label>
                                            {!! Form::number('pago', null, array('class'=>'form-control')) !!}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <label for="name">Método de Pago</label>
                                        <select name="metodo_pago" class="form-control">
                                            <option hidden selected>--> Selecione un Método de Pago <--</option>
                                            @foreach ($metodos as $metodo)
                                                <option value="{{ $metodo->id }}">{{ $metodo->metodo_pago }}</option>      
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name">Fecha del Pago</label>
                                            {!! Form::date('fecha_pago', null, array('class'=>'form-control')) !!}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name">Referencia</label>
                                            {!! Form::text('numero_referencia', null, array('class'=>'form-control')) !!}
                                        </div>
                                    </div>
                                
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                        <a class="btn btn-primary" href="{{route('alumnos.index') }}">Volver</a>
                                    </div>
                                </td>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection