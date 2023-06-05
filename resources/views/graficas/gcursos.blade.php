@extends('layouts.app')
@section('title')
    Graficas Cursos
@endsection
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Graficas de los Cursos por Periodos</h3>
        </div>
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card justify-content-center">
                        <div class="card-body text-center">
                            <canvas id="mychart"></canvas>
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
                                                labels: 'Cantidad de Cursos',
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
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection