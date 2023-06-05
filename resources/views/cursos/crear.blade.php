@extends('layouts.app')
@section('title')
    Crear Curso
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Nuevo Curso</h3>
        </div>
        <div class="section-body">
            <div class="row">
                {{-- <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(array('route'=>'cursos.store', 'method'=>'POST', 'enctype'=>'multipart/form-data')) !!}
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
                </div> --}}
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(array('route'=>'cursos.store', 'method'=>'POST', 'enctype'=>'multipart/form-data')) !!}
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
                                <strong>Revise los campos</strong>
                                @foreach ($errors->all as $error)
                                    <span class="badge badge-danger">{{$error}}</span>
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            {!! Form::open(array('route'=>'cursos.store', 'method'=>'POST', 'enctype'=>"multipart/form-data")) !!}
                            @csrf
                                <div class="row">
                                    <td>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="name">Codigo del Curso</label>
                                                {!! Form::text('codigo', null, array('class'=>'form-control')) !!}
                                            </div>
                                        </div> 
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="name">Nombre del Curso</label>
                                                {!! Form::text('cursos', null, array('class'=>'form-control')) !!}
                                            </div>
                                        </div>
                                    </td>
                                    <td>                                    
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="name">Cantidad de Alumnos</label>
                                                {!! Form::number('cantidad_alumnos', null, array('class'=>'form-control')) !!}
                                            </div>
                                        </div>        
                                    </td>
                                    <td>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="name">Clases del Curso</label>
                                                {!! Form::number('clases', null, array('class'=>'form-control')) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="name">Fecha de Inicio</label>
                                                {!! Form::date('fecha_inicio', null, array('class'=>'form-control')) !!}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <label for="name">Modalidad</label>
                                            <select name="modalidad_id" class="form-control">
                                                <option hidden selected>--> Selecione la Modalidad <--</option>
                                                @foreach ($modalidades as $modalida)
                                                    <option value="{{ $modalida->id }}">{{ $modalida->modalidad }}</option>      
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <label for="name">Estado</label>
                                            <select name="estado_id" class="form-control">
                                                <option hidden selected>--> Selecione el Estado <--</option>
                                                @foreach ($estados as $estado)
                                                    <option value="{{ $estado->id }}">{{ $estado->estado }}</option>      
                                                @endforeach
                                            </select>
                                        </div>  
                                    </td>
                                    <td> 
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <label for="name">Descripción del Curso</label>
                                            <div class="form-group">                                                
                                                {!! Form::textarea('descripcion', null, array('class'=>'form-group ')) !!}
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
