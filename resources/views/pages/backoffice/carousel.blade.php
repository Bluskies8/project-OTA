@extends('layout.admins')

@section('content')
    @include('includes.datatables')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <header>
                    <h3>Add Carousel</h3>
                </header>
                <hr style="margin: 1rem -1rem;" />
                <form action="/cms/content/carousel/create" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input type="text" class="form-control" name="link">
                    </div>
                    <div class="mb-3">
                        <label for="imagefile" class="form-label">File</label>
                        <input type="file" class="form-control" name="imagefile">
                    </div>
                    <div class="mb-3 footer text-end">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <header>
                    <h3>Carousel</h3>
                </header>
                <hr style="margin: 1rem -1rem;" />
                <div class="table-responsive">

                    <table class="table" id="table-Carousel">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th class="text-center">Link</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr id = "{{$item->id}}">
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$item->direct_link}}</td>
                                    <td><img src="{{$item->url_image}}" alt="" class="w-100 h-100"></td>
                                    <td class="text-center"><i class="fas fa-exclamation-circle btn btn-sm btn-primary carouselDetail"></i>  <i class="fas btn btn-sm btn-danger fa-trash carouselDelete"></i></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="modal-detail-carousel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Carousel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" enctype="multipart/form-data" id = "form-update-carousel">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="type" class="form-label">Link</label>
                            <input type="text" id = "link" class="form-control" name="link">
                        </div>
                        <div class="mb-3">
                            <label for="imagefile" class="form-label">File</label>
                            <input type="file" class="form-control" name="imagefile">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/backoffice/endusercontent.js') }}"></script>
@endsection
