@section('title')Data Diri Tour @endsection
@extends('layout.users')

<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
<div class="container py-5">
    <div class="card">
        <div class="card-body">
            <form>
                <div id="container-form-CP" class="mb-4">
                    <h3>Contact Person</h3>
                    <hr />
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-2">
                                <p>Nama Lengkap</p>
                                <div class="form-control d-flex" >
                                    <select style="outline: none; border: none; " id = "cp-title"" required>
                                        <option value="mr">Mr</option>
                                        <option value="mrs">Mrs</option>
                                        <option value="ms">Ms</option>
                                    </select>
                                    <input class="w-100" style="outline: none; border: none; type="text" id = "cp-nama" name = "cp-nama" required/>
                                </div>
                            </div>
                            <div class="mb-2">
                                <p>E-mail</p>
                                <input type="text" name = "cp-email" class="form-control" required />
                            </div>
                            <div class="mb-2">
                                <p>No Telepon</p>
                                <input type="text" name = "cp-nohp" class="form-control" required />
                            </div>
                            <div class="mb-2">
                                <p>Tanggal Lahir</p>
                                <input class="form-control" name = "cp-birth" type="date" required />
                            </div>
                            <div class="mb-2">
                                <p>Kode Referral</p>
                                <input class="form-control" name="kode_referral" type="text" required />
                            </div>
                            <div style="color:red; display:none" id = "error-kode">kode not found</div>
                        </div>
                    </div>
                </div>
                <div id="dataroom">
                    @foreach ($room as $item)
                    <hr style="margin: 1rem -1rem;" />
                    <div id="droom-{{$loop->index+1}}">
                        <input type="hidden" name="room" value = "{{$loop->index+1}}">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2> Room {{$loop->index+1}}</h2>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" id="formCheck-double-{{($loop->index+1)}}" name="bed_type-{{($loop->index+1)}}" value="double" checked>
                                    <label class="form-check-label" for="formCheck-double-{{($loop->index+1)}}">Double Bed</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" id="formCheck-single-{{($loop->index+1)}}" name="bed_type-{{($loop->index+1)}}" value="single">
                                    <label class="form-check-label" for="formCheck-single-{{($loop->index+1)}}">Single Bed</label>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div id="container-form-dewasa{{$loop->index+1}}" class="mb-4">
                            <h4>Dewasa</h4>
                            <hr />
                            <div class="row">
                            @for ($i = 0; $i < $item->adult; $i++)
                                <!-- loop dari sini -->
                                <div class="col-4">
                                    <div class="mb-2">
                                        <p>Nama Lengkap</p>
                                        <div class="form-control d-flex" >
                                            <select style="outline: none; border: none;" class = "adult-title" required>
                                                <option value="mr">Mr</option>
                                                <option value="mrs">Mrs</option>
                                                <option value="ms">Ms</option>
                                            </select>
                                            <input class="w-100" style="outline: none; border: none;" type="text" id = "adult-nama{{($loop->index+1)}}" name = "adult-nama{{($loop->index+1)}}" />
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <p>E-mail</p>
                                        <input type="text" id = "adult-email{{($loop->index+1)}}" name = "adult-email{{($loop->index+1)}}" class="form-control" required />
                                    </div>
                                    <div class="mb-2">
                                        <p>No Telepon</p>
                                        <input type="text" id = "adult-nohp{{($loop->index+1)}}" name = "adult-nohp{{($loop->index+1)}}" class="form-control" required />
                                    </div>
                                    <div class="mb-2">
                                        <p>Tanggal Lahir</p>
                                        <input class="form-control" id = "adult-birth{{($loop->index+1)}}" name = "adult-birth{{($loop->index+1)}}" type="date" required />
                                    </div>
                                </div>
                                <!-- sampe sini -->
                                @endfor
                            </div>
                        </div>
                        @if ($item->child > 0)
                        <div id="container-form-anak{{$loop->index+1}}" class="mb-4">
                            <h4>Anak-anak</h4>
                            <hr />
                            <div class="row">
                                @for ($i = 0; $i < $item->child; $i++)
                                <!-- loop dari sini -->
                                <div class="col-4">
                                    <div class="mb-2">
                                        <p>Nama Lengkap</p>
                                        <div class="form-control d-flex" >
                                            <select style="outline: none; border: none;" class = "adult-title" required>
                                                <option value="mr">Mr</option>
                                                <option value="mrs">Mrs</option>
                                                <option value="ms">Ms</option>
                                            </select>
                                            <input class="w-100" style="outline: none; border: none; type=" type="text" id = "child-nama{{($loop->index+1)}}" name = "child-nama{{($loop->index+1)}}" required />
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <p>E-mail</p>
                                        <input type="text" id = "child-email{{($loop->index+1)}}" name = "child-email{{($loop->index+1)}}" class="form-control" required />
                                    </div>
                                    <div class="mb-2">
                                        <p>No Telepon</p>
                                        <input type="text" id = "child-nohp{{($loop->index+1)}}" name = "child-nohp{{($loop->index+1)}}" class="form-control" required />
                                    </div>
                                    <div class="mb-2">
                                        <p>Tanggal Lahir</p>
                                        <input class="form-control" id = "child-birth{{($loop->index+1)}}" name = "child-birth{{($loop->index+1)}}" type="date" required />
                                    </div>
                                </div>
                                <!-- sampe sini -->
                                @endfor
                            </div>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                <div class="text-end">
                    <button class="btn btn-primary" type="button" id = "btn-submit-tour" style="color: #fff;background-color: rgb(75, 0, 118);">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div role="dialog" tabindex="-1" id='modal-notice' class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Notice</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Data berhasil kami terima.<br />Untuk pemberitahuan selanjutnya akan di hubungi melalui E-mail atau nomor telepon yang ada pada Contact Person.</p>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/user/tour.js')}}"></script>
@endsection
