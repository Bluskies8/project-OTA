@extends('layout.users')

@section('content')
@include('includes.datatables')
<div class="container mt-5">
    <div class="card mb-5">
        <div class="card-body">
            <header>
                <h1>Flight</h1>
            </header>
            <hr class="fill-width" />
            <div class="list-history">
                <div class="card">
                    @foreach ($flight as $item)
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <p class="fw-bold me-2">Flight</p><span class="trans-date me-3">{{$item->trans_date}}</span>
                            @if ($item->payment_status == 0)
                                <button class="btn btn-sm fw-bold py-0" type="button" style="color: rgba(217,164,6);background-color: rgba(217,164,6,.33);">UnderPaid</button>
                            @elseif($item->payment_status == 1)
                                <button class="btn btn-sm fw-bold py-0" type="button" style="color: rgba(25,135,84);background-color: rgba(25,135,84,.33);">Paid</button>
                            @elseif($item->payment_status == 2)
                                <button class="btn btn-sm fw-bold py-0" type="button" style="color: rgba(225,83,97);background-color: rgba(225,83,97,.33);">Expired</button>
                            @endif
                            <span class="ms-3 text-secondary">{{$item->invoice}}</span>
                        </div>
                        <div class="row">
                            <div class="col-4 d-flex align-items-center"><img src="{{$item->detail->owner->logo_symbol_url}}" style="max-height: 64px;">
                                <p class="ms-3 fs-4">{{$item->detail->owner->name}}</p>
                            </div>
                            <div class="col-5 d-flex flex-column align-items-center justify-content-evenly">
                                @foreach ($item->detail=>slices as $slicess)
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
                        <div class="container-detail" style="display: none;">
                            <hr class="fill-width" />
                            <div class="row">
                                <div class="col-2">
                                    <div class="d-flex h-100">
                                        <div class="d-flex flex-column justify-content-between" style="width: calc(100% - 16px);">
                                            <div class="text-center" style="font-size: 14px;">
                                                <p>18:50</p>
                                                <p style="color: var(--bs-gray);">28 Sep</p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center"><i class="fas fa-clock me-1" style="color: rgb(75, 0, 118);"></i>
                                                <p class="ms-1">1j 25m</p>
                                            </div>
                                            <div class="text-center" style="font-size: 14px;">
                                                <p>18:50</p>
                                                <p style="color: var(--bs-gray);">28 Sep</p>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column align-items-center py-3">
                                            <div style="width: 16px;height: 16px;border: 1px solid rgb(75, 0, 118);border-radius: 50%;"></div>
                                            <div style="width: 2px;background-color: rgb(75, 0, 118);height: calc(100% - 32px);"></div>
                                            <div style="width: 16px;height: 16px;background-color: rgb(75, 0, 118);border-radius: 50%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div>
                                        <p>Jakarta (<span>kode</span>)</p>
                                        <p style="color: var(--bs-gray);font-size: 14px;">Nama Airport</p>
                                    </div>
                                    <div class="card my-2">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="d-flex"><img class="me-2" src="bruh.jpg" style="max-height: 48px;" />
                                                        <div>
                                                            <p>Nama Maskapai</p>
                                                            <p style="font-size: 14px;">Kelas Pesawat</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="d-flex" style="font-size: 14px;color: var(--bs-gray);"><i class="fas fa-info-circle me-2 text-center" style="font-size: 20px;width: 20px;color: rgb(75, 0, 118);"></i>
                                                        <div>
                                                            <p><span class="fw-bold">Pesawat</span> Airbus 320</p>
                                                            <p><span class="fw-bold">Kode Pesawat</span> Kode</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <p>Surabaya (<span>kode</span>)</p>
                                        <p style="color: var(--bs-gray);font-size: 14px;">Nama Airport</p>
                                    </div>
                                </div>
                                <div class="col"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <header>
                <h1>Tour</h1>
            </header>
            <hr class="fill-width" />
            <div class="list-history">
                <div class="card">
                    @foreach ($tour as $item)
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <p class="fw-bold me-2">Tour</p>
                                <span class="trans-date me-3">{{$item->trans_date}}</span>
                                @if ($item->payment_status == 0)
                                <button class="btn btn-sm fw-bold py-0" type="button" style="color: rgba(217,164,6);background-color: rgba(217,164,6,.33);">UnderPaid</button>
                                @elseif($item->payment_status == 1)
                                <button class="btn btn-sm fw-bold py-0" type="button" style="color: rgba(25,135,84);background-color: rgba(25,135,84,.33);">Paid</button>
                                @elseif($item->payment_status == 2)
                                <button class="btn btn-sm fw-bold py-0" type="button" style="color: rgba(225,83,97);background-color: rgba(225,83,97,.33);">Expired</button>
                                @endif
                                <span class="ms-3 text-secondary">{{$item->bookingCode}}</span>
                            </div>
                            <div class="row">
                                <div class="col-4 d-flex align-items-center">
                                    <p class="ms-3 fs-4 fw-bold">{{$item->tour->name}}</p>
                                </div>
                                <div class="col-4 d-flex align-items-center justify-content-evenly">
                                    <div class="text-center"><i class="fas fa-sun" style="font-size: 1.25rem;"></i>
                                        <p>{{$item->tour->days_count}} hari</p>
                                        <p class="text-secondary">21-06-2022</p>
                                    </div>
                                    <div class="text-center"><i class="fas fa-moon"></i>
                                        <p>{{$item->tour->nights_count}} Malam</p>
                                        <p class="text-secondary">25-06-2022</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="h-100 d-flex justify-content-end align-items-end" style="border-left: 1px solid #6c757d;">
                                        <div class="text-center">
                                            <p>Total Biaya<br /></p><button class="btn btn-primary" type="button" style="pointer-events: none;"><strong class = "thousand-separator">{{$item->biaya}}</strong><br /></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/backoffice/history.js')}}"></script>
@endsection
