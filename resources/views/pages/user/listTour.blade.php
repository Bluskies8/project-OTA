@extends('layout.users')
@section('title'){{"List Tour"}}@endsection
@section('content')

<div class="container" style="margin-top: 100px;padding-bottom: 2rem;">
    <h3 class="mb-2">Nama Lokasi</h3>
    {{-- <div id="list" style="height: 75vh;overflow-y: auto;"> --}}
        {{-- loop disini --}}
        @foreach ($data as $item)
            <div class="card mb-3" id = "{{$item->slug}}">
                <div class="card-body p-0" style="border-radius: inherit;">
                    <div class="p-3 data-penerbangan" style="background-image: linear-gradient(to top, rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.5)), url({{url($item->thumbnail_img_url)}});background-repeat: no-repeat;background-size: cover;background-position: center center;border-radius: inherit;">
                        <div class="row">
                            <div class="col-4 d-flex align-items-center" style="color: white;">
                                <p class="ms-3 fs-4 fw-bold">{{$item->name}}</p>
                            </div>
                            <div class="col-4 d-flex align-items-center justify-content-evenly" style="color: white;">
                                <div class="text-center"><i class="fas fa-sun" style="font-size: 1.25rem;"></i>
                                    <p>{{$item->days_count}} hari</p>
                                </div>
                                <div class="text-center"><i class="fas fa-moon"></i>
                                    <p>{{$item->nights_count}} Malam</p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <p><span class="fs-4 fw-bold" style="color: #FF9142;">{{$item->start_price}}</span></p>
                                <button class="btn btn-sm btn-pilih" type="button" style="background-color: #FF9142;width: 200px;color: white;">Pilih</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    {{-- </div> --}}
</div>

<script src="{{asset('js/user/tour.js')}}"></script>
@endsection
