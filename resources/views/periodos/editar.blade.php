@extends('layouts.app')
@section('title')
    Editar Periodo
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Periodo</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
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

                            {!! Form::model($periodos, ['method' => 'PATCH','route' => ['periodos.update', $periodos->id]]) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label form="name">Nombre del Periodo</label>
                                        {!! Form::text('nombre_periodo', null, array('class' => 'form-control')) !!}
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
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-success">Actualizar Periodo</button>
                                    <a class="btn btn-primary" href="{{route('periodos.index') }}">Volver</a>
                                </div>
                            </div>
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

