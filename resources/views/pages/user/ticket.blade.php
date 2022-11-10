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
<?php $count = 0; $count2 = 0 ?>
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

        <div id="filter" class="px-3 mb-4 position-relative">
            <button class="btn btn-primary btn-filter" type="button">Filter<i class="fas fa-caret-down ms-2"></i></button>
            <div id="menu-filter"  class="position-absolute mt-2 card card-body" style="width: 526px;background-color: white;z-index: 1; display: none; box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;"  >
                <form action="/Flight/search" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <h4>Sort By :</h4>
                            <div style="overflow-y: auto;">
                                @if ($sort == "lowest-price")
                                <div class="form-check"><input type="radio" class="form-check-input" name = "sort" id="formCheck-lowest-price" value = "lowest-price" checked /><label class="form-check-label" for="formCheck-lowest-price">Lowest Price</label></div>
                                @else
                                <div class="form-check"><input type="radio" class="form-check-input" name = "sort" id="formCheck-lowest-price" value = "lowest-price" /><label class="form-check-label" for="formCheck-lowest-price">Lowest Price</label></div>
                                @endif
                                @if ($sort == "depart-earliest-departure")
                                <div class="form-check"><input type="radio" class="form-check-input" name = "sort" id="formCheck-earliest-departure" value = "depart-earliest-departure" checked /><label class="form-check-label" for="formCheck-earliest-departure">Depart Earliest Departure</label></div>
                                @else
                                <div class="form-check"><input type="radio" class="form-check-input" name = "sort" id="formCheck-earliest-departure" value = "depart-earliest-departure" /><label class="form-check-label" for="formCheck-earliest-departure">Depart Earliest Departure</label></div>
                                @endif
                                @if ($sort == "depart-lastest-departure")
                                <div class="form-check"><input type="radio" class="form-check-input" name = "sort" id="formCheck-lastest-departure" value = "depart-lastest-departure" checked /><label class="form-check-label" for="formCheck-lastest-departure">Depart Lastest Departure</label></div>
                                @else
                                <div class="form-check"><input type="radio" class="form-check-input" name = "sort" id="formCheck-lastest-departure" value = "depart-lastest-departure" /><label class="form-check-label" for="formCheck-lastest-departure">Depart Lastest Departure</label></div>
                                @endif
                                @if ($sort == "return-earliest-departure")
                                <div class="form-check"><input type="radio" class="form-check-input" name = "sort" id="formCheck-earliest-departure" value = "return-earliest-departure" checked/><label class="form-check-label" for="formCheck-earliest-departure">Return Earliest Departure</label></div>
                                @else
                                <div class="form-check"><input type="radio" class="form-check-input" name = "sort" id="formCheck-earliest-departure" value = "return-earliest-departure" /><label class="form-check-label" for="formCheck-earliest-departure">Return Earliest Departure</label></div>
                                @endif
                                @if ($sort == "return-lastest-departure")
                                <div class="form-check"><input type="radio" class="form-check-input" name = "sort" id="formCheck-lastest-departure" value = "return-lastest-departure" checked /><label class="form-check-label" for="formCheck-lastest-departure">Return Lastest Departure</label></div>
                                @else
                                <div class="form-check"><input type="radio" class="form-check-input" name = "sort" id="formCheck-lastest-departure" value = "return-lastest-departure" /><label class="form-check-label" for="formCheck-lastest-departure">Return Lastest Departure</label></div>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <h4>Waktu :</h4>
                            <div>
                                @if ($waktu == "00:00:00-05:59:00")
                                <div class="form-check"><input type="radio" class="form-check-input" name = "waktu" id="formCheck-early-morning" value = "00:00:00-05:59:00" checked /><label class="form-check-label" for="formCheck-early-morning">Early Morning<br />(00.00 - 05.59)</label></div>
                                @else
                                <div class="form-check"><input type="radio" class="form-check-input" name = "waktu" id="formCheck-early-morning" value = "00:00:00-05:59:00" /><label class="form-check-label" for="formCheck-early-morning">Early Morning<br />(00.00 - 05.59)</label></div>
                                @endif
                                @if ($waktu == "06:00:00-11:59:00")
                                <div class="form-check"><input type="radio" class="form-check-input" name = "waktu" id="formCheck-morning" value = "06:00:00-11:59:00" checked/><label class="form-check-label" for="formCheck-morning">Morning<br />(06.00 - 11.59)</label></div>
                                @else
                                <div class="form-check"><input type="radio" class="form-check-input" name = "waktu" id="formCheck-morning" value = "06:00:00-11:59:00" /><label class="form-check-label" for="formCheck-morning">Morning<br />(06.00 - 11.59)</label></div>
                                @endif
                                @if ($waktu == "12:00:00-17:59:00")
                                <div class="form-check"><input type="radio" class="form-check-input" name = "waktu" id="formCheck-afternoon" value = "12:00:00-17:59:00" checked /><label class="form-check-label" for="formCheck-afternoon">Afternoon <br />(12.00 - 17.59)</label></div>
                                @else
                                <div class="form-check"><input type="radio" class="form-check-input" name = "waktu" id="formCheck-afternoon" value = "12:00:00-17:59:00" /><label class="form-check-label" for="formCheck-afternoon">Afternoon <br />(12.00 - 17.59)</label></div>
                                @endif
                                @if ($waktu == "18:00:00-23:59:00")
                                <div class="form-check"><input type="radio" class="form-check-input" name = "waktu" id="formCheck-evening" value = "18:00:00-23:59:00" checked /><label class="form-check-label" for="formCheck-evening">Evening<br />(18.00 - 23.59)</label></div>
                                @else
                                <div class="form-check"><input type="radio" class="form-check-input" name = "waktu" id="formCheck-evening" value = "18:00:00-23:59:00" /><label class="form-check-label" for="formCheck-evening">Evening<br />(18.00 - 23.59)</label></div>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <h4>Transit :</h4>
                            <div>
                                @if ($transit == "")
                                    <div class="form-check"><input type="checkbox" class="form-check-input" name = "transit[]" id="formCheck-direct" value = "0" /><label class="form-check-label" for="formCheck-direct">Direct</label></div>
                                    <div class="form-check"><input type="checkbox" class="form-check-input" name = "transit[]" id="formCheck-transit-1" value = "1" /><label class="form-check-label" for="formCheck-transit-1">1 Transit</label></div>
                                    <div class="form-check"><input type="checkbox" class="form-check-input" name = "transit[]" id="formCheck-transit-2+" value = "2" /><label class="form-check-label" for="formCheck-transit-2+">2+ Transit</label></div>
                                @else
                                    @if (in_array("0",$transit))
                                        <div class="form-check"><input type="checkbox" class="form-check-input" name = "transit[]" id="formCheck-direct" value = "0" checked/><label class="form-check-label" for="formCheck-direct">Direct</label></div>
                                    @else
                                        <div class="form-check"><input type="checkbox" class="form-check-input" name = "transit[]" id="formCheck-direct" value = "0" /><label class="form-check-label" for="formCheck-direct">Direct</label></div>
                                    @endif
                                    @if (in_array("1",$transit))
                                        <div class="form-check"><input type="checkbox" class="form-check-input" name = "transit[]" id="formCheck-transit-1" value = "1" checked /><label class="form-check-label" for="formCheck-transit-1">1 Transit</label></div>
                                    @else
                                        <div class="form-check"><input type="checkbox" class="form-check-input" name = "transit[]" id="formCheck-transit-1" value = "1" /><label class="form-check-label" for="formCheck-transit-1">1 Transit</label></div>
                                    @endif
                                    @if (in_array("2",$transit))
                                        <div class="form-check"><input type="checkbox" class="form-check-input" name = "transit[]" id="formCheck-transit-2+" value = "2" checked/><label class="form-check-label" for="formCheck-transit-2+">2+ Transit</label></div>
                                    @else
                                        <div class="form-check"><input type="checkbox" class="form-check-input" name = "transit[]" id="formCheck-transit-2+" value = "2" /><label class="form-check-label" for="formCheck-transit-2+">2+ Transit</label></div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="departure" value = "{{$data->slices[0]->origin->iata_code}}">
                    <input type="hidden" name="destination" value = "{{$data->slices[0]->destination->iata_code}}">
                    <input type="hidden" name="depart" value = "{{$depart_date}}">
                    <input type="hidden" name="return" value = "{{$return_date}}">
                    <input type="hidden" name="passanger" value = "{{$pass_count}}">
                    <input type="hidden" name="class" value = "{{$cabin}}">
                    <input type="hidden" name="type" value = "{{$type}}">
                    <div class="text-end">
                        <button class="btn btn-primary" id = "reset-filter" type="button">Reset</button>
                        <button class="btn btn-primary" type="submit">Apply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="list">
        @foreach ($offers as $item)
                @if ($item->payment_requirements->requires_instant_payment == true)
                    <div class="card mb-3">
                        <div class="card-body p-0">
                            <div class="data-penerbangan">
                                <div class="row mb-3 pb-0 p-3">
                                    <div class="col-4 d-flex align-items-center"><img src="{{$item->owner->logo_symbol_url}}" style="max-height: 64px;">
                                        <p class="ms-3 fs-4">{{$item->owner->name}}</p>
                                    </div>
                                    <div class="col-5 d-flex flex-column align-items-center justify-content-evenly">
                                        @foreach ($item->slices as $slicess)
                                            @foreach ($slicess->segments as $item2)
                                                <?php
                                                    $arriving[$count] = $item2->arriving_at;
                                                    $departing[$count] = $item2->departing_at;
                                                    $t1 = strtotime($item2->departing_at);
                                                    $t2 = strtotime($item2->arriving_at);

                                                    $temp[$count] = gmdate('H:i', $t2 - $t1);

                                                    $count +=1;

                                                ?>
                                            @endforeach
                                            <div class="d-flex w-100 justify-content-center mb-3">
                                                @if($loop->index == 0)
                                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                                @else
                                                    <div class="d-flex flex-column align-items-center justify-content-center border-left border-secondary">
                                                @endif
                                                    <p>{{gmdate('H:i', strtotime($departing[0]));}}</p><button class="btn btn-secondary btn-sm" type="button" style="padding: 2px 4px;">{{$data->slices[0]->origin->iata_code}}</button>
                                                </div>
                                                <div class="d-flex flex-column align-items-center justify-content-center mx-5">
                                                    <p>{{gmdate('H:i', strtotime($temp[0]))}}</p>
                                                    @if ($count>1)
                                                    <p>Transit</p>
                                                    @else
                                                    <p>Direct</p>
                                                    @endif
                                                </div>
                                                <div class="d-flex flex-column align-items-center justify-content-center">
                                                    <p>{{gmdate('H:i', strtotime($arriving[0]));}}</p><button class="btn btn-secondary btn-sm" type="button" style="padding: 2px 4px;">{{$data->slices[0]->destination->iata_code}}</button>
                                                </div>
                                            </div>
                                            <?php
                                                $total = [];
                                                $arriving = [];
                                                $departing = [];
                                                $t1 = "";
                                                $t2 = "";
                                                $count = 0;
                                            ?>
                                        @endforeach
                                    </div>
                                    <div class="col-3 d-flex flex-column justify-content-center align-items-end">
                                        <p>{{$item->total_currency}}<span class="fs-4 fw-bold thousand-separator" style="color: #FF9142;">{{$item->total_amount}}</span>/org</p>
                                        <button id = "{{$item->id}}" class="btn btn-sm  btn-pilih" type="button" style="background-color: #FF9142;width: 200px;color: white;">Pilih</button>
                                    </div>
                                </div>
                                <button class="btn btn-sm fw-bold btn-detail ms-2" type="button">Detail Penerbangan</button>
                                <hr class="my-0" />
                                <div class="p-3 detail-penerbangan" style="display: none;">
                                    @foreach ($item->slices as $slicess)
                                    <?php $tempp = "" ?>
                                    @if($loop->index != 0)
                                        <hr>
                                    @endif
                                        @foreach ($slicess->segments as $item2)
                                        <div class="row pb-2 mb-2">
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
                                                                <div class="d-flex" style="font-size: 14px;color: var(--bs-gray);"><i class="fas fa-utensils me-2 text-center" style="font-size: 20px;width: 20px;color: #FF9142;"></i>
                                                                    <p>Makan di pesawat</p>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="d-flex" style="font-size: 14px;color: var(--bs-gray);"><i class="fas fa-info-circle me-2 text-center" style="font-size: 20px;width: 20px;color: #FF9142;"></i>
                                                                    <div>
                                                                        <p><span class="fw-bold">Pesawat</span> {{$item2->aircraft->name}}</p>
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
                                    <?php $tempp = "" ?>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            <?php $count = 0; $count2 = 0;?>
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
                                <select class=" form-select" name = "departure">
                                    @foreach ($airport as $item)
                                    <option value="{{$item->iata_code}}" data-tokens="{{$item->name}} - {{$item->city_name}}">{{$item->name}} - {{$item->city_name}}</option>
                                    @endforeach
                                </select>
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
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <p>Jumlah Penumpang</p><input class="form-control pass_count" type="text" value = "{{$pass_count}}">
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <p>Tanggal Pergi</p><input class="form-control" type="date" value = "{{$depart_date}}">
                        </div>

                        <div class="col-12 col-sm-6 col-lg-3">
                            <p>Tanggal Pulang</p><input class="form-control" type="date" value = "{{$return_date}}">
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
