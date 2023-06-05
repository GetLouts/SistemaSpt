@extends('layouts.app')
@section('title')
    Graficas Alumnos
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Graficas de Alumnos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                                <i class="fa fa-file-pdf" style="font-size: 18px"></i>

                            <div id="container"></div>

                            <script src="https://code.highcharts.com/highcharts.js"></script>
                            <script>                        
                                var datas=<?php echo json_encode($datas)?>;
                                Highcharts.chart('container',{
                                    title:{
                                        text:"Graficas de Alumnos"
                                    },
                                    xAxis:{
                                        categories:[0,'Enero','Febrero','Marzo','Abril','Mayo','Junio',
                                        'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
                                    },
                            
                                    yAxis:{
                                        title:{
                                            text:"Numeros de Alumnos"
                                        }
                                    },
                                    
                                    series:[{
                                        name:"Nuevos Alumnos",
                                        data:datas
                                    }],
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection

