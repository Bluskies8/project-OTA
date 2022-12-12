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
                                        <th>Total Transaksi</th>
                                        <th>Banyak Pembelian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($flighttrans as $item)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$item->customer->first_name}} {{$item->customer->middle_name}} {{$item->customer->last_name}}</td>
                                        <td><div class="justify-content-between">Rp <span class="harga-trans thousand-separator">{{$item->total}}</span></div></td>
                                        <td class="text-center">{{$item->jumlah}}</td>
                                    </tr>
                                    @endforeach
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
                                        <th>Total Transaksi</th>
                                        <th>Banyak Pembelian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transtour as $item)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$item->customer->first_name}} {{$item->customer->middle_name}} {{$item->customer->last_name}}</td>
                                        <td><div class="justify-content-between">Rp <span class="harga-trans thousand-separator">{{$item->total}}</span></div></td>
                                        <td class="text-center">{{$item->jumlah}}</td>
                                    </tr>
                                    @endforeach
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
    var separatorInterval = setInterval(setThousandSeparator, 10);
    function setThousandSeparator () {
        let length = $('.thousand-separator').length;
        if (length != 0) {
            $('.thousand-separator').each(function(index, element) {
                let val = $(element).text();
                if (val != ''){
                    while(val.indexOf('.') != -1){
                        val = val.replace('.', '');
                    }
                    let number = parseInt(val);
                    $(element).text(number.toLocaleString(['ban', 'id']));
                }
            });
            clearInterval(separatorInterval);
        }
    };
    new Chart("chart-transaksi-tiket", {
        type: "bar",
        data: {
            labels: ['{{$flight[6]["mon"]}}', '{{$flight[5]["mon"]}}', '{{$flight[4]["mon"]}}', '{{$flight[3]["mon"]}}', '{{$flight[2]["mon"]}}', '{{$flight[1]["mon"]}}','{{$flight[0]["mon"]}}'], // val bulan or val X
            datasets: [{
                data: ['{{$flight[6]["data"]}}', '{{$flight[5]["data"]}}', '{{$flight[4]["data"]}}', '{{$flight[3]["data"]}}', '{{$flight[2]["data"]}}', '{{$flight[1]["data"]}}','{{$flight[0]["data"]}}'], // val data or val Y
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
            labels: ['{{$flight[6]["mon"]}}', '{{$flight[5]["mon"]}}', '{{$flight[4]["mon"]}}', '{{$flight[3]["mon"]}}', '{{$flight[2]["mon"]}}', '{{$flight[1]["mon"]}}','{{$flight[0]["mon"]}}'],  // val bulan or val X
            datasets: [{
                data: ['{{$flight[6]["count"]}}', '{{$flight[5]["count"]}}', '{{$flight[4]["count"]}}', '{{$flight[3]["count"]}}', '{{$flight[2]["count"]}}', '{{$flight[1]["count"]}}','{{$flight[0]["count"]}}'],  // val data or val Y
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
            labels: ['{{$tour[6]["mon"]}}', '{{$tour[5]["mon"]}}', '{{$tour[4]["mon"]}}', '{{$tour[3]["mon"]}}', '{{$tour[2]["mon"]}}', '{{$tour[1]["mon"]}}','{{$tour[0]["mon"]}}'],  // val bulan or val X
            datasets: [{
                data: ['{{$tour[6]["data"]}}', '{{$tour[5]["data"]}}', '{{$tour[4]["data"]}}', '{{$tour[3]["data"]}}', '{{$tour[2]["data"]}}', '{{$tour[1]["data"]}}','{{$tour[0]["data"]}}'],  // val data or val Y
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
                    text: 'Transaksi Tour'
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
            labels: ['{{$tour[6]["mon"]}}', '{{$tour[5]["mon"]}}', '{{$tour[4]["mon"]}}', '{{$tour[3]["mon"]}}', '{{$tour[2]["mon"]}}', '{{$tour[1]["mon"]}}','{{$tour[0]["mon"]}}'],  // val bulan or val X
            datasets: [{
                data: ['{{$tour[6]["count"]}}', '{{$tour[5]["count"]}}', '{{$tour[4]["count"]}}', '{{$tour[3]["count"]}}', '{{$tour[2]["count"]}}', '{{$tour[1]["count"]}}','{{$tour[0]["count"]}}'], // val data or val Y
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
