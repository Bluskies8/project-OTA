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
            <div class="p-3 data-penerbangan mb-3" style="background-image: linear-gradient(to top, rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.5)), url(bg_search.jpg);background-repeat: no-repeat;background-size: cover;background-position: center center;border-radius: inherit;">
                <div class="row">
                    <div class="col-4 d-flex align-items-center" style="color: white;">
                        <p class="ms-3 fs-4 fw-bold">Nama Tour</p>
                    </div>
                    <div class="col-4 d-flex align-items-center justify-content-evenly offset-4" style="color: white;">
                        <div class="text-center"><i class="fas fa-sun" style="font-size: 1.25rem;"></i>
                            <p>4 hari</p>
                        </div>
                        <div class="text-center"><i class="fas fa-moon"></i>
                            <p>3 Malam</p>
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
                                <tr class="row-data">
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
@endsection
{{--
<div class="container">
    <div class="my-5" style="font-size: 1.25rem;"><i class="fas fa-arrow-left color-main me-4"></i><a class="me-3" href="#">CMS</a><i class="fas fa-chevron-right me-3"></i><a class="me-3" href="#">Product Management</a><i class="fas fa-chevron-right me-3"></i><a class="me-3" href="#">Tour</a><i class="fas fa-chevron-right me-3"></i><a class="me-3" href="#">Booking</a></div>

                    <tbody>
                        <tr class="row-kamar">
                            <td class="fw-bolder bgcolor-main" colspan="6">Kamar 1</td>
                        </tr>
                        <tr class="row-data">
                            <td class="text-end">Mr</td>
                            <td>Kevin</td>
                            <td class="text-center">1234567890</td>
                            <td class="text-center">08123456789</td>
                            <td class="text-center">Adult</td>
                            <td class="cell-aksi"><button class="btn btn-primary btn-sm" type="button"><i class="fas fa-edit"></i></button></td>
                        </tr>
                        <tr class="row-data">
                            <td class="text-end">Mrs</td>
                            <td>Larisa</td>
                            <td class="text-center">1234567891</td>
                            <td class="text-center">08123456789</td>
                            <td class="text-center">Adult</td>
                            <td class="cell-aksi"><button class="btn btn-primary btn-sm" type="button"><i class="fas fa-edit"></i></button></td>
                        </tr>
                        <tr class="row-data">
                            <td class="text-end">Mr</td>
                            <td>Jimmy</td>
                            <td class="text-center">1234567892</td>
                            <td class="text-center">08123456789</td>
                            <td class="text-center">Child</td>
                            <td class="cell-aksi"><button class="btn btn-primary btn-sm" type="button"><i class="fas fa-edit"></i></button></td>
                        </tr>
                        <tr class="row-kamar">
                            <td class="fw-bolder bgcolor-main" colspan="6">Kamar 2</td>
                        </tr>
                        <tr class="row-data">
                            <td class="text-end">Mr</td>
                            <td>Kevin</td>
                            <td class="text-center">1234567890</td>
                            <td class="text-center">08123456789</td>
                            <td class="text-center">Adult</td>
                            <td class="cell-aksi"><button class="btn btn-primary btn-sm" type="button"><i class="fas fa-edit"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> --}}
