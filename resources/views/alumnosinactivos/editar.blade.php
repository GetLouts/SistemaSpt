@extends('layouts.app')
@section('title')
    Editar Alumno
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Alumno</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::model($alumnos, ['method' => 'PATCH', 'enctype'=>'multipart/form-data', 'route' => ['alumnos.update', $alumnos->id]]) !!}
                            <div class="text-center">
                                <hr>
                                @if($alumnos->imagen !==null)
                                <img src="{{ asset("/img/alumnos/$alumnos->imagen") }}" alt="" width="100%"  id="imagenSeleccionada">
                                @else
                                <img src="{{asset('img/sinfoto.jpg')}}" alt="" width="100%"  id="imagenSeleccionada">
                                @endif
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="file" name="imagen" accept="image/*" hidden>
                                        <div class="grid grid-cols-1 mt-5 mx-7">
                                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir Imagen</label>
                                                <div class="flex items-center justify-center w-full">
                                                    <label class="flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group">
                                                        <div class="flex flex-col items-center justify-center pt-7">
                                                        
                                                        <p class="btn btn-primary">Seleccionar Imagen</p>
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
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>Revise los campos></strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {!! Form::model($alumnos, ['method' => 'PATCH', 'enctype'=>'multipart/form-data', 'route' => ['alumnos.update', $alumnos->id]]) !!}
                            <div class="row">
                                <td>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nombres</label>
                                        {!! Form::text('nombres', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Apellidos</label>
                                        {!! Form::text('apellidos', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Cedula</label>
                                        {!! Form::number('cedula', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Telefono</label>
                                        {!! Form::number('telefono', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Telefono Local</label>
                                        {!! Form::number('telefono_local', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Dirección</label>
                                        {!! Form::text('direccion', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                            </td>
                            <td>    
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Correo</label>
                                        {!! Form::text('correo', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nivel de Estudio</label>
                                        {!! Form::text('nivel_de_estudio', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Fecha de Nacimiento</label>
                                        {!! Form::date('fecha_nac', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Comunidad</label>
                                        {!! Form::text('comunidad', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <label for="name">Curso</label>
                                    <select name="curso" class="form-control">
                                       
                                        @foreach ($cursos as $curso)
                                            <option value="{{ $curso->id }}">{{ $curso->cursos->cursos }}</option>                                                   
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <label for="metodohasalumno">Pagó</label>
                                    <div class="form-group">
                                        
                                    @foreach ($metodohasalumnos as $metodohasalumno)
                                        {!! Form::text('pago', $metodohasalumno->pago, array('class'=>'form-control')) !!}
                                    @endforeach
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <label for="name">Método de Pago</label>
                                    <select name="metodo_pago" class="form-control">
                                       
                                        @foreach ($metodos as $metodo)
                                            <option value="{{ $metodo->id }}">{{ $metodo->metodo_pago }}</option>      
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Fecha del Pago</label>
                                        {!! Form::date('fecha_pago', $metodohasalumno->fecha_pago, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Referencia</label>
                                        @foreach ($metodohasalumnos as $metodohasalumno)
                                        {!! Form::text('numero_referencia', $metodohasalumno->numero_referencia, array('class'=>'form-control')) !!}
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Patrocinador</label>
                                        {!! Form::text('patrocinador', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Fecha de Registro</label>
                                        {!! Form::date('fecha_registro', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <label for="name">Estado</label>
                                    <select name="estado_id" class="form-control">
   
                                        @foreach ($estados as $estado)
                                            <option value="{{ $estado->id }}">{{ $estado->estado }}</option>      
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-success">Actualizar Alumno</button>
                                    <a class="btn btn-primary" href="{{route('alumnosinactivos.index') }}">Volver</a>
                                </div>
                            </div>
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script>   
    $(document).ready(function (e) {   
        $('#imagen').change(function(){            
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#imagenSeleccionada').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
    });
</script>