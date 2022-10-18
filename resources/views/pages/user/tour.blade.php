@extends('layout.users')
@section('title'){{$data['data']['name']}}@endsection
@section('content')
<div style="background: rgba(0, 0, 0, .25) url({{$data['data']['header_img_url']}});background-repeat: no-repeat;background-size: cover;background-position: center;background-blend-mode: darken;">
    <div class="container py-3"><button class="btn" type="button" style="background-color: #FF9142;color: white;">{{$data['data']['days_count']}} hari {{$data['data']['nights_count']}}Malam</button>
        <h1 class="text-uppercase" style="margin-top: 5rem;color: white;">{{$data['data']['name']}}</h1>
        <div class="d-flex justify-content-between">
            <button class="btn btn-success d-flex align-items-center justify-content-center" type="button" style="border-radius: 50%;width: 36px;height: 36px;padding: 0;">
                <i class="fas fa-plane-departure" style="font-size: 14px;"></i>
            </button>
            <button id="to-photos" class="btn btn-outline-secondary" type="button" style="background-color: white; color: black!important;"><i class="far fa-image"></i>&nbsp;Photos</button>
        </div>
    </div>
</div>

<div class="container mt-3" style="padding-bottom: 2rem;">
    <div class="row">
        <div class="col-12 col-lg-8 order-2 order-lg-1">
            <section id="section-highlights" class="mb-4">
                <div class="card" style="box-shadow: 1px 2px 6px gray, 1px 2px 6px gray;">
                    <div class="card-body p-0">
                        <h2 class="card-title p-3" style="background-color: #FF9142;color: white;border-top-left-radius: .25rem;border-top-right-radius: .25rem;">Highlights</h2>
                        <ul class="list-unstyled mb-0 p-3" id="highlights">
                            @foreach ($data['highlights'] as $item)
                                <li><i class="fas fa-chevron-circle-right me-2"></i>{{$item->item}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>
            <section id="section-itinetary" class="mb-4">
                <div class="card" style="box-shadow: -1px 2px 6px gray, 1px 2px 6px gray;">
                    <div class="card-body p-0">
                        <h2 class="card-title p-3" style="color: white;background-color: rgb(75, 0, 118);border-top-left-radius: .25rem;border-top-right-radius: .25rem;">Itinetary</h2>
                        <div id="itinetary" class="p-3">
                            <div class="d-flex align-items-center" style="font-size: 14px;"><i class="fas fa-check-circle me-2"></i>
                                <div class="d-flex flex-column">
                                    <p>Hari ke-1</p>
                                    <p class="text-uppercase" style="color: var(--bs-gray);">{{$data['itinenaries'][0]->label}}</p>
                                </div>
                            </div>
                            @foreach ($data['itinenaries'] as $item)
                            @if ($loop->index !=0)
                            <div class="vr ms-2" style="border-left: 1px solid lightgray;height: 22px;"></div>
                            <div class="d-flex align-items-center" style="font-size: 14px;"><i class="fas fa-check-circle me-2"></i>
                                <div class="d-flex flex-column">
                                    <p>Hari ke-{{$loop->index+1}}</p>
                                    <p class="text-uppercase" style="color: var(--bs-gray);">{{$item->label}}</p>
                                </div>
                            </div>
                            @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </section>
            <section id="section-photos" class="mb-4">
                <div class="card" style="box-shadow: -1px 2px 6px gray, 1px 2px 6px gray;">
                    <div class="card-body p-0">
                        <h2 class="card-title p-3" style="border-top-left-radius: .25rem;border-top-right-radius: .25rem;">Photos</h2>
                        <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
                            <div class="carousel-inner">
                                @foreach ($data['photos'] as $item)
                                <div class="carousel-item active"><img class="w-100 d-block" src="{{$item->img_url}}" alt="Slide Image"></div>
                                @endforeach
                                {{-- <div class="carousel-item"><img class="w-100 d-block" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Slide Image"></div>
                                <div class="carousel-item"><img class="w-100 d-block" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Slide Image"></div> --}}
                            </div>
                            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
                            <ol class="carousel-indicators">
                                <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active rounded-indicators"></li>
                                <li data-bs-target="#carousel-1" data-bs-slide-to="1" class="rounded-indicators"></li>
                                <li data-bs-target="#carousel-1" data-bs-slide-to="2" class="rounded-indicators"></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section id="section-includes" class="mb-4">
                <div class="card" style="box-shadow: -1px 2px 6px gray, 1px 2px 6px gray;">
                    <div class="card-body p-0">
                        <div>
                            <ul class="nav nav-tabs" role="tablist" style="font-size: 1.25rem;">
                                <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1">Includes</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-2">Excludes</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active p-3" role="tabpanel" id="tab-1">
                                    <ul class="list-unstyled mb-2" id="includes">
                                        @foreach ($data['includes'] as $item)
                                            <li><i class="fas fa-check me-2"></i>{{$item->item}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="tab-pane p-3" role="tabpanel" id="tab-2">
                                    <ul class="list-unstyled mb-2" id="excludes">
                                        @foreach ($data['excludes'] as $item)
                                            <li><i class="fas fa-times me-2"></i>{{$item->item}}</li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="section-terms-conditions" class="mb-4">
                <div class="card" style="box-shadow: -1px 2px 6px gray, 1px 2px 6px gray;">
                    <div class="card-body p-0">
                        <h2 class="card-title p-3" style="color: white;background-color: rgb(75, 0, 118);border-top-left-radius: .25rem;border-top-right-radius: .25rem;">Terms &amp; Conditions</h2>
                        <ul class="list-unstyled mb-2 p-3" id="terms-conditions">
                            @isset($data['thermsConds'])
                            @foreach ($data['thermsConds'] as $item)
                                @isset($item->item)
                                <li><i class="fas fa-info-circle me-2"></i>{{$item->item}}</li>
                                @endisset
                            @endforeach
                            @endisset
                        </ul>
                    </div>
                </div>
            </section>
            <section id="section-cancellation" class="mb-4">
                <div class="card" style="box-shadow: -1px 2px 6px gray, 1px 2px 6px gray;">
                    <div class="card-body p-0">
                        <h2 class="card-title p-3" style="background-color: rgb(75, 0, 118);color: white;border-top-left-radius: .25rem;border-top-right-radius: .25rem;">Cancellation Policy</h2>
                        <ul class="list-unstyled mb-2 p-3" id="cancellation">
                            @isset($data['cancelPolicies'])
                            @foreach ($data['cancelPolicies'] as $item)
                            @isset($item->item)
                            <li><i class="fas fa-info-circle me-2"></i>{{$item->item}}</li>
                            @endisset
                            @endforeach
                            @endisset
                        </ul>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-12 col-lg-4 order-1 order-lg-2">
            <section id="section-order" class="mb-4">
                <div class="card" style="box-shadow: 1px 2px 6px gray, 1px 2px 6px gray;">
                    <div class="card-body p-0">
                        <header class="p-3" style="background-color: #FF9142;border-top-left-radius: .25rem;border-top-right-radius: .25rem;">
                            <p>Start from</p>
                            <h2 style="color: white;">Rp {{$data['data']['start_price']}}</h2>
                        </header>
                        {{-- <form> --}}
                            <input type="hidden" name="id-tour" value="{{$data['data']['id']}}">
                            <div class="p-3"><input class="form-control" type="text" placeholder="Choose Date" onfocus="(this.type = &#39;date&#39;)"></div>
                            <hr class="my-0">
                            <div class="p-3 room">
                                <div class="d-flex align-items-center mb-3"><i class="fas fa-user me-2" style="font-size: 18px;color: rgb(75, 0, 118);"></i>
                                    <p>Participants</p>
                                </div>
                                <div class="card mb-3 room-temp" id="room-1">
                                    <p class="fw-bold p-2 roomcount">Room 1</p>
                                    <button type="button" class="btn-close btn-remove-room position-absolute" style="top: -2px; right: -2px; box-shadow: none; display: none; aria-label="Close"></button>
                                    <hr class="my-0">
                                    <div class="p-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <p>Adult(s)</p>
                                                <p style="color: var(--bs-gray);">&gt; 11 years old</p>
                                            </div>
                                            <div class="me-3" style="font-size: 22px;"><i class="far fa-minus-square"></i><span class="mx-3 number-adult" id = "adult">1</span><i class="far fa-plus-square"></i></div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <p>Child(ren)</p>
                                                <p style="color: var(--bs-gray);">2 - 11 years old</p>
                                            </div>
                                            <div class="me-3" style="font-size: 22px;"><i class="far fa-minus-square"></i><span class="mx-3 number-child" id = "child">0</span><i class="far fa-plus-square"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- </form> --}}
                            <div class="p-3">
                                <button class="mb-3 btn w-100 add-room" type="submit" style="color: #FF9142;border: 1px solid #FF9142;">Add Room</button>
                                <hr class="my-0">
                            <button class="btn w-100" id = 'quote' type="button" style="color: white;background-color: rgb(75, 0, 118);">Quote Now</button>
                            <p>Terms &amp; Conditions</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script src="{{asset('js/user/tour.js')}}"></script>
@endsection
