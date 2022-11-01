@extends('layout.admins')

@section('content')
@include('includes.datatables')

<div class="container">
    <div class="my-4" style="font-size: 1.25rem;">
        <i class="fas fa-arrow-left color-main me-4"></i>
        <a class="me-3" href="#" style=" color: inherit!important; text-decoration: none!important;">CMS</a>
        <i class="fas fa-chevron-right me-3"></i>
        <a class="me-3" href="#" style=" color: inherit!important; text-decoration: none!important;">Product Management</a>
        <i class="fas fa-chevron-right me-3"></i>
        <a class="me-3" href="#" style=" color: inherit!important; text-decoration: none!important;">Tour</a>
        <i class="fas fa-chevron-right me-3"></i>
        <a class="me-3" href="#" style=" color: inherit!important; text-decoration: none!important;">Booking</a>
    </div>
    <div class="card">
        <div class="card-body">
            <h1>Table Booking Tour</h1>
            <hr style="margin: 1rem -1rem;" />
            <div class="p-3 data-penerbangan mb-3" style="background-image: linear-gradient(to top, rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.5)), url({{url($tour->thumbnail_img_url)}});background-repeat: no-repeat;background-size: cover;background-position: center center;border-radius: inherit;">
                <div class="row">
                    <div class="col-4 d-flex align-items-center" style="color: white;">
                        <p class="ms-3 fs-4 fw-bold">{{$tour->name}}</p>
                    </div>
                    <div class="col-4 d-flex align-items-center justify-content-evenly offset-4" style="color: white;">
                        <div class="text-center"><i class="fas fa-sun" style="font-size: 1.25rem;"></i>
                            <p>{{$tour->days_count}} hari</p>
                        </div>
                        <div class="text-center"><i class="fas fa-moon"></i>
                            <p>{{$tour->nights_count}} Malam</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>Title</th>
                            <th>Guest Name</th>
                            <th>NIK</th>
                            <th>Nomor HP</th>
                            <th>Tipe</th>
                            <th style="width: 51px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @dump($data) --}}
                        @foreach ($data as $item)
                            <tr class="row-kamar">
                                <td class="fw-bolder bgcolor-main" colspan="6">Kamar {{ $loop->index+1 }}</td>
                            </tr>
                            @foreach ($item as $final)
                                <tr class="row-data" id = "{{$final['id']}}">
                                    <td class="text-end">{{ $final['title'] }}</td>
                                    <td>{{ $final['name'] }}</td>
                                    <td class="text-center">{{ $final['nik'] }}</td>
                                    <td class="text-center">{{ $final['phone'] }}</td>
                                    <td class="text-center">{{ $final['type'] }}</td>
                                    <td class="cell-aksi"><button class="btn btn-primary btn-sm" type="button"><i class="fas fa-edit"></i></button></td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div role="dialog" tabindex="-1" class="modal fade" id="modal-edit-booking">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit data booking</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id = "form-update">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col col-2 mb-4">
                            <div class="position-relative">
                                <p class="small">Title</p>
                                <select class="form-select ps-2" id="select-title">
                                    <option value="mr">Mr</option>
                                    <option value="mrs">Mrs</option>
                                    <option value="ms">Ms</option>
                                </select>
                            </div>
                        </div>
                        <div class="col col-10 mb-4">
                            <div class="position-relative">
                                <p class="small">Guest Name</p>
                                <input type="text" name = "name" class="form-control ps-2" id="input-name" />
                            </div>
                        </div>
                        <div class="col col-4 mb-4">
                            <div class="position-relative">
                                <p class="small">NIK</p>
                                <input type="number" name = "nik" class="form-control ps-2" id="input-nik" />
                            </div>
                        </div>
                        <div class="col col-4 mb-4">
                            <div class="position-relative">
                                <p class="small">Nomor HP</p>
                                <div class="d-flex align-items-center">
                                    <strong>+62</strong>
                                    <input type="number" name = "phone" class="form-control ms-2" id="input-nomor-hp" />
                                </div>
                            </div>
                        </div>
                        <div class="col col-4 mb-4">
                            <div class="position-relative">
                                <p class="small">Tipe</p>
                                <div class="d-flex justify-content-evenly py-1">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" value = "ADT" id="formCheck-adult" name="tipe" />
                                        <label class="form-check-label" for="formCheck-adult">Adult</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" value = "CHD" id="formCheck-child" name="tipe" />
                                        <label class="form-check-label" for="formCheck-child">Child</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-6 mb-4">
                            <div class="position-relative">
                                <p class="small">Nomor Passport</p>
                                <input type="text" name = "no_passport" class="form-control ps-2" id="input-nomor-passport" />
                            </div>
                        </div>
                        <div class="col col-6 mb-4">
                            <div class="position-relative">
                                <p class="small">Date of birth</p>
                                <input class="form-control ps-2" type="date" name = "DOB" id="input-date" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{asset('js/backoffice/detailBookingTour.js')}}"></script>
@endsection

