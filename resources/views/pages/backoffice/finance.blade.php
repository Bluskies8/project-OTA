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
            <section id="section-report-finance">
                <header class="mb-3 text-center">
                    <h3>Tiket</h3>
                </header>
                <div class="row mb-5">
                    <div class="col-6 mb-3">
                        <canvas id="chart-transaksi-tiket" style="width:100%;"></canvas>
                    </div>
                    <div class="col-6 mb-3">
                        <canvas id="chart-transaksi-tiket-qty" style="width:100%;"></canvas>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-tiket">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Transaksi Terakhir</th>
                                        <th>Total Transaksi</th>
                                        <th>Banyak Pembelian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Kevin</td>
                                        <td>Kemaren</td>
                                        <td><div class="d-flex justify-content-between">Rp <span class="harga-trans thousand-separator">6500000</span></div></td>
                                        <td class="text-center">7</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Joko</td>
                                        <td>Lusa</td>
                                        <td><div class="d-flex justify-content-between">Rp <span class="harga-trans thousand-separator">3200000</span></div></td>
                                        <td class="text-center">4</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr style="margin: 1rem -1rem;" />
                <header class="mb-3 text-center">
                    <h3>Tour</h3>
                </header>
                <div class="row">
                    <div class="col-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="chart-transaksi-tour" style="width:100%;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="chart-transaksi-tour-qty" style="width:100%;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-tour">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Transaksi Terakhir</th>
                                        <th>Total Transaksi</th>
                                        <th>Banyak Pembelian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Kevin</td>
                                        <td>Kemaren</td>
                                        <td><div class="d-flex justify-content-between">Rp <span class="harga-trans thousand-separator">6500000</span></div></td>
                                        <td class="text-center">7</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Joko</td>
                                        <td>Lusa</td>
                                        <td><div class="d-flex justify-content-between">Rp <span class="harga-trans thousand-separator">3200000</span></div></td>
                                        <td class="text-center">4</td>
                                    </tr>
                                </tbody>
                            </table>
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
        type: "bar",
        data: {
            labels: ['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'], // val bulan or val X
            datasets: [{
                data: [3000000, 4000000, 4800000, 3600000, 4400000, 3600000], // val data or val Y
                fill: true,
                borderColor: 'rgb(54, 162, 235)',
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
            }]
        },
        options: {
            scales: {
                y: {
                    max: 10000000,
                    min: 0,
                    ticks: {
                        stepSize: 2000000
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
                    text: 'Quantitas Transaksi Tiket'
                },
                legend: {
                    display: false
                },
            }
        }
    });

    new Chart("chart-transaksi-tour", {
        type: "bar",
        data: {
            labels: ['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'], // val bulan or val X
            datasets: [{
                data: [3000000, 4000000, 4800000, 3600000, 4400000, 3600000], // val data or val Y
                fill: true,
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
            }]
        },
        options: {
            scales: {
                y: {
                    max: 10000000,
                    min: 0,
                    ticks: {
                        stepSize: 2000000
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

    new Chart("chart-transaksi-tour-qty", {
        type: "line",
        data: {
            labels: ['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'], // val bulan or val X
            datasets: [{
                data: [15, 20, 24, 18, 22, 18], // val data or val Y
                fill: true,
                borderColor: 'rgb(255, 159, 64)',
                backgroundColor: 'rgba(255, 159, 64, 0.5)',
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
                    text: 'Quantitas Transaksi Tiket'
                },
                legend: {
                    display: false
                },
            }
        }
    });

    $('#table-tiket').DataTable({
        paging: false,
        info: false,
    });

    $('#table-tour').DataTable({
        paging: false,
        info: false,
    });
});
</script>
@endsection
