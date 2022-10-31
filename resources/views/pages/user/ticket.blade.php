@extends('layout.users')

@section('content')
<meta name="type" content="{{ $type }}">
<meta name="passid" content="{{ $passid }}">
<meta name="pass_count" content="{{ $pass_count }}">
<meta name="cabin" content="{{ $cabin }}">
<meta name="depart_date" content="{{ $depart_date }}">
<meta name="return_date" content="{{ $return_date }}">
<meta name="departure" content="{{ $data->slices[0]->origin->iata_code }}">
<meta name="destination" content="{{ $data->slices[0]->destination->iata_code }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<?php $count = 0; ?>
<div class="container pb-5" id = "maincount">
    <div class="sticky py-4">
        <div class="card mb-4" id="pencarian" style="background-color: inherit;">
            <div class="card-body p-0 d-flex" style="border-top-left-radius: inherit;border-bottom-left-radius: inherit;">
                <div class="w-75 p-3" style="background-color: white;border-top-right-radius: 75px;border-bottom-right-radius: 75px;border-top-left-radius: inherit;border-bottom-left-radius: inherit;">
                    <p class="fw-bold">{{$data->slices[0]->origin->city_name}}({{$data->slices[0]->origin->iata_code}})<i class="fas fa-long-arrow-alt-right mx-2"></i>&nbsp;{{$data->slices[0]->destination->city_name}}({{$data->slices[0]->destination->iata_code}})</p>
                    <p>{{$days}}<i class="fas fa-minus mx-2 fa-rotate-90"></i>&nbsp;{{$pass_count}}&nbsp;<i class="fas fa-minus mx-2 fa-rotate-90"></i>&nbsp;{{$cabin}}</p>
                </div>
                <div class="w-25 p-3 d-flex align-items-center justify-content-end"><button class="btn btn-primary" id="btn-pencarian" type="button">&nbsp;<i class="fas fa-search"></i>&nbsp;Ganti Pencarian</button></div>
            </div>
        </div>
        <div id="filter" class="px-3 d-flex align-items-center">
            <p>Filter :&nbsp;</p>
            <div id="data-transit" class="position-relative ms-3"><button class="btn" id="btn-filter-transit" type="button" style="color: black;border: 1px solid rgba(0,0,0,.25);background-color: white;">Transit&nbsp;<i class="fas fa-caret-down"></i></button>
                <div id="menu-transit" class="position-absolute" style="display: none;margin-top: 8px;width: 150px;max-height: 300px;background-color: white;border-radius: 4px;border: 1px solid rgba(0,0,0,.25);overflow-y: auto;z-index: 1;">
                    <p class="fw-bold px-2" style="background-color: rgba(0,0,0,.125);">Jumlah Transit</p>
                    <div class="px-2" style="font-size: 14px;">
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="check-transit-1"><label class="form-check-label" for="formCheck-1">Langsung</label></div>
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="check-transit-2"><label class="form-check-label" for="formCheck-1">1 Transit</label></div>
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="check-transit-3"><label class="form-check-label" for="formCheck-1">2+ Transit</label></div>
                    </div>
                </div>
            </div>
            <div id="data-waktu" class="position-relative ms-3"><button class="btn" id="btn-filter-waktu" type="button" style="color: black;border: 1px solid rgba(0,0,0,.25);background-color: white;">Waktu&nbsp;<i class="fas fa-caret-down"></i></button>
                <div id="menu-waktu" class="position-absolute" style="display: none;margin-top: 8px;width: 200px;max-height: 300px;background-color: white;border-radius: 4px;border: 1px solid rgba(0,0,0,.25);overflow-y: auto;z-index: 1;">
                    <p class="fw-bold px-2" style="background-color: rgba(0,0,0,.125);">Waktu Keberangkatan</p>
                    <div class="px-2" style="font-size: 14px;">
                        <div class="form-check d-flex align-items-center mb-0"><input class="form-check-input mt-0" type="radio" id="radio-waktu-1"><label class="form-check-label ms-2" for="formCheck-1">00:00 - 06:00</label></div>
                        <div class="form-check d-flex align-items-center mb-0"><input class="form-check-input mt-0" type="radio" id="radio-waktu-3"><label class="form-check-label ms-2" for="formCheck-1">06:00 - 12:00</label></div>
                        <div class="form-check d-flex align-items-center mb-0"><input class="form-check-input mt-0" type="radio" id="radio-waktu-2"><label class="form-check-label ms-2" for="formCheck-1">12:00 - 18:00</label></div>
                        <div class="form-check d-flex align-items-center mb-0"><input class="form-check-input mt-0" type="radio" id="radio-waktu-1"><label class="form-check-label ms-2" for="formCheck-1">18:00 - 24:00</label></div>
                    </div>
                </div>
            </div>
            <div id="data-maskapai" class="position-relative ms-3"><button class="btn" id="btn-filter-maskapai" type="button" style="color: black;border: 1px solid rgba(0,0,0,.25);background-color: white;">Maskapai&nbsp;<i class="fas fa-caret-down"></i></button>
                <div id="menu-maskapai" class="position-absolute" style="display: none;margin-top: 8px;width: 150px;max-height: 300px;background-color: white;border-radius: 4px;border: 1px solid rgba(0,0,0,.25);overflow-y: auto;z-index: 1;">
                    <p class="fw-bold px-2" style="background-color: rgba(0,0,0,.125);">List Maskapai</p>
                    <div class="px-2" style="font-size: 14px;">
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="check-maskapai-1"><label class="form-check-label" for="formCheck-1">Maskapai A</label></div>
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="check-maskapai-2"><label class="form-check-label" for="formCheck-1">Maskapai B</label></div>
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="check-maskapai-3"><label class="form-check-label" for="formCheck-1">Maskapai C</label></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="list">
        @foreach ($data->offers as $item)
            @foreach ($item->slices[0]->segments as $item2)
                <?php
                    $arriving[$count] = $item2->arriving_at;
                    $departing[$count] = $item2->departing_at;
                    $t1 = strtotime($item2->departing_at);
                    $t2 = strtotime($item2->arriving_at);

                    $temp[$count] = gmdate('H:i', $t2 - $t1);

                    $count +=1;

                ?>
            @endforeach
            @if ($count > 1)
                @if ($item->payment_requirements->requires_instant_payment == true)
                    <div class="card mb-3">
                        <div class="card-body p-0">
                            <div class="data-penerbangan">
                                <div class="row mb-3 pb-0 p-3">
                                    <div class="col-4 d-flex align-items-center"><img src="{{$item->owner->logo_symbol_url}}" style="max-height: 64px;">
                                        <p class="ms-3 fs-4">{{$item->owner->name}}</p>
                                    </div>
                                    <div class="col-4 d-flex align-items-center justify-content-evenly">
                                        <div class="d-flex flex-column align-items-center justify-content-center">
                                            <p>{{gmdate('H:i', strtotime($departing[0]));}}</p><button class="btn btn-secondary btn-sm" type="button" style="padding: 2px 4px;">{{$data->slices[0]->origin->iata_code}}</button>
                                        </div>
                                        <div class="d-flex flex-column align-items-center justify-content-center">
                                            <p>
                                                @for ($i = 0; $i < count($temp)-1; $i++)
                                                    <?php
                                                        $total = gmdate('H:i', strtotime($temp[$i]) + strtotime($temp[$i+1]));
                                                    ?>
                                                @endfor
                                                {{$total}}
                                            </p>
                                            <p>Transit</p>
                                        </div>
                                        <div class="d-flex flex-column align-items-center justify-content-center">
                                            <p>{{gmdate('H:i', strtotime($arriving[1]));}}</p><button class="btn btn-secondary btn-sm" type="button" style="padding: 2px 4px;">{{$data->slices[0]->destination->iata_code}}</button>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <p><span class="fs-4 fw-bold" style="color: #FF9142;">{{$item->total_currency}} {{$item->total_amount}}</span>/org</p>
                                        <button id = "{{$item->id}}" class="btn btn-sm  btn-pilih" type="button" style="background-color: #FF9142;width: 200px;color: white;">Pilih</button>
                                    </div>
                                </div>
                                <button class="btn btn-sm fw-bold btn-detail ms-2" type="button">Detail Penerbangan</button>
                                <hr class="my-0" />
                                <div class="p-3 detail-penerbangan" style="display: none;">
                                    @foreach ($item->slices[0]->segments as $item2)
                                    {{-- @dump($item2) --}}
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="d-flex h-100">
                                                <div class="d-flex flex-column justify-content-between" style="width: calc(100% - 16px);">
                                                    <div class="text-center" style="font-size: 14px;">
                                                        <?php
                                                            $tempdeparting = strtotime($item2->departing_at);
                                                            $depart = date('d M',$tempdeparting);
                                                            $temparriving = strtotime($item2->arriving_at);
                                                            $arrive = date('d M',$temparriving);
                                                            $tempp = gmdate('H:i', $temparriving - $tempdeparting);
                                                        ?>
                                                        <p>{{gmdate('H:i', $tempdeparting)}}</p>
                                                        <p style="color: var(--bs-gray);">{{$depart}}</p>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-center"><i class="fas fa-clock me-1" style="color: #FF9142;"></i>
                                                        <p class="ms-1">{{$tempp}}</p>
                                                    </div>
                                                    <div class="text-center" style="font-size: 14px;">
                                                        <p>{{gmdate('H:i', $temparriving)}}</p>
                                                        <p style="color: var(--bs-gray);">{{$arrive}}</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column align-items-center py-3">
                                                    <div style="width: 16px;height: 16px;border: 1px solid #FF9142;border-radius: 50%;"></div>
                                                    <div style="width: 2px;background-color: #FF9142;height: calc(100% - 32px);"></div>
                                                    <div style="width: 16px;height: 16px;background-color: #FF9142;border-radius: 50%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div>
                                                <p>{{$item2->origin->city_name}} (<span>{{$item2->origin->iata_code}}</span>)</p>
                                                <p style="color: var(--bs-gray);font-size: 14px;">{{$item2->origin->name}}</p>
                                            </div>
                                            <div class="card my-2">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="d-flex"><img class="me-2" src="{{$item->owner->logo_symbol_url}}" style="max-height: 48px;" />
                                                                <div>
                                                                    <p>{{$item2->operating_carrier->name}}</p>
                                                                    <p style="font-size: 14px;">{{$item2->operating_carrier_flight_number}}</p>
                                                                    <p style="font-size: 14px;">{{$cabin}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            {{-- <div class="d-flex" style="font-size: 14px;color: var(--bs-gray);"><i class="fas fa-suitcase me-2 text-center" style="font-size: 20px;width: 20px;color: #FF9142;"></i>
                                                                <div>
                                                                    <p>Bagasi 20 kg</p>
                                                                    <p>Bagasi kabin 7 kg</p>
                                                                </div>
                                                            </div> --}}
                                                            <div class="d-flex" style="font-size: 14px;color: var(--bs-gray);"><i class="fas fa-utensils me-2 text-center" style="font-size: 20px;width: 20px;color: #FF9142;"></i>
                                                                <p>Makan di pesawat</p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="d-flex" style="font-size: 14px;color: var(--bs-gray);"><i class="fas fa-info-circle me-2 text-center" style="font-size: 20px;width: 20px;color: #FF9142;"></i>
                                                                <div>
                                                                    <p><span class="fw-bold">Pesawat</span> {{$item2->aircraft->name}}</p>
                                                                    {{-- <p><span class="fw-bold">Tata kursi</span> 3-3</p>
                                                                    <p><span class="fw-bold">Jarak antar kursi</span> 29 inch</p> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <p>{{$item2->destination->city_name}} (<span>{{$item2->destination->iata_code}}</span>)</p>
                                                <p style="color: var(--bs-gray);font-size: 14px;">{{$item2->destination->name}}</p>
                                            </div>
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                @if ($item->payment_requirements->requires_instant_payment == true)
                    <div class="card mb-3">
                        <div class="card-body p-0">
                            <div class="data-penerbangan">
                                <div class="row mb-3 pb-0 p-3">
                                    <div class="col-4 d-flex align-items-center"><img src="{{$item->owner->logo_symbol_url}}" style="max-height: 64px;">
                                        <p class="ms-3 fs-4">{{$item->owner->name}}</p>
                                    </div>
                                    <div class="col-4 d-flex align-items-center justify-content-evenly">
                                        <div class="d-flex flex-column align-items-center justify-content-center">
                                            <p>{{gmdate('H:i', strtotime($departing[0]));}}</p><button class="btn btn-secondary btn-sm" type="button" style="padding: 2px 4px;">{{$data->slices[0]->origin->iata_code}}</button>
                                        </div>
                                        <div class="d-flex flex-column align-items-center justify-content-center">
                                            <p>{{gmdate('H:i', strtotime($temp[0]))}}</p>
                                            <p>Langsung</p>
                                        </div>
                                        <div class="d-flex flex-column align-items-center justify-content-center">
                                            <p>{{gmdate('H:i', strtotime($arriving[0]));}}</p><button class="btn btn-secondary btn-sm" type="button" style="padding: 2px 4px;">{{$data->slices[0]->destination->iata_code}}</button>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                            <p><span class="fs-4 fw-bold" style="color: #FF9142;">{{$item->total_currency}} {{$item->total_amount}}</span>/org</p>
                                            <button id = "{{$item->id}}" class="btn btn-sm  btn-pilih" type="button" style="background-color: #FF9142;width: 200px;color: white;">Pilih</button>
                                    </div>
                                </div>
                                <button class="btn btn-sm fw-bold btn-detail ms-2" type="button">Detail Penerbangan</button>
                                <hr class="my-0" />
                                <div class="p-3 detail-penerbangan" style="display: none;">
                                    @foreach ($item->slices[0]->segments as $item2)
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="d-flex h-100">
                                                <div class="d-flex flex-column justify-content-between" style="width: calc(100% - 16px);">
                                                    <div class="text-center" style="font-size: 14px;">
                                                        <?php
                                                            $tempdeparting = strtotime($item2->departing_at);
                                                            $depart = date('d M',$tempdeparting);
                                                            $temparriving = strtotime($item2->arriving_at);
                                                            $arrive = date('d M',$temparriving);
                                                            $tempp = gmdate('H:i', $temparriving - $tempdeparting);
                                                        ?>
                                                        <p>{{gmdate('H:i', $tempdeparting)}}</p>
                                                        <p style="color: var(--bs-gray);">{{$depart}}</p>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-center"><i class="fas fa-clock me-1" style="color: #FF9142;"></i>
                                                        <p class="ms-1">{{$tempp}}</p>
                                                    </div>
                                                    <div class="text-center" style="font-size: 14px;">
                                                        <p>{{gmdate('H:i', $temparriving)}}</p>
                                                        <p style="color: var(--bs-gray);">{{$arrive}}</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column align-items-center py-3">
                                                    <div style="width: 16px;height: 16px;border: 1px solid #FF9142;border-radius: 50%;"></div>
                                                    <div style="width: 2px;background-color: #FF9142;height: calc(100% - 32px);"></div>
                                                    <div style="width: 16px;height: 16px;background-color: #FF9142;border-radius: 50%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div>
                                                <p>{{$item2->origin->city_name}} (<span>{{$item2->origin->iata_code}}</span>)</p>
                                                <p style="color: var(--bs-gray);font-size: 14px;">{{$item2->origin->name}}</p>
                                            </div>
                                            <div class="card my-2">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="d-flex"><img class="me-2" src="{{$item->owner->logo_symbol_url}}" style="max-height: 48px;" />
                                                                <div>
                                                                    <p>{{$item2->operating_carrier->name}}</p>
                                                                    <p style="font-size: 14px;">{{$item2->operating_carrier_flight_number}}</p>
                                                                    <p style="font-size: 14px;">{{$cabin}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            {{-- <div class="d-flex" style="font-size: 14px;color: var(--bs-gray);"><i class="fas fa-suitcase me-2 text-center" style="font-size: 20px;width: 20px;color: #FF9142;"></i>
                                                                <div>
                                                                    <p>Bagasi 20 kg</p>
                                                                    <p>Bagasi kabin 7 kg</p>
                                                                </div>
                                                            </div> --}}
                                                            <div class="d-flex" style="font-size: 14px;color: var(--bs-gray);"><i class="fas fa-utensils me-2 text-center" style="font-size: 20px;width: 20px;color: #FF9142;"></i>
                                                                <p>Makan di pesawat</p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="d-flex" style="font-size: 14px;color: var(--bs-gray);"><i class="fas fa-info-circle me-2 text-center" style="font-size: 20px;width: 20px;color: #FF9142;"></i>
                                                                <div>
                                                                    <p><span class="fw-bold">Pesawat</span> {{$item2->aircraft->name}}</p>
                                                                    {{-- <p><span class="fw-bold">Tata kursi</span> 3-3</p>
                                                                    <p><span class="fw-bold">Jarak antar kursi</span> 29 inch</p> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <p>{{$item2->destination->city_name}} (<span>{{$item2->destination->iata_code}}</span>)</p>
                                                <p style="color: var(--bs-gray);font-size: 14px;">{{$item2->destination->name}}</p>
                                            </div>
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            <?php $count = 0;?>
        @endforeach
    </div>
</div>
<div class="modal fade" role="dialog" tabindex="-1" id="modal-pencarian">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pencarian Tiket</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div id="data-kota-asal" class="position-relative">
                                <p>Kota Asal</p>
                                {{-- <input class="form-control" type="text" id="input-kota-asal"> --}}
                                <select class=" form-select" name = "departure">
                                    @foreach ($airport as $item)
                                    <option value="{{$item->iata_code}}" data-tokens="{{$item->name}} - {{$item->city_name}}">{{$item->name}} - {{$item->city_name}}</option>
                                    @endforeach
                                </select>
                                {{-- <div id="menu-kota-asal" class="position-absolute" style="display: none;margin-top: 8px;width: 200px;max-height: 300px;background-color: white;border-radius: 4px;border: 1px solid rgba(0,0,0,.25);overflow-y: auto;">
                                    <div style="background-color: rgba(0,0,0,.125);border-top-left-radius: 4px;border-top-right-radius: 4px;">
                                        <p class="px-2">Data Kota Asal</p>
                                    </div>
                                    <div class="pb-1">
                                        <hr class="my-0">
                                        <p class="mx-2" style="font-size: 14px;">Jakarta, Indonesia</p>
                                        <p class="mx-2" style="font-size: 12px;">JKTA - All Airports in Jakarta</p>
                                    </div>
                                    <div class="pb-1">
                                        <hr class="my-0">
                                        <p class="mx-2" style="font-size: 14px;">Jakarta, Indonesia</p>
                                        <p class="mx-2" style="font-size: 12px;">JKTA - All Airports in Jakarta</p>
                                    </div>
                                    <div class="pb-1">
                                        <hr class="my-0">
                                        <p class="mx-2" style="font-size: 14px;">Jakarta, Indonesia</p>
                                        <p class="mx-2" style="font-size: 12px;">JKTA - All Airports in Jakarta</p>
                                    </div>
                                    <div class="pb-1">
                                        <hr class="my-0">
                                        <p class="mx-2" style="font-size: 14px;">Jakarta, Indonesia</p>
                                        <p class="mx-2" style="font-size: 12px;">JKTA - All Airports in Jakarta</p>
                                    </div>
                                    <div class="pb-1">
                                        <hr class="my-0">
                                        <p class="mx-2" style="font-size: 14px;">Jakarta, Indonesia</p>
                                        <p class="mx-2" style="font-size: 12px;">JKTA - All Airports in Jakarta</p>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div id="data-kota-tujuan" class="position-relative">
                                <p>Kota Tujuan</p>
                                <select class=" form-select" name = "departure">
                                    @foreach ($airport as $item)
                                    <option value="{{$item->iata_code}}" data-tokens="{{$item->name}} - {{$item->city_name}}">{{$item->name}} - {{$item->city_name}}</option>
                                    @endforeach
                                </select>
                                {{-- <input class="form-control" type="text" id="input-kota-tujuan">
                                <div id="menu-kota-tujuan" class="position-absolute" style="display: none;margin-top: 8px;width: 200px;max-height: 300px;background-color: white;border-radius: 4px;border: 1px solid rgba(0,0,0,.25);overflow-y: auto;">
                                    <div style="background-color: rgba(0,0,0,.125);border-top-left-radius: 4px;border-top-right-radius: 4px;">
                                        <p class="px-2">Data Kota Tujuan</p>
                                    </div>
                                    <div class="pb-1">
                                        <hr class="my-0">
                                        <p class="mx-2" style="font-size: 14px;">Jakarta, Indonesia</p>
                                        <p class="mx-2" style="font-size: 12px;">JKTA - All Airports in Jakarta</p>
                                    </div>
                                    <div class="pb-1">
                                        <hr class="my-0">
                                        <p class="mx-2" style="font-size: 14px;">Jakarta, Indonesia</p>
                                        <p class="mx-2" style="font-size: 12px;">JKTA - All Airports in Jakarta</p>
                                    </div>
                                    <div class="pb-1">
                                        <hr class="my-0">
                                        <p class="mx-2" style="font-size: 14px;">Jakarta, Indonesia</p>
                                        <p class="mx-2" style="font-size: 12px;">JKTA - All Airports in Jakarta</p>
                                    </div>
                                    <div class="pb-1">
                                        <hr class="my-0">
                                        <p class="mx-2" style="font-size: 14px;">Jakarta, Indonesia</p>
                                        <p class="mx-2" style="font-size: 12px;">JKTA - All Airports in Jakarta</p>
                                    </div>
                                    <div class="pb-1">
                                        <hr class="my-0">
                                        <p class="mx-2" style="font-size: 14px;">surabaya, Indonesia</p>
                                        <p class="mx-2" style="font-size: 12px;">JKTA - All Airports in Jakarta</p>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <p>Jumlah Penumpang</p><input class="form-control pass_count" type="text" value = "{{$pass_count}}">
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <p>Tanggal Pergi</p><input class="form-control" type="date" value = "{{$depart_date}}">
                        </div>

                        <div class="col-12 col-sm-6 col-lg-3">
                            <p>Tanggal Pulang</p><input class="form-control" type="date">
                        </div>
                        <div class="col-12 col-lg-6">
                            <p>Kelas Penerbangan</p>
                            <select class="form-select" name = "class">
                                <option value="economy" selected="">Economy</option>
                                <option value="premium_economy">Premium Economy</option>
                                <option value="business">Business Class</option>
                                <option value="first">First Class</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-primary" type="submit"><i class="fas fa-search"></i>&nbsp;Save</button></div>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('js/user/tiket.js')}}"></script>
@endsection
