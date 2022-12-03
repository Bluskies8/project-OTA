@extends('layout.users')
@section('title'){{"List Tour"}}@endsection
@section('content')

<div class="container" style="margin-top: 100px;padding-bottom: 2rem;">
    <h3 class="mb-2">Tour</h3>
    <div id="filter" class="px-3 mb-4 position-relative">
        <button class="btn btn-primary btn-filter" type="button">Filter<i class="fas fa-caret-down ms-2"></i></button>
        <div id="menu-filter" class="position-absolute mt-2 card card-body" style="background-color: white;z-index: 1; display: none;">
            <form action="/tour" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <h4>Sort By :</h4>
                        <div style="overflow-y: auto;">
                            <input type="hidden" name="keyword" value = "{{$search}}">
                            @if ($sort == "1")
                            <div class="form-check"><input type="radio" name = "sort" value = "1" class="form-check-input" id="formCheck-lowest-price" checked/><label class="form-check-label" for="formCheck-lowest-price">Lowest Price</label></div>
                            @else
                            <div class="form-check"><input type="radio" name = "sort" value = "1" class="form-check-input" id="formCheck-lowest-price" /><label class="form-check-label" for="formCheck-lowest-price">Lowest Price</label></div>
                            @endif
                            @if ($sort = "2")
                            <div class="form-check"><input type="radio" name = "sort" value = "2" class="form-check-input" id="formCheck-highest-price" /><label class="form-check-label" for="formCheck-highest-price">Highest Price</label></div

                            @else
                            <div class="form-check"><input type="radio" name = "sort" value = "2" class="form-check-input" id="formCheck-highest-price" /><label class="form-check-label" for="formCheck-highest-price">Highest Price</label></div>
                            @endif
                            @if ($sort = "3")
                            <div class="form-check"><input type="radio" name = "sort" value = "3" class="form-check-input" id="formCheck-shortest-day" /><label class="form-check-label" for="formCheck-shortest-day">Shortest Day Count</label></div>
                            @else
                            <div class="form-check"><input type="radio" name = "sort" value = "3" class="form-check-input" id="formCheck-shortest-day" /><label class="form-check-label" for="formCheck-shortest-day">Shortest Day Count</label></div>
                            @endif
                            @if ($sort = "4")
                            <div class="form-check"><input type="radio" name = "sort" value = "4" class="form-check-input" id="formCheck-longest-day" /><label class="form-check-label" for="formCheck-longest-day">Longest Day Count</label></div>
                            @else
                            <div class="form-check"><input type="radio" name = "sort" value = "4" class="form-check-input" id="formCheck-longest-day" /><label class="form-check-label" for="formCheck-longest-day">Longest Day Count</label></div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="text-end"><button class="btn btn-primary" type="submit">Apply</button></div>
            </form>
        </div>
    </div>
    <div id="list" style="overflow-y: auto;">
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
                                <p><span class="fs-4 fw-bold thousand-separator" style="color: #FF9142;">{{$item->start_price}}</span></p>
                                <button class="btn btn-sm btn-pilih" type="button" style="background-color: #FF9142;width: 200px;color: white;">Pilih</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="{{asset('js/user/tour.js')}}"></script>
@endsection
