@extends('layout.admins')

@section('content')
@include('includes.datatables')

<div class="container">
    <div class="my-5" style="font-size: 1.25rem;"><i class="fas fa-arrow-left color-main me-4"></i><a class="me-3" href="#">Back Office</a><i class="fas fa-chevron-right me-3"></i><a class="me-3" href="#">History</a><i class="fas fa-chevron-right me-3"></i><a class="me-3" href="#">Booking</a></div>
    <div class="card mb-5">
        <div class="card-body">
            <header>
                <h1>Flight</h1>
            </header>
            <hr class="fill-width" />
            <div class="list-history">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <p class="fw-bold me-2">Flight</p><span class="trans-date me-3">29 Agu 2022</span><button class="btn btn-sm fw-bold py-0" type="button" style="color: rgba(25,135,84);background-color: rgba(25,135,84,.33);">Paid</button><button class="btn btn-sm fw-bold py-0" type="button" style="color: rgba(217,164,6);background-color: rgba(217,164,6,.33);">Unpaid</button><button class="btn btn-sm fw-bold py-0" type="button" style="color: rgba(225,83,97);background-color: rgba(225,83,97,.33);">Expired</button><span class="ms-3 text-secondary">LISFGH2021101900001</span>
                        </div>
                        <div class="row">
                            <div class="col-4 d-flex align-items-center"><img src="bruh.jpg" style="max-height: 64px;" />
                                <p class="ms-3 fs-4">Nama Maskapai</p>
                            </div>
                            <div class="col-4 d-flex align-items-center justify-content-evenly">
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <p>19:15</p><button class="btn btn-secondary btn-sm" type="button" style="padding: 2px 4px;">Kode</button>
                                </div>
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <p>Durasi Penerbangan</p>
                                    <p>Langsung / n Transit</p>
                                </div>
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <p>19:15</p><button class="btn btn-secondary btn-sm" type="button" style="padding: 2px 4px;">Kode</button>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="h-100 d-flex justify-content-end align-items-end" style="border-left: 1px solid #6c757d;"><button class="btn me-2 fw-bold btn-show-detail" type="button" style="color: rgb(75, 0, 118);">Lihat Detail</button>
                                    <div class="text-center">
                                        <p>Total Biaya<br /></p><button class="btn btn-primary" type="button" style="pointer-events: none;"><strong>800.000</strong><br /></button>
                                    </div>
                                </div>
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
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <p class="fw-bold me-2">Flight</p><span class="trans-date me-3">29 Agu 2022</span><button class="btn btn-sm fw-bold py-0" type="button" style="color: rgba(25,135,84);background-color: rgba(25,135,84,.33);">Paid</button><button class="btn btn-sm fw-bold py-0" type="button" style="color: rgba(217,164,6);background-color: rgba(217,164,6,.33);">Unpaid</button><button class="btn btn-sm fw-bold py-0" type="button" style="color: rgba(225,83,97);background-color: rgba(225,83,97,.33);">Expired</button><span class="ms-3 text-secondary">LISFGH2021101900001</span>
                        </div>
                        <div class="row">
                            <div class="col-4 d-flex align-items-center">
                                <p class="ms-3 fs-4 fw-bold">Nama Tour</p>
                            </div>
                            <div class="col-4 d-flex align-items-center justify-content-evenly">
                                <div class="text-center"><i class="fas fa-sun" style="font-size: 1.25rem;"></i>
                                    <p>4 hari</p>
                                    <p class="text-secondary">21-06-2022</p>
                                </div>
                                <div class="text-center"><i class="fas fa-moon"></i>
                                    <p>3 Malam</p>
                                    <p class="text-secondary">25-06-2022</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="h-100 d-flex justify-content-end align-items-end" style="border-left: 1px solid #6c757d;">
                                    <div class="text-center">
                                        <p>Total Biaya<br /></p><button class="btn btn-primary" type="button" style="pointer-events: none;"><strong>800.000</strong><br /></button>
                                    </div>
                                </div>
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
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/backoffice/history.js')}}"></script>
@endsection
