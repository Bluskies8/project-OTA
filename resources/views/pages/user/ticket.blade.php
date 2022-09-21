@extends('layouts.users')

@section('content')
<div class="container" style="margin-top: 100px;padding-bottom: 2rem;">
    <div class="card mb-4" id="pencarian" style="background-color: inherit;">
        <div class="card-body p-0 d-flex" style="border-top-left-radius: inherit;border-bottom-left-radius: inherit;">
            <div class="w-75 p-3" style="background-color: white;border-top-right-radius: 75px;border-bottom-right-radius: 75px;border-top-left-radius: inherit;border-bottom-left-radius: inherit;">
                <p class="fw-bold">Jakarta (JKTA)<i class="fas fa-long-arrow-alt-right mx-2"></i>&nbsp;Surabaya(SUB)</p>
                <p>Hari, Tanggal Bulan Tahun<i class="fas fa-minus mx-2 fa-rotate-90"></i>&nbsp;Jumlah Penumpang&nbsp;<i class="fas fa-minus mx-2 fa-rotate-90"></i>&nbsp;Kelas Penerbangan</p>
            </div>
            <div class="w-25 p-3 d-flex align-items-center justify-content-end"><button class="btn btn-primary" id="btn-pencarian" type="button">&nbsp;<i class="fas fa-search"></i>&nbsp;Ganti Pencarian</button></div>
        </div>
    </div>
    <div id="filter" class="px-3 d-flex align-items-center mb-4">
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
    <div id="list" style="height: 75vh;overflow-y: auto;">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-4 d-flex align-items-center"><img src="../assets/img/bruh.jpg" style="max-height: 64px;">
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
                    <div class="col-4 text-end">
                        <p><span class="fs-4 fw-bold" style="color: #FF9142;">800.000</span>/org</p><button class="btn btn-sm" type="button" style="background-color: #FF9142;width: 200px;color: white;">Pilih</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-4 d-flex align-items-center"><img src="../assets/img/bruh.jpg" style="max-height: 64px;">
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
                    <div class="col-4 text-end">
                        <p><span class="fs-4 fw-bold" style="color: #FF9142;">800.000</span>/org</p><button class="btn btn-sm" type="button" style="background-color: #FF9142;width: 200px;color: white;">Pilih</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-4 d-flex align-items-center"><img src="../assets/img/bruh.jpg" style="max-height: 64px;">
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
                    <div class="col-4 text-end">
                        <p><span class="fs-4 fw-bold" style="color: #FF9142;">800.000</span>/org</p><button class="btn btn-sm" type="button" style="background-color: #FF9142;width: 200px;color: white;">Pilih</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-4 d-flex align-items-center"><img src="../assets/img/bruh.jpg" style="max-height: 64px;">
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
                    <div class="col-4 text-end">
                        <p><span class="fs-4 fw-bold" style="color: #FF9142;">800.000</span>/org</p><button class="btn btn-sm" type="button" style="background-color: #FF9142;width: 200px;color: white;">Pilih</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-4 d-flex align-items-center"><img src="../assets/img/bruh.jpg" style="max-height: 64px;">
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
                    <div class="col-4 text-end">
                        <p><span class="fs-4 fw-bold" style="color: #FF9142;">800.000</span>/org</p><button class="btn btn-sm" type="button" style="background-color: #FF9142;width: 200px;color: white;">Pilih</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-4 d-flex align-items-center"><img src="../assets/img/bruh.jpg" style="max-height: 64px;">
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
                    <div class="col-4 text-end">
                        <p><span class="fs-4 fw-bold" style="color: #FF9142;">800.000</span>/org</p><button class="btn btn-sm" type="button" style="background-color: #FF9142;width: 200px;color: white;">Pilih</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-4 d-flex align-items-center"><img src="../assets/img/bruh.jpg" style="max-height: 64px;">
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
                    <div class="col-4 text-end">
                        <p><span class="fs-4 fw-bold" style="color: #FF9142;">800.000</span>/org</p><button class="btn btn-sm" type="button" style="background-color: #FF9142;width: 200px;color: white;">Pilih</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-4 d-flex align-items-center"><img src="../assets/img/bruh.jpg" style="max-height: 64px;">
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
                    <div class="col-4 text-end">
                        <p><span class="fs-4 fw-bold" style="color: #FF9142;">800.000</span>/org</p><button class="btn btn-sm" type="button" style="background-color: #FF9142;width: 200px;color: white;">Pilih</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-4 d-flex align-items-center"><img src="../assets/img/bruh.jpg" style="max-height: 64px;">
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
                    <div class="col-4 text-end">
                        <p><span class="fs-4 fw-bold" style="color: #FF9142;">800.000</span>/org</p><button class="btn btn-sm" type="button" style="background-color: #FF9142;width: 200px;color: white;">Pilih</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-4 d-flex align-items-center"><img src="../assets/img/bruh.jpg" style="max-height: 64px;">
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
                    <div class="col-4 text-end">
                        <p><span class="fs-4 fw-bold" style="color: #FF9142;">800.000</span>/org</p><button class="btn btn-sm" type="button" style="background-color: #FF9142;width: 200px;color: white;">Pilih</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-4 d-flex align-items-center"><img src="../assets/img/bruh.jpg" style="max-height: 64px;">
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
                    <div class="col-4 text-end">
                        <p><span class="fs-4 fw-bold" style="color: #FF9142;">800.000</span>/org</p><button class="btn btn-sm" type="button" style="background-color: #FF9142;width: 200px;color: white;">Pilih</button>
                    </div>
                </div>
            </div>
        </div>
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
                                <p>Kota Asal</p><input class="form-control" type="text" id="input-kota-asal">
                                <div id="menu-kota-asal" class="position-absolute" style="display: none;margin-top: 8px;width: 200px;max-height: 300px;background-color: white;border-radius: 4px;border: 1px solid rgba(0,0,0,.25);overflow-y: auto;">
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
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div id="data-kota-tujuan" class="position-relative">
                                <p>Kota Tujuan</p><input class="form-control" type="text" id="input-kota-tujuan">
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
                                        <p class="mx-2" style="font-size: 14px;">Jakarta, Indonesia</p>
                                        <p class="mx-2" style="font-size: 12px;">JKTA - All Airports in Jakarta</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <p>Jumlah Penumpang</p><input class="form-control" type="text">
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <p>Tanggal Pergi</p><input class="form-control" type="date">
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <p>Tanggal Pulang</p><input class="form-control" type="date">
                        </div>
                        <div class="col-12 col-lg-6">
                            <p>Kelas Penerbangan</p><select class="form-select">
                                <optgroup label="This is a group">
                                    <option value="12" selected="">This is item 1</option>
                                    <option value="13">This is item 2</option>
                                    <option value="14">This is item 3</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-primary" type="submit"><i class="fas fa-search"></i>&nbsp;Save</button></div>
            </form>
        </div>
    </div>
</div>
<script src="../assets/js/tiket.js"></script>
@endsection
