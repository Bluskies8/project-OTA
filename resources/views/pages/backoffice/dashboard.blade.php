@extends('layout.admins')

@section('content')
@include('includes.datatables')
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <header>
                <h1>Dasboard</h1>
            </header>
            <hr style="margin: 1rem -1rem;" />
            <section id="section-dashboard">
                <div class="row">
                    {{-- <div class="col-6 mb-3">
                        <canvas id="chart-transaksi-tiket" style="width:100%;"></canvas>
                    </div> --}}
                    <div class="col-3 mb-4">
                        <div class="card">
                            <div class="card-body" style="border-bottom: rgb(54, 162, 235) 4px solid; border-radius: inherit;">
                                <p class="text-muted">NEW ACCOUNTS</p>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-arrow-up text-success"></i>
                                    <p class="text-large ms-3">120<span class="text-muted">%</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 mb-4">
                        <div class="card">
                            <div class="card-body" style="border-bottom: rgb(255, 99, 32) 4px solid; border-radius: inherit;">
                                <p class="text-muted">EXPENSES</p>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-arrow-down text-danger"></i>
                                    <p class="text-large mx-3">21<span class="text-muted">%</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 mb-4">
                        <div class="card">
                            <div class="card-body" style="border-bottom: rgb(75, 192, 192) 4px solid; border-radius: inherit;">
                                <p class="text-muted">TICKET INCOME</p>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-rupiah-sign text-muted"></i>
                                    <p class="text-large mx-3 thousand-separator">2400000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 mb-4">
                        <div class="card">
                            <div class="card-body" style="border-bottom: rgb(255, 159, 64) 4px solid; border-radius: inherit;">
                                <p class="text-muted">TOUR INCOME</p>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-rupiah-sign text-muted"></i>
                                    <p class="text-large mx-3 thousand-separator">1200000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="offset-1 col-10 mb-4">
                        <div class="card">
                            <div class="card-body" style="border-bottom: rgb(153, 102, 255) 4px solid; border-radius: inherit;">
                                <h3 class="text-muted">ALL TRANSACTION</h3>
                                <hr style="margin: 1rem -1rem;" />
                                <canvas id="chart-transaksi" style="width:100%;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card">
                            <div class="card-body" style="border-bottom: rgb(255, 205, 86) 4px solid; border-radius: inherit;">
                                <p class="text-muted">MOST TICKET DEPARTURE</p>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-plane-departure text-muted"></i>
                                    <p class="text-large mx-3">Surabaya</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card">
                            <div class="card-body" style="border-bottom: rgb(255, 174, 201) 4px solid; border-radius: inherit;">
                                <p class="text-muted">MOST TICKET ARRIVAL</p>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-plane-departure text-muted"></i>
                                    <p class="text-large mx-3">Jakarta</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="card">
                            <div class="card-body" style="border-bottom: rgb(201, 203, 207) 4px solid; border-radius: inherit;">
                                <p class="text-muted">MOST TOUR VISITED COUNTRY</p>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-earth-asia text-muted"></i>
                                    <p class="text-large mx-3">Japan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(document).ready(function() {
    setTimeout(setThousandSeparator, 10);
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
        }
    };

    new Chart("chart-transaksi", {
        type: "bar",
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'], // val bulan or val X
            datasets: [{
                data: [3000000, 4000000, 4800000, 3600000, 4400000, 3600000, 3000000, 4000000, 4800000, 3600000, 4400000, 3600000], // val data or val Y
                fill: true,
                borderColor: 'rgb(153, 102, 255)',
                backgroundColor: 'rgba(153, 102, 255, 0.5)',
            }]
        },
        options: {
            scales: {
                y: {
                    max: 5000000,
                    min: 0,
                    ticks: {
                        stepSize: 1000000
                    },
                }
            },
            plugins: {
                title: {
                    display: false,
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
