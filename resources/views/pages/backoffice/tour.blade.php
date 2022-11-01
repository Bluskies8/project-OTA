@extends('layout.admins')

@section('content')
@include('includes.datatables')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <div class="my-3 content-header d-flex align-items-center">
        <i class="fas fa-arrow-left color-main me-4"></i>
        <a class="me-3" href="#">Backoffice</a>
        <i class="fas fa-chevron-right me-3"></i>
        <a class="me-3" href="#">Product Management</a>
        <i class="fas fa-chevron-right me-3"></i>
        <a class="me-3" href="#">Tour</a>
    </div>
    <div id="container-add-tour" class="mb-2">
        <div class="text-end"><button class="btn btn-primary btn-sm" id="add-tour" type="button"><i class="fas fa-plus"></i> Add</button></div>
        @if(!$errors->any())
        <div style="display: none">
        @endif
            <h4 class="mb-2">New Tour</h4>
            <div class="card">
                <div class="card-body">
                    <form action = "/cms/tour/create" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6 d-flex flex-column justify-content-end mb-4">
                                <input class="form-control" name = "name" type="text" placeholder="Nama Tour"></div>
                                @error('name')
                                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                                @enderror
                            <div class="col-6 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Slug</p>
                                <input class="form-control" name = "slug" type="text" placeholder="xyz.co.id/tours/">
                                @error('slug')
                                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-3 d-flex flex-column justify-content-end mb-4">
                                <div class="d-flex align-items-center spesial">
                                    <input class="form-control spesial" name = "pass_minim" type="text" value placeholder="Minumum Passanger">
                                    <p>person</p>
                                </div>
                                @error('pass_minim')
                                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-3 d-flex flex-column justify-content-end mb-4">
                                <div class="d-flex align-items-center spesial">
                                    <input class="form-control spesial" name = "pass_limit" type="text" placeholder="Passanger Limit">
                                    <p>person</p>
                                </div>
                                @error('pass_limit')
                                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-3 d-flex flex-column justify-content-end mb-4">
                                <div class="d-flex align-items-center spesial">
                                    <input class="form-control spesial" name = "days_count" type="text" placeholder="Days Count">
                                    <p>day(s)</p>
                                </div>
                                @error('days_count')
                                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-3 d-flex flex-column justify-content-end mb-4">
                                <div class="d-flex align-items-center spesial">
                                    <input class="form-control spesial" name = "nights_count" type="text" placeholder="Night Count">
                                    <p>night(s)</p>
                                </div>
                                @error('nights_count')
                                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-4 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Start Price</p>
                                <div class="d-flex align-items-center spesial">
                                    <p>Rp.&nbsp;</p>
                                    <input class="form-control spesial" type="text" name = "start_price">
                                </div>
                                @error('start_price')
                                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-4 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Gimmic Price</p>
                                <div class="d-flex align-items-center spesial">
                                    <p>Rp.&nbsp;</p>
                                    <input class="form-control spesial" type="text" name = "gimmic_price">
                                </div>
                            </div>
                            <div class="col-4 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Down Payment</p>
                                <div class="d-flex align-items-center spesial">
                                    <p>Rp.&nbsp;</p>
                                    <input class="form-control spesial" type="text" name = "downpayment">
                                </div>
                                @error('downpayment')
                                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="col d-flex align-items-center mb-4">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="checkbox" id="formCheck-1" name = "include_visa" value = "0">
                                    <label class="form-check-label" for="formCheck-1">Require Visa</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="checkbox" id="formCheck-2" name = "is_domestic" value = "0">
                                    <label class="form-check-label" for="formCheck-2">Is Domestic</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="checkbox" id="formCheck-3" name = "include_hotel" value = "0">
                                    <label class="form-check-label" for="formCheck-3">Include Hotel</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="checkbox" id="formCheck-4" name = "include_flight" value = "0">
                                    <label class="form-check-label" for="formCheck-4">Include Flight</label>
                                </div>
                            </div>
                            <div class="col-6 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Supplier</p>
                                <select class="form-select" name = "supplier_id">
                                    @foreach ($supplier as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Description</p>
                                <textarea class="form-control" style="resize: none;" name="description"></textarea>
                            </div>
                            <div class="col-6 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Tags</p>
                                <div class="d-flex align-items-center spesial position-relative"><input class="form-control spesial input-tags" type="text" id="input-tags" readonly="" style="background-color: inherit;">
                                    <button class="btn show-tags" type="button" style="color: #212529;font-size: 14px;"><i class="fas fa-chevron-down"></i></button>
                                    <div id="tag-list" class="position-absolute w-100 p-3 card" style="top: 38px;background-color: white;display: none;">
                                        <div class="d-flex mb-2"><input class="form-control me-3" type="search" placeholder="Cari tag"><button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button></div>
                                        <div class="row" style="max-height: 200px;overflow-y: auto;">
                                        @foreach ($tag as $item)
                                            <div class="col-4 mb-1">
                                                <div class="form-check"><input class="form-check-input" type="checkbox" id="tag-{{$item->id}}" value="{{$item->name}}"><label class="form-check-label" for="tag-{{$item->id}}">{{$item->name}}</label></div>
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Country Tags</p>
                                <div class="d-flex align-items-center spesial position-relative"><input class="form-control spesial input-tags" type="text" id="input-country-tags"  readonly="" style="background-color: inherit;">
                                    <button class="btn show-tags" type="button" style="color: #212529;font-size: 14px;"><i class="fas fa-chevron-down"></i></button>
                                    <div id="country-tag-list" class="position-absolute w-100 p-3 card" style="top: 38px;background-color: white;display: none;">
                                        <div class="d-flex mb-2"><input class="form-control me-3" type="search" placeholder="Cari tag"><button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button></div>
                                        <input type="hidden" name="countrytag" id="countrytag">
                                        <div class="row" style="max-height: 200px;overflow-y: auto;">
                                        @foreach ($country as $item)
                                            <div class="col-4 mb-1">
                                                <div class="form-check"><input class="form-check-input" type="checkbox" id="country-{{$item->id}}" value="{{$item->label}}"><label class="form-check-label" for="country-{{$item->id}}">{{$item->label}}</label></div>
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Valid Date Start</p><input class="form-control" type="date" name = "valid_date_start">
                                @error('valid_date_start')
                                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-6 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Valid Date End</p><input class="form-control" type="date" name = "valid_date_end">
                                @error('valid_date_end')
                                    <div style="color:red; font-weight:bold"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-6 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Header Image</p><input class="form-control" type="file" name = "header_img" style="padding: 6px 12px;">
                            </div>
                            <div class="col-6 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Thumbnail Image</p><input class="form-control" type="file" name = "thumbnail_img" style="padding: 6px 12px;">
                            </div>
                        </div>
                        <div class="text-end"><button class="btn btn-primary" type="submit"><i class="fas fa-save me-2"></i>Simpan</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-4">
        <h5>Bulk Action</h5>
        <div class="d-flex"><select class="form-control me-3" style="width: 200px;" id = "bulk-action">
                {{-- <option value selected hidden>Select Action</option> --}}
                <option value="1" selected>Publish</option>
                <option value="0">Unpublish</option>
            </select>
            <button class="btn btn-primary bulk-tour" type="button">Apply</button>
        </div>
    </div>
    <div class="card" id="section-tour">
        <div class="card-body">
            <header>
                <h3>All Tour</h3>
            </header>
            <hr style="margin: 1rem -1rem;" />
            <div class="table-responsive">
                <table class="table" id="table-tours">
                    <thead>
                        <tr class="text-center">
                            <th data-orderable="false"><input type="checkbox" /></th>
                            <th>Published</th>
                            <th>Tour Name</th>
                            <th>Tanggal dibuat</th>
                            <th>Valid Dari</th>
                            <th>Valid Sampai</th>
                            <th>Start Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr id = "{{$item->slug}}">
                            <td class="text-center"><input type="checkbox" /></td>
                            @if ($item->enabled == 1)
                                <td class="text-center"><i class="fa fa-check"></i></td>
                            @else
                                <td class="text-center"><i class="fa fa-times"></i></td>
                            @endif
                            <td>{{$item->name}}</td>
                            <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                            <td>{{date('d-m-Y', strtotime($item->valid_date_start))}}</td>
                            <td>{{date('d-m-Y', strtotime($item->valid_date_end))}}</td>
                            <td class="text-end">{{$item->start_price}}</td>
                            <td class="cell-action"><button class="btn btn-primary btn-sm btn-show-action" type="button"><i class="fas fa-bars"></i></button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <ul class="list-unstyled form-control" id="list-action">
                    <li id="action-detail"><i class="fa-solid fa-circle-info"></i>&nbsp;Detail</li>
                    <li id="action-duplicate"><i class="fa-solid fa-clone"></i>&nbsp;Duplicate</li>
                    <li id="action-delete"><i class="fa-solid fa-trash"></i>&nbsp;Delete</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/backoffice/tour.js')}}"></script>
@endsection
