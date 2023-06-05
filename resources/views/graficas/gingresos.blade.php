@extends('layouts.app')
@section('title')
    Graficas Ingresos
@endsection
@section('content')
    
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Graficas de Ingresos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
                            <canvas id="mychart"></canvas>
                            
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <script>
        $(document).ready(function() {
            var cData = JSON.parse('<?php echo $data; ?>');
            // console.log(cData);
            var ldata = cData.data.length;
            // console.log(ldata)
            const ctx = document.getElementById('mychart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Periodo1', 'Periodo 2', 'Periodo 3', 'Periodo 4'],
                    datasets: [{
                        labels: 'Cantidad de Alumnos',
                        data: [ldata],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }],
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                font: {
                                    size: 12
                                }
                            }
                        }
                    }
                }
            });
        })
    </script>
@endsection
@section('script')
<script src="{{ asset('js/scripts.js') }}"></script>
@endsection