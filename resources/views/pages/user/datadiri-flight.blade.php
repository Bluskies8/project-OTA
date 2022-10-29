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
                <div class="card-body"></div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/user/tour.js')}}"></script>
@endsection
