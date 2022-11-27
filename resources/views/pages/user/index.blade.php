@extends('layout.users')

@section('title'){{'HOME'}}@endsection
@section('content')
<div class="container py-5"  style="min-height: calc(100vh - 364px)">
    <section class="shadow pt-3 p-4 card" id="section-quick-action">
        <div>
            <ul class="nav nav-tabs" role="tablist" style="border-bottom: none;">
                <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1"><i class="fas fa-thin fa-plane-departure me-2"></i>FLIGHT<br></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-2"><i class="fas fa-thin fa-house-building me-2"></i>TOUR</a></li>
            </ul>
            <div class="tab-content mt-2">
                <div class="tab-pane active" role="tabpanel" id="tab-1">
                    <form class="mt-3" action = "/Flight/search" method="POST">
                        @csrf
                        <div class="d-flex align-items-center">
                            <h3 class="text-uppercase color-main me-3 mb-3">book your flight</h3>
                            @if (old('type') == 2)
                            <div class="form-check me-2 mb-0"><input name = "type" value = "2" class="form-check-input" type="radio" id="formCheck-1" name="flight-type" style="filter: hue-rotate(180deg) saturate(160%);" checked><label class="form-check-label" for="formCheck-1">Round-Trip</label></div>
                            <div class="form-check me-2 mb-0"><input name = "type" value = "1" class="form-check-input" type="radio" id="formCheck-2" name="flight-type" style="filter: hue-rotate(180deg) saturate(160%);"><label class="form-check-label" for="formCheck-2">One-Way</label></div>
                            @else
                            <div class="form-check me-2 mb-0"><input name = "type" value = "2" class="form-check-input" type="radio" id="formCheck-1" name="flight-type" style="filter: hue-rotate(180deg) saturate(160%);"><label class="form-check-label" for="formCheck-1">Round-Trip</label></div>
                            <div class="form-check me-2 mb-0"><input name = "type" value = "1" class="form-check-input" type="radio" id="formCheck-2" name="flight-type" style="filter: hue-rotate(180deg) saturate(160%);"checked><label class="form-check-label" for="formCheck-2">One-Way</label></div>
                            @endif
                        </div>
                        <div class="row mb-4">
                            <div class="col-4">
                                <div class="position-relative">
                                    <input id="input-departure" name="departure" list="list-departure" class="form-control" value = {{old('departure')}}>
                                    <datalist id="list-departure" >
                                        @foreach ($airport as $item)
                                        <option value=" {{$item->iata_code}}" data-tokens="{{$item->name}} - {{$item->city_name}}">{{$item->name}} - {{$item->city_name}}</option>
                                        @endforeach
                                    </datalist>
                                    <p class="position-absolute color-sub input-head">Departure</p>
                                    @error('departure')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="position-relative">
                                    <p class="position-absolute color-sub input-head">Destination</p>
                                    <input id="input-destination" name="destination" list="list-destination" class="form-control" value = {{old('destination')}}>
                                    <datalist id="list-destination" >
                                        @foreach ($airport as $item)
                                        <option value=" {{$item->iata_code}}" data-tokens="{{$item->name}} - {{$item->city_name}}">{{$item->name}} - {{$item->city_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('destination')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="position-relative">
                                    <input class="form-control" type="date" name = "depart" value = {{old('depart')}}>
                                    <p class="position-absolute color-sub input-head">Depart</p>
                                    @error('depart')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="position-relative">
                                    @if (old('type') == 2)
                                    <input class="form-control" id = 'return-date'type="date" name = "return" value = {{old('return')}}>
                                    @else
                                    <input class="form-control" id = 'return-date'type="date" name = "return" disabled>
                                    @endif
                                    <p class="position-absolute color-sub input-head">Return</p>
                                    @error('return')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="position-relative">
                                    <input class="form-control" type="text" name = "passanger" value = "{{old('passanger')}}">
                                    <p class="position-absolute color-sub input-head">Passenger</p>
                                    @error('passanger')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="position-relative">
                                    <select class="form-select" name = "class">
                                            <option value="economy" selected="">Economy</option>
                                            <option value="premium_economy">Premium Economy</option>
                                            <option value="business">Business Class</option>
                                            <option value="first">First Class</option>
                                    </select>
                                    <p class="position-absolute color-sub input-head">Class</p>
                                </div>
                            </div>
                            <div class="col text-end"><button class="btn bgcolor-main" type="submit">Search</button></div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" role="tabpanel" id="tab-2">
                    <div class="d-flex align-items-center">
                        <h3 class="text-uppercase color-main me-3">travels beyond</h3>
                    </div>
                    <form class="mt-3 text-end" method="post" action="/tour">
                        @csrf
                        <input class="form-control mb-4" name = "keyword" type="text" placeholder="City, destination or tour name">
                        <button class="btn bgcolor-main" type="submit">Explore</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="section-carousel" class="mt-5">
        <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
            <div class="carousel-inner">
                @foreach ($carousel as $item)
                <div class="carousel-item active"><a href="{{$item->direct_link}}"><img class="w-100 d-block" src="{{url('/carousel/'.$item->id)}}" alt="" style="max-height: 420px;object-fit: none;"></a></div>
                @endforeach
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev" style="width: 10%;"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next" style="width: 10%;"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
            <ol class="carousel-indicators color-main">
                <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
            </ol>
        </div>
    </section>
    @isset($product)
        @foreach ($product as $products)
        <section id="section-package-{{$loop->index+1}}" class="mt-5 text-center section-package">
            <h2 class="text-uppercase color-main">{{$products->title}}</h2>
            <h5 class="mb-3 color-sub">{{$products->description}}<br></h5>
            <div class="carousel slide" data-bs-ride="carousel" id="carousel-{{$loop->index+2}}">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            @foreach ($products->products as $item)
                            <div class="col-4 px-4 mb-3">
                                <div style="background-color: #FF9142;border-radius: 16px;color: white;">
                                    <div class="card position-relative" style="height: 520px;border: none;background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.75)), url({{url($item->thumbnail_img_url)}}); background-repeat: no-repeat;background-size: cover;background-position: center center;">
                                        <div class="card-body d-flex flex-column justify-content-between" style="z-index: 2;text-align: start;">
                                            <h3 class="text-uppercase card-title mt-3">{{$item->name}}</h3>
                                            <div class="mb-3">
                                                <div>
                                                    <p>Starting from</p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <h2>Rp. <h2 class = "thousand-separator">{{$item->start_price}}</h2></h2>
                                                    <div style="font-size: 24px;"><i class="far fa-heart"></i><i class="fas fa-heart" style="display: none;"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/tour/{{$item->slug}}" style="color: inherit; text-decoration: none;"><p style="font-size: 20px;margin-top: 4px;padding-bottom: 4px;">Book Now&nbsp;<i class="fas fa-angle-right"></i></p></a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <ol class="carousel-indicators" style="margin-bottom: 0;bottom: -22px;">
                    <li data-bs-target="#carousel-2" data-bs-slide-to="0" class="active"></li>
                </ol>
            </div>
        </section>
        @endforeach
    @endisset
</div>
<section id="section-footer">
    <div class="py-3" style="background-image: linear-gradient(0deg, rgba(255, 206, 160, 0.6), rgba(255, 206, 160, 0.6)), url({{asset('img/bg_footer.jpg')}}); height: 260px;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="mb-3">Online Travel &amp; Tour</h2>
                    <div>
                        <p class="mb-1">About Us</p>
                        <p class="mb-1">Corporate</p>
                        <p class="mb-1">Privacy &amp; Policy</p>
                        <p class="mb-1">FAQ</p>
                        <p class="mb-1">Contact Us</p>
                    </div>
                </div>
                <div class="col">
                    <h2 class="mb-3">Manage Booking</h2>
                    <div>
                        <p class="mb-1">Flights</p>
                        <p class="mb-1">Tour</p>
                    </div>
                </div>
                <div class="col d-flex flex-column justify-content-between">
                    <div>
                        <h2 class="mb-3">Follow Us</h2>
                        <div><span class="fa-stack me-3"><i class="fas fa-circle fa-stack-2x"></i><i class="fab fa-whatsapp fa-stack-1x" style="color: white;"></i></span><span class="fa-stack me-3"><i class="fas fa-circle fa-stack-2x"></i><i class="fab fa-instagram fa-stack-1x" style="color: white;"></i></span><span class="fa-stack me-3"><i class="fas fa-circle fa-stack-2x"></i><i class="fab fa-youtube fa-stack-1x" style="color: white;"></i></span><span class="fa-stack me-3"><i class="fas fa-circle fa-stack-2x"></i><i class="fab fa-facebook-square fa-stack-1x" style="color: white;"></i></span></div>
                    </div>
                    <p style="max-width: 280px;">Jl Raya Puputan NO 16D, Renon Denpasar - Bali, Indonesia<br></p>
                </div>
            </div>
        </div>
    </div>
    <div class="py-2" style="background-color: #FF9142;color: white;text-align: center;">
        <p>lila.co.id © 2021. All rights reserved.<br></p>
    </div>
</section>
<script src="{{asset('js/home.js')}}"></script>
@endsection
