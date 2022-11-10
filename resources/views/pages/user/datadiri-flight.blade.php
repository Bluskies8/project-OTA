@section('title')Data Diri Flight @endsection
@extends('layout.users')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container py-5">
    <div class="row">
        <div class="col-8">

            <div class="card">
                <div class="card-body">
                    <form> <!-- isi link dari backend -->
                        <div id="container-form-CP" class="mb-4">
                            <h3>Contact Person</h3>
                            <hr />
                            <div class="row">
                                <!-- loop dari sini -->
                                <div class="col-4">
                                    <div class="mb-2">
                                        <p>Nama Lengkap</p>
                                        <div class="form-control d-flex" >
                                            <select style="outline: none; border: none;" id = "cp-title">
                                                <option value="mr">Mr</option>
                                                <option value="mrs">Mrs</option>
                                                <option value="ms">Ms</option>
                                            </select>
                                            <input class="w-100" style="outline: none; border: none; type="text" id = "cp-nama" name = "cp-nama" />
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <p>E-mail</p>
                                        <input type="text" name = "cp-email" class="form-control" />
                                    </div>
                                    <div class="mb-2">
                                        <p>No Telepon</p>
                                        <div class="form-control d-flex align-items-center">
                                            <strong>+62</strong>
                                            <input class="w-100" style="outline:none; border:none; type="text" name = "cp-nohp" />
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <p>Tanggal Lahir</p>
                                        <input class="form-control" name = "cp-birth" type="date" />
                                    </div>
                                    <div class="mb-2">
                                        <p>Kode Referral</p>
                                        <input class="form-control" name="kode_referral" type="text" />
                                    </div>
                                </div>
                                <!-- sampe sini -->
                            </div>
                        </div>
                        <div id = "dataflight">
                            <hr style="margin: 1rem -1rem;" />
                            <div id="container-form-dewasa" class="mb-4">
                                <h4>Dewasa</h4>
                                <hr />
                                <div class="row">
                                @for ($i = 0; $i < $count; $i++)
                                    <!-- loop dari sini -->
                                    <div class="col-4">
                                        <div class="mb-2">
                                            <p>Nama Lengkap</p>
                                            <div class="form-control d-flex" >
                                                <select style="outline: none; border: none;" id = "title{{($i+1)}}">
                                                    <option value="mr">Mr</option>
                                                    <option value="mrs">Mrs</option>
                                                    <option value="ms">Ms</option>
                                                </select>
                                                <input class="w-100" style="outline: none; border: none; type="text" id = "adult-nama{{($i+1)}}" name = "adult-nama{{($i+1)}}" />
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <p>E-mail</p>
                                            <input type="text" id = "adult-email{{($i+1)}}" name = "adult-email{{($i+1)}}" class="form-control" />
                                        </div>
                                        <div class="mb-2">
                                            <p>No Telepon</p>
                                            <div class="form-control d-flex align-items-center">
                                                <strong>+62</strong>
                                                <input class="w-100" style="outline:none; border:none;" type="text" id = "adult-nohp{{($i+1)}}" name = "adult-nohp{{($i+1)}}" />
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <p>Tanggal Lahir</p>
                                            <input class="form-control" id = "adult-birth{{($i+1)}}" name = "adult-birth{{($i+1)}}" type="date" />
                                        </div>
                                    </div>
                                    <!-- sampe sini -->
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <button class="btn btn-primary" type="button" id = "btn-submit-flight" style="color: #fff;background-color: rgb(75, 0, 118);">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <header class="d-flex align-items-center justify-content-between"><i class="fas fa-plane" style="font-size: 1.25rem;"></i>
                        <h4><span>{{$flight->slices[0]->origin->city_name}}</span><i class="fas fa-arrow-right mx-1" style="font-size: 1.25rem;width: initial;"></i><span>{{$flight->slices[0]->destination->city_name}}</span></h4>
                        {{-- <p class="px-2 py-1" style="color: #FF9142;">Details</p> --}}
                    </header>
                    <hr style="margin: 1rem -1rem;" />
                    <section>
                        @foreach ($flight->slices as $flights)
                        @if ($loop->index == 0)
                        <span id="departure-date">{{$depart_date}}</span></p>
                        @else
                        <span id="departure-date">{{$return_date}}</span></p>
                        @endif
                        <div class="d-flex mb-3"><img class="me-3" src="{{$flight->owner->logo_symbol_url}}" style="max-height: 48px;" />
                            <div class="d-flex flex-column">
                                <p>{{$flight->owner->name}}</p>
                                <p class="text-secondary">{{$cabin}}</p>
                            </div>
                        </div>
                            @foreach ($flights->segments as $key => $item)
                                <?php
                                    $tempdeparting = strtotime($item->departing_at);
                                    $depart = date('d M',$tempdeparting);
                                    $temparriving = strtotime($item->arriving_at);
                                    $arrive = date('d M',$temparriving);
                                    $temp = gmdate('H:i', $temparriving - $tempdeparting);
                                    $count = $key;
                                ?>
                                    <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                        <p>{{gmdate('H:i', $tempdeparting)}}</p><button class="btn btn-secondary btn-sm" type="button" style="padding: 2px 4px;">{{$flight->slices[0]->origin->iata_code}}</button>
                                    </div>
                                    <div class="d-flex flex-column align-items-center justify-content-center position-relative">
                                        <p>{{$temp}}</p>
                                        @if ($count == 1)
                                        <p> Transit</p>
                                        @else
                                        <p>Langsung</p>
                                        @endif
                                        <div class="position-absolute h-100 d-flex justify-content-between align-items-center pt-1" style="width: 130px;"><i class="far fa-circle text-secondary"></i>
                                            <hr class="w-100" /><i class="fas fa-dot-circle text-secondary"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                        <p>{{gmdate('H:i', $temparriving)}}</p><button class="btn btn-secondary btn-sm" type="button" style="padding: 2px 4px;">{{$flight->slices[0]->destination->iata_code}}</button>
                                    </div>
                                    </div>
                            @endforeach
                        @endforeach
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

<div role="dialog" tabindex="-1" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modal Title</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>The content of your modal.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button">Save</button>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/user/tour.js')}}"></script>
@endsection
