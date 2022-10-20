@extends('layout.users')

@section('content')
<div class="container py-5">
    <div class="card">
        <div class="card-body">
            <form action=""> <!-- isi link dari backend -->
                <div id="container-form-dewasa">
                    <h3>Dewasa</h3>
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
                </div>
                <hr style="margin: 1rem -1rem;" />
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
                </div>
                <div class="text-end">
                    <button class="btn btn-primary" type="submit" style="color: #fff;background-color: rgb(75, 0, 118);">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
