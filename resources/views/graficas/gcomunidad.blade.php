@extends('layouts.app')
@section('title')
    Graficas Comunidades
@endsection
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Graficas de las Comunidades</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="mychart"></canvas>
                            <script>
                                var cData = JSON.parse('<?php echo $data; ?>');
                                var lData = cData.label.length;
                                console.log(cData);
                                var ctx = document.getElementById('mychart').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: [cData.label[0], cData.label[1], cData.label[2], cData.label[3], cData.label[4], cData.label[5], cData.label[6], cData.label[7], cData.label[8], cData.label[9], cData.label[10], cData.label[11], cData.label[12], cData.label[13], cData.label[14], cData.label[15]],
                                        datasets: [{
                                            label: 'Comunidades',
                                            data: [cData.data[0], cData.data[1], cData.data[2], cData.data[3], cData.data[4], cData.data[5], cData.data[6], cData.data[7], cData.data[8], cData.data[9], cData.data[10], cData.data[11], cData.data[12], cData.data[13], cData.data[14], cData.data[15]],
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
                                        }]
                                    },
                                    options: {
                                            responsive: true,
                                            title: {
                                                display: true,
                                                text: 'Cantidad de Cursos'
                                            },
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
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection