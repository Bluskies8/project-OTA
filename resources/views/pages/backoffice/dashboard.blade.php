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
                <div class="row mb-5">
                    {{-- <div class="col-6 mb-3">
                        <canvas id="chart-transaksi-tiket" style="width:100%;"></canvas>
                    </div> --}}
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-body" style="box-shadow: rgba(240, 46, 170, 0.4) 0px 5px, rgba(240, 46, 170, 0.3) 0px 10px, rgba(240, 46, 170, 0.2) 0px 15px, rgba(240, 46, 170, 0.1) 0px 20px, rgba(240, 46, 170, 0.05) 0px 25px;">
                                <p class="text-muted">NEW ACCOUNTS</p>
                                <div>
                                    <i class="fa-solid fa-arrow-up text-success"></i>
                                    <p class=text-large>120<span class="text-muted">%</span></p>
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


});
</script>
@endsection
