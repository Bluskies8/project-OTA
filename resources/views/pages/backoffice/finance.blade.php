@extends('layout.admins')

@section('content')
@include('includes.datatables')
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <header>
                <h1>Finance</h1>
            </header>
            <hr style="margin: 1rem -1rem;" />
            <section id="section-report-finance-tiket">
                <header class="mb-3 text-center">
                    <h3>Tiket</h3>
                </header>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="chart-transaksi-tiket" style="width:100%;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="chart-transaksi-tiket-qty" style="width:100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.0.1/chart.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(document).ready(function() {

    new Chart("chart-transaksi-tiket", {
        type: "bars",
        data: {
            labels: ['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'], // val bulan or val X
            datasets: [{
                data: [15, 20, 24, 18, 22, 18], // val data or val Y
                fill: true,
                borderColor: 'rgb(54, 162, 235)',
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                tension: 0.25,
            }]
        },
        options: {
            scales: {
                y: {
                    max: 1000000,
                    min: 0,
                    ticks: {
                        stepSize: 10
                    },
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Transaksi Tiket'
                },
                legend: {
                    display: false
                },
            }
        }
    });

    new Chart("chart-transaksi-tiket-qty", {
        type: "line",
        data: {
            labels: ['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'], // val bulan or val X
            datasets: [{
                data: [15, 20, 24, 18, 22, 18], // val data or val Y
                fill: true,
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                tension: 0.25,
            }]
        },
        options: {
            scales: {
                y: {
                    max: 50,
                    min: 0,
                    ticks: {
                        stepSize: 10
                    },
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Transaksi Tiket'
                },
                legend: {
                    display: false
                },
            }
        }
    });
});
</script>
@endsection
