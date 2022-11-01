@extends('layout.admins')

@section('content')
    @include('includes.datatables')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <header>
                    <h3>Add Display Banner</h3>
                </header>
                <hr style="margin: 1rem -1rem;" />
                <form action="/cms/content/displaybanner/create" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description">
                    </div>
                    <div class="mb-3">
                        <p class="tiny">Tags</p>
                        <div class="d-flex align-items-center spesial position-relative"><input class="form-control spesial input-tags" type="text" id="input-tags" readonly="" style="background-color: inherit;">
                            <button class="btn show-tags" type="button" style="color: #212529;font-size: 14px;"><i class="fas fa-chevron-down"></i></button>
                            <div id="tag-list" class="position-absolute w-100 p-3 card" style="top: 38px;background-color: white;display: none;">
                                <div class="d-flex mb-2">
                                <input class="form-control me-3" type="search" placeholder="Cari tag"><button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button></div>
                                <div class="row me-3" style="max-height: 200px;overflow-y: auto;">
                                <input type="hidden" name="tags" id="tag" value="">
                                @foreach ($tag as $item)
                                    <div class="col-4 mb-1">
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="tag-{{$item->id}}" value="{{$item->name}}"><label class="form-check-label" for="tag-{{$item->id}}">{{$item->name}}</label></div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 footer text-end">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card mt-5">
            <div class="card-body">
                <header>
                    <h3>Display Banner</h3>
                </header>
                <hr style="margin: 1rem -1rem;" />
                <div class="table-responsive">

                    <table class="table" id="table-Carousel">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th class="text-center">Urutan</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Tag</th>
                                <th class="text-center">Enabled</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr id = "{{$item->id}}">
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$item->index}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->description}}</>
                                    <td>{{$item->tags_name}}</td>
                                    <td>{{$item->enabled}}</td>
                                    <td class="text-center">
                                        <i class="fas fa-exclamation-circle btn btn-sm btn-primary displayBannerDetail"></i><i class="fas btn btn-sm btn-danger fa-trash displayBannerDelete"></i>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="modal-displayedit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Display Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id = "form-update-displaybanner">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="index" class="form-label">Urutan</label>
                            <input type="text" class="form-control" name="index" id = "db-index">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id = "db-title">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" id = "db-description">
                        </div>
                        <div class="mb-3" id = "radio">
                            <label class="custom-control custom-radio">
                                <input type="radio" name="enabled" class="custom-control-input" value = "1"><span class="custom-control-label">Enabled</span>
                            </label>
                            <label class="custom-control custom-radio">
                                <input type="radio" name="enabled" class="custom-control-input" value = "0"><span class="custom-control-label">Disabled</span>
                            </label>
                        </div>
                        <div class="mb-3">
                            <p class="tiny">Tags</p>
                            <div class="d-flex align-items-center spesial position-relative">
                                <input class="form-control spesial input-tags2" type="text" id="input-tags2" value="" readonly="" style="background-color: inherit;">
                                    <button class="btn show-tags" type="button" style="color: #212529;font-size: 14px;">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                <div id="tag-list2" class="position-absolute w-100 p-3 card" style="top: 38px;background-color: white;display: none;">
                                    <div class="d-flex mb-2">
                                        <input class="form-control me-3" type="search" placeholder="Cari tag">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search"></i>
                                        </button></div>
                                    <div class="row" style="max-height: 200px;overflow-y: auto;">
                                        <input type="hidden" name="tags" id="tag2" value="">
                                        @foreach ($tag as $item)
                                            <div class="col-4 mb-1">
                                                <div class="form-check"><input class="form-check-input" type="checkbox" id="tag-{{ $item->id }}" value="{{ $item->name }}">
                                                    <label class="form-check-label"for="tag-{{ $item->id }}">{{ $item->name }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
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
