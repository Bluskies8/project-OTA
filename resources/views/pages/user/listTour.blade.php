@extends('layout.users')
@section('title'){{$data['data']['name']}}@endsection
@section('content')

<div class="container" style="margin-top: 100px;padding-bottom: 2rem;">
    <h3 class="mb-2">Nama Lokasi</h3>
    <div id="list" style="height: 75vh;overflow-y: auto;">
        {{-- loop disini --}}
        <div class="card mb-3">
            <div class="card-body p-0" style="border-radius: inherit;">
                <div class="p-3 data-penerbangan" style="background-image: linear-gradient(to top, rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.5)), url(bg_search.jpg);background-repeat: no-repeat;background-size: cover;background-position: center center;border-radius: inherit;">
                    <div class="row">
                        <div class="col-4 d-flex align-items-center" style="color: white;">
                            <p class="ms-3 fs-4 fw-bold">Nama Tour</p>
                        </div>
                        <div class="col-4 d-flex align-items-center justify-content-evenly" style="color: white;">
                            <div class="text-center"><i class="fas fa-sun" style="font-size: 1.25rem;"></i>
                                <p>4 hari</p>
                            </div>
                            <div class="text-center"><i class="fas fa-moon"></i>
                                <p>3 Malam</p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <p><span class="fs-4 fw-bold" style="color: #FF9142;">800.000</span></p><button class="btn btn-sm" type="button" style="background-color: #FF9142;width: 200px;color: white;">Pilih</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
