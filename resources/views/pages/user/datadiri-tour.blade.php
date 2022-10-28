@section('title')Data Diri Tour @endsection
@extends('layout.users')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container py-5">
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
                                <input type="text" name = "cp-nama" class="form-control" />
                            </div>
                            <div class="mb-2">
                                <p>E-mail</p>
                                <input type="text" name = "cp-email" class="form-control" />
                            </div>
                            <div class="mb-2">
                                <p>No Telepon</p>
                                <input type="text" name = "cp-nohp" class="form-control" />
                            </div>
                            <div class="mb-2">
                                <p>Tanggal Lahir</p>
                                <input class="form-control" name = "cp-birth" type="date" />
                            </div>
                        </div>
                        <!-- sampe sini -->
                    </div>
                </div>
                <div id = "dataroom">
                    @foreach ($room as $item)
                    <hr style="margin: 1rem -1rem;" />
                    <div id="droom-{{$loop->index+1}}">
                        <input type="hidden" name="room" value = "{{$loop->index+1}}">
                        <h2> Room {{$loop->index+1}}</h2>
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
                                        <input type="text" id = "adult-nama{{($loop->index+1)}}" name = "adult-nama{{($loop->index+1)}}" class="form-control" />
                                    </div>
                                    <div class="mb-2">
                                        <p>E-mail</p>
                                        <input type="text" id = "adult-email{{($loop->index+1)}}" name = "adult-email{{($loop->index+1)}}" class="form-control" />
                                    </div>
                                    <div class="mb-2">
                                        <p>No Telepon</p>
                                        <input type="text" id = "adult-nohp{{($loop->index+1)}}" name = "adult-nohp{{($loop->index+1)}}" class="form-control" />
                                    </div>
                                    <div class="mb-2">
                                        <p>Tanggal Lahir</p>
                                        <input class="form-control" id = "adult-birth{{($loop->index+1)}}" name = "adult-birth{{($loop->index+1)}}" type="date" />
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
                                        <input type="text" id = "child-nama{{($loop->index+1)}}" name = "child-nama{{($loop->index+1)}}" class="form-control" />
                                    </div>
                                    <div class="mb-2">
                                        <p>E-mail</p>
                                        <input type="text" id = "child-email{{($loop->index+1)}}" name = "child-email{{($loop->index+1)}}" class="form-control" />
                                    </div>
                                    <div class="mb-2">
                                        <p>No Telepon</p>
                                        <input type="text" id = "child-nohp{{($loop->index+1)}}" name = "child-nohp{{($loop->index+1)}}" class="form-control" />
                                    </div>
                                    <div class="mb-2">
                                        <p>Tanggal Lahir</p>
                                        <input class="form-control" id = "child-birth{{($loop->index+1)}}" name = "child-birth{{($loop->index+1)}}" type="date" />
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

                {{-- <hr style="margin: 1rem -1rem;" />
                <div id="container-form-anak">
                    <h3>Anak-anak</h3>
                    <hr />
                    <div class="row">
                        <!-- loop dari sini -->
                        <div class="col-6">
                            <div class="mb-2">
                                <h5>Nama Lengkap</h5>
                                <input type="text" class="form-control" />
                            </div>
                            <div class="mb-2">
                                <h5>E-mail</h5>
                                <input type="text" class="form-control" />
                            </div>
                            <div class="mb-2">
                                <h5>No Telepon</h5>
                                <input type="text" class="form-control" />
                            </div>
                            <div class="mb-2">
                                <h5>Tanggal Lahir</h5>
                                <input class="form-control" type="date" />
                            </div>
                        </div>
                        <!-- sampe sini -->
                    </div>
                </div> --}}
                <div class="text-end">
                    <button class="btn btn-primary" type="button" id = "btn-submit" style="color: #fff;background-color: rgb(75, 0, 118);">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('js/user/tour.js')}}"></script>
@endsection
