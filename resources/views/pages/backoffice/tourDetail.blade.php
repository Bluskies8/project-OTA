@section('title')
    Backoffice - {{ $data->name }}
@endsection
@extends('layout.admins')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        <div class="my-3 content-header d-flex align-items-center">
            <i class="fas fa-arrow-left color-main me-4"></i>
            <a class="me-3" href="#">Backoffice</a>
            <i class="fas fa-chevron-right me-3"></i>
            <a class="me-3" href="#">Product Management</a>
            <i class="fas fa-chevron-right me-3"></i>
            <a class="me-3" href="#">Tour</a>
            <i class="fas fa-chevron-right me-3"></i>
            <a class="me-3" href="#">Details</a>
        </div>
        <section id="section-tour-detail" class="mb-5">
            <h4 class="mb-2">Tour Details</h4>
            <div class="card">
                <div class="card-body">
                    <form action="/cms/tour/update" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="row">
                            <div class="col-6 d-flex flex-column justify-content-end mb-4"><input class="form-control"
                                    name="name" type="text" placeholder="Nama Tour" value="{{ $data->name }}"></div>
                            <div class="col-6 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Slug</p><input class="form-control" type="text"
                                    placeholder="xyz.co.id/tours/" name="slug" value="{{ $data->slug }}">
                            </div>
                            <div class="col-3 d-flex flex-column justify-content-end mb-4">
                                <div class="d-flex align-items-center spesial"><input class="form-control spesial"
                                        name="pass_minim" type="text" value="{{ $data->pass_minim }}"
                                        placeholder="Minumum Passanger">
                                    <p>person</p>
                                </div>
                            </div>
                            <div class="col-3 d-flex flex-column justify-content-end mb-4">
                                <div class="d-flex align-items-center spesial"><input class="form-control spesial"
                                        name="pass_limit" type="text" value="{{ $data->pass_limit }}"
                                        placeholder="Passanger Limit">
                                    <p>person</p>
                                </div>
                            </div>
                            <div class="col-3 d-flex flex-column justify-content-end mb-4">
                                <div class="d-flex align-items-center spesial"><input class="form-control spesial"
                                        name="days_count" type="text" value="{{ $data->days_count }}"
                                        placeholder="Days Count">
                                    <p>day(s)</p>
                                </div>
                            </div>
                            <div class="col-3 d-flex flex-column justify-content-end mb-4">
                                <div class="d-flex align-items-center spesial"><input class="form-control spesial"
                                        name="nights_count" type="text" value="{{ $data->nights_count }}"
                                        placeholder="Night Count">
                                    <p>night(s)</p>
                                </div>
                            </div>
                            <div class="col-4 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Start Price</p>
                                <div class="d-flex align-items-center spesial">
                                    <p>Rp.&nbsp;</p><input class="form-control spesial" type="text" name="start_price"
                                        value="{{ $data->start_price }}">
                                </div>
                            </div>
                            <div class="col-4 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Gimmic Price</p>
                                <div class="d-flex align-items-center spesial">
                                    <p>Rp.&nbsp;</p><input class="form-control spesial" type="text" name="gimmic_price"
                                        value="{{ $data->gimmic_price }}">
                                </div>
                            </div>
                            <div class="col-4 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Down Payment</p>
                                <div class="d-flex align-items-center spesial">
                                    <p>Rp.&nbsp;</p><input class="form-control spesial" type="text" name="downpayment"
                                        value="{{ $data->downpayment }}">
                                </div>
                            </div>
                            <div class="col d-flex align-items-center mb-4">
                                @if ($data->include_visa == 1)
                                    <div class="form-check me-3"><input class="form-check-input" type="checkbox"
                                            id="formCheck-1" name="include_visa" checked><label class="form-check-label"
                                            for="formCheck-1">Require Visa</label></div>
                                @else
                                    <div class="form-check me-3"><input class="form-check-input" type="checkbox"
                                            id="formCheck-1" name="include_visa"><label class="form-check-label"
                                            for="formCheck-1">Require Visa</label></div>
                                @endif
                                @if ($data->is_domestic == 1)
                                    <div class="form-check me-3"><input class="form-check-input" type="checkbox"
                                            id="formCheck-2" name="is_domestic" checked><label class="form-check-label"
                                            for="formCheck-2">Is Domestic</label></div>
                                @else
                                    <div class="form-check me-3"><input class="form-check-input" type="checkbox"
                                            id="formCheck-2" name="is_domestic"><label class="form-check-label"
                                            for="formCheck-2">Is Domestic</label></div>
                                @endif
                                @if ($data->include_hotel == 1)
                                    <div class="form-check me-3"><input class="form-check-input" type="checkbox"
                                            id="formCheck-3" name="include_hotel" checked><label class="form-check-label"
                                            for="formCheck-3">Include Hotel</label></div>
                                @else
                                    <div class="form-check me-3"><input class="form-check-input" type="checkbox"
                                            id="formCheck-3" name="include_hotel"><label class="form-check-label"
                                            for="formCheck-3">Include Hotel</label></div>
                                @endif
                                @if ($data->include_flight == 1)
                                    <div class="form-check me-3"><input class="form-check-input" type="checkbox"
                                            id="formCheck-4" name="include_flight" checked><label class="form-check-label"
                                            for="formCheck-4">Include Flight</label></div>
                                @else
                                    <div class="form-check me-3"><input class="form-check-input" type="checkbox"
                                            id="formCheck-4" name="include_flight"><label class="form-check-label"
                                            for="formCheck-4">Include Flight</label></div>
                                @endif
                                {{-- <div class="form-check me-3"><input class="form-check-input" type="checkbox" id="formCheck-5" name = ""><label class="form-check-label" for="formCheck-5">Include Ride</label></div>
                            <div class="form-check me-3"><input class="form-check-input" type="checkbox" id="formCheck-6" name = ""><label class="form-check-label" for="formCheck-6">Include Ticket</label></div>
                            <div class="form-check me-3"><input class="form-check-input" type="checkbox" id="formCheck-7" name = ""><label class="form-check-label" for="formCheck-7">Include Boat</label></div>
                            <div class="form-check me-3"><input class="form-check-input" type="checkbox" id="formCheck-8" name = ""><label class="form-check-label" for="formCheck-8">Include Guide</label></div> --}}
                            </div>
                            <div class="col-6 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Supplier</p><select class="form-select" name="supplier_id">
                                    @foreach ($supplier as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Description</p>
                                <textarea class="form-control" style="resize: none;" name="description">{{ $data->description }}</textarea>
                            </div>
                            <div class="col-6 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Tags</p>
                                <?php
                                $tags = '';
                                $tagid = '';
                                foreach ($data->tagsObject as $key) {
                                    if ($tags == '') {
                                        $tags = $key->name;
                                        $tagid = $key->id;
                                        // echo $key->name;
                                    } else {
                                        $tags = $tags . ',' . $key->name;
                                        $tagid = $tagid . ',' . $key->id;
                                    }
                                }
                                ?>
                                <div class="d-flex align-items-center spesial position-relative">
                                    <input class="form-control spesial input-tags" type="text" id="input-tags" value="{{ $tags }}" readonly="" style="background-color: inherit;">
                                        <button class="btn show-tags" type="button" style="color: #212529;font-size: 14px;">
                                            <i class="fas fa-chevron-down"></i>
                                        </button>
                                    <div id="tag-list" class="position-absolute w-100 p-3 card" style="top: 38px;background-color: white;display: none;">
                                        <div class="d-flex mb-2">
                                            <input class="form-control me-3" type="search" placeholder="Cari tag">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search"></i>
                                            </button></div>
                                        <div class="row" style="max-height: 200px;overflow-y: auto;">
                                            @foreach ($tag as $item)
                                                @foreach (explode(',', $data->tags) as $item2)
                                                    @if ($item->id == $item2)
                                                        <input type="hidden" name="tags" id="tag" value="{{ $tagid }}">
                                                        <div class="col-4 mb-1">
                                                            <div class="form-check">
                                                                <input checked class="form-check-input" type="checkbox"
                                                                    id="tag-{{ $item->id }}"
                                                                    value="{{ $item->name }}"><label
                                                                    class="form-check-label"
                                                                    for="tag-{{ $item->id }}">{{ $item->name }}</label>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="col-4 mb-1">
                                                            <div class="form-check"><input class="form-check-input"
                                                                    type="checkbox" id="tag-{{ $item->id }}"
                                                                    value="{{ $item->name }}"><label
                                                                    class="form-check-label"
                                                                    for="tag-{{ $item->id }}">{{ $item->name }}</label>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $ctags = '';
                            $ctagid = '';
                            foreach ($data->countryTagsObject as $key) {
                                if ($ctags == '') {
                                    $ctags = $key->label;
                                    $ctagid = $key->id;
                                } else {
                                    $ctags = $ctags . ',' . $key->label;
                                    $ctagid = $ctagid . ',' . $key->id;
                                }
                            }
                            ?>
                            <div class="col-6 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Country Tags</p>
                                <div class="d-flex align-items-center spesial position-relative"><input
                                        class="form-control spesial input-tags" type="text" id="input-country-tags"
                                        value="{{ $ctags }}" readonly=""
                                        style="background-color: inherit;"><button class="btn show-tags" type="button"
                                        style="color: #212529;font-size: 14px;"><i
                                            class="fas fa-chevron-down"></i></button>
                                    <div id="country-tag-list" class="position-absolute w-100 p-3 card"
                                        style="top: 38px;background-color: white;display: none;">
                                        <div class="d-flex mb-2"><input class="form-control me-3" type="search"
                                                placeholder="Cari tag"><button class="btn btn-primary" type="button"><i
                                                    class="fas fa-search"></i></button></div>
                                        <input type="hidden" name="countrytag" id="countrytag"
                                            value="{{ $ctagid }}">
                                        <div class="row" style="max-height: 200px;overflow-y: auto;">
                                            @foreach ($country as $item)
                                                @foreach (explode(',', $data->countrytag) as $item2)
                                                    @if ($item->id == $item2)
                                                        <div class="col-4 mb-1">
                                                            <div class="form-check"><input checked
                                                                    class="form-check-input" type="checkbox"
                                                                    id="country-{{ $item->id }}"
                                                                    value="{{ $item->label }}"><label
                                                                    class="form-check-label"
                                                                    for="country-{{ $item->id }}">{{ $item->label }}</label>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="col-4 mb-1">
                                                            <div class="form-check"><input class="form-check-input"
                                                                    type="checkbox" id="country-{{ $item->id }}"
                                                                    value="{{ $item->label }}"><label
                                                                    class="form-check-label"
                                                                    for="country-{{ $item->id }}">{{ $item->label }}</label>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Valid Date Start</p><input class="form-control" type="date"
                                    name="valid_date_start" value="{{ $data->valid_date_start }}">
                            </div>
                            <div class="col-6 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Valid Date End</p><input class="form-control" type="date"
                                    name="valid_date_end" value="{{ $data->valid_date_end }}">
                            </div>
                            <div class="col-6 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Header Image</p><input class="form-control" type="file"
                                    name="header_img" style="padding: 6px 12px;">
                            </div>
                            <div class="col-6 d-flex flex-column justify-content-end mb-4">
                                <p class="tiny">Thumbnail Image</p><input class="form-control" type="file"
                                    name="thumbnail_img" style="padding: 6px 12px;">
                            </div>
                        </div>
                        <div class="text-end"><button class="btn btn-primary" type="submit"><i
                                    class="fas fa-save me-2"></i>Update</button></div>
                    </form>
                </div>
            </div>
        </section>
        <section id="section-tour-highlight" class="mb-5">
            <h3 class="mb-3 d-flex justify-content-between align-items-center">Tour Hightlight<button
                    class="btn btn-primary save-highlight" type="button"><i class="fas fa-save"></i> Save</button></h3>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table-highlight">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="highlight-clone" style="display: none;">
                                    <td class="text-center">0.</td>
                                    <td style="padding-top: 6px;padding-bottom: 6px;"><input type="text"
                                            name="highlight" class="w-100"
                                            style="outline: none;border: none;border-bottom: 1px solid lightgray;" id=""
                                            value="" /></td>
                                    <td class="text-center" style="width: 50px;padding-top: 4px;padding-bottom: 4px;">
                                        <button class="btn btn-sm text-danger delete-highlight" type="button"><i
                                                class="fas fa-trash"></i></button></td>
                                </tr>
                                @foreach ($data['Highlights'] as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}.</td>
                                        <td style="padding-top: 6px;padding-bottom: 6px;"><input type="text"
                                                name="highlight" class="w-100"
                                                style="outline: none;border: none;border-bottom: 1px solid lightgray;"
                                                id={{ $item->id }} value="{{ $item->item }}" /></td>
                                        <td class="text-center" style="width: 50px;padding-top: 4px;padding-bottom: 4px;">
                                            <button class="btn btn-sm text-danger delete-highlight" type="button"><i
                                                    class="fas fa-trash"></i></button></td>
                                    </tr>
                                @endforeach
                                {{-- <tr>
                                <td class="text-center">1.</td>
                                <td style="padding-top: 6px;padding-bottom: 6px;"><input type="text" class="w-100" style="outline: none;border: none;border-bottom: 1px solid lightgray;" /></td>
                                <td class="text-center" style="width: 50px;padding-top: 4px;padding-bottom: 4px;"><button class="btn btn-sm text-danger" type="button"><i class="fas fa-trash"></i></button></td>
                            </tr> --}}
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center"><button class="btn btn-primary" id="add-highlight" type="button"><i
                                class="fas fa-plus"></i></button></div>
                </div>
            </div>
        </section>
        <section id="section-tour-itinetary" class="mb-5">
            <h3 class="mb-3 d-flex justify-content-between align-items-center">Tour Itinetary<button
                    class="btn btn-primary save-itinetary" type="button"><i class="fas fa-save"></i> Save</button></h3>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table-itinetary">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="itinetary-clone" style="display: none;">
                                    <td class="text-center">0.</td>
                                    <td style="padding-top: 6px;padding-bottom: 6px;"><input type="text"
                                            name="itinetary" class="w-100"
                                            style="outline: none;border: none;border-bottom: 1px solid lightgray;" id=""
                                            value="" /></td>
                                    <td class="text-center" style="width: 50px;padding-top: 4px;padding-bottom: 4px;">
                                        <button class="btn btn-sm text-danger delete-itinetary" type="button"><i
                                                class="fas fa-trash"></i></button></td>
                                </tr>
                                @foreach ($data['itinenaries'] as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}.</td>
                                        <td style="padding-top: 6px;padding-bottom: 6px;"><input type="text"
                                                name="itinetary" class="w-100"
                                                style="outline: none;border: none;border-bottom: 1px solid lightgray;"
                                                id="{{ $item->id }}" value="{{ $item->label }}" /></td>
                                        <td class="text-center" style="width: 50px;padding-top: 4px;padding-bottom: 4px;">
                                            <button class="btn btn-sm text-danger delete-itinetary" type="button"><i
                                                    class="fas fa-trash"></i></button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center"><button class="btn btn-primary" id="add-itinetary" type="button"><i
                                class="fas fa-plus"></i></button></div>
                </div>
            </div>
        </section>
        <section id="section-tour-inclusion" class="mb-5">
            <h3 class="mb-3 d-flex justify-content-between align-items-center">Tour Inclusion<button
                    class="btn btn-primary save-include" type="button"><i class="fas fa-save"></i> Save</button></h3>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table-inclusion">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="inclusion-clone" style="display: none;">
                                    <td class="text-center">0.</td>
                                    <td style="padding-top: 6px;padding-bottom: 6px;"><input name="include" id="" value=""
                                            type="text" class="w-100"
                                            style="outline: none;border: none;border-bottom: 1px solid lightgray;" /></td>
                                    <td class="text-center" style="width: 50px;padding-top: 4px;padding-bottom: 4px;">
                                        <button class="btn btn-sm text-danger delete-include" type="button"><i
                                                class="fas fa-trash"></i></button></td>
                                </tr>
                                @foreach ($data['includes'] as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}.</td>
                                        <td style="padding-top: 6px;padding-bottom: 6px;"><input name="include"
                                                id="{{ $item->id }}" value="{{ $item->item }}" type="text"
                                                class="w-100"
                                                style="outline: none;border: none;border-bottom: 1px solid lightgray;" />
                                        </td>
                                        <td class="text-center" style="width: 50px;padding-top: 4px;padding-bottom: 4px;">
                                            <button class="btn btn-sm text-danger delete-include" type="button"><i
                                                    class="fas fa-trash"></i></button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center"><button class="btn btn-primary" id="add-inclusion" type="button"><i
                                class="fas fa-plus"></i></button></div>
                </div>
            </div>
        </section>
        <section id="section-tour-exclusion" class="mb-5">
            <h3 class="mb-3 d-flex justify-content-between align-items-center">Tour Exclusion<button
                    class="btn btn-primary save-exclude" type="button"><i class="fas fa-save"></i> Save</button></h3>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table-exclusion">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="exclusion-clone" style="display: none;">
                                    <td class="text-center">0.</td>
                                    <td style="padding-top: 6px;padding-bottom: 6px;"><input name="exclude" id="" value=""
                                            type="text" class="w-100"
                                            style="outline: none;border: none;border-bottom: 1px solid lightgray;" /></td>
                                    <td class="text-center" style="width: 50px;padding-top: 4px;padding-bottom: 4px;">
                                        <button class="btn btn-sm text-danger delete-exclude" type="button"><i
                                                class="fas fa-trash"></i></button></td>
                                </tr>
                                @foreach ($data['excludes'] as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}.</td>
                                        <td style="padding-top: 6px;padding-bottom: 6px;"><input name="exclude"
                                                id="{{ $item->id }}" value="{{ $item->item }}" type="text"
                                                class="w-100"
                                                style="outline: none;border: none;border-bottom: 1px solid lightgray;" />
                                        </td>
                                        <td class="text-center" style="width: 50px;padding-top: 4px;padding-bottom: 4px;">
                                            <button class="btn btn-sm text-danger delete-exclude" type="button"><i
                                                    class="fas fa-trash"></i></button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center"><button class="btn btn-primary" id="add-exclusion" type="button"><i
                                class="fas fa-plus"></i></button></div>
                </div>
            </div>
        </section>
        <section id="section-terms-conditions" class="mb-5">
            <h3 class="mb-3 d-flex justify-content-between align-items-center">Tour Terms &amp; Conditions<button
                    class="btn btn-primary save-thermcond" type="button"><i class="fas fa-save"></i> Save</button></h3>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table-terms-conditions">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="terms-conditions-clone" style="display: none;">
                                    <td class="text-center">0.</td>
                                    <td style="padding-top: 6px;padding-bottom: 6px;"><input type="text"
                                            class="w-100"
                                            style="outline: none;border: none;border-bottom: 1px solid lightgray;" /></td>
                                    <td class="text-center" style="width: 50px;padding-top: 4px;padding-bottom: 4px;">
                                        <button class="btn btn-sm text-danger" type="button"><i
                                                class="fas fa-trash"></i></button></td>
                                </tr>
                                {{-- @foreach ($data['thermsConds'] as $item)
                            <tr>
                                <td class="text-center">{{$loop->index+1}}.</td>
                                <td style="padding-top: 6px;padding-bottom: 6px;"><input value = "{{$item->item}}" type="text" class="w-100" style="outline: none;border: none;border-bottom: 1px solid lightgray;" /></td>
                                <td class="text-center" style="width: 50px;padding-top: 4px;padding-bottom: 4px;"><button class="btn btn-sm text-danger" type="button"><i class="fas fa-trash"></i></button></td>
                            </tr>
                            @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center"><button class="btn btn-primary" id="add-terms-conditions" type="button"><i
                                class="fas fa-plus"></i></button></div>
                </div>
            </div>
        </section>
        <section id="section-photo" class="mb-5">
            <h3 class="mb-3 d-flex justify-content-between align-items-center">Tour Photos<button
                    class="btn btn-primary save-photo" type="button"><i class="fas fa-save"></i> Save</button></h3>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table-photo">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th>Photo</th>
                                    <th>Content</th>
                                    <th>Upload</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- <tr id="photo-clone" style="display: none;">
                                <td class="text-center">0.<div></div>
                                </td>
                                <td><div class="preview-img form-control p-0" ><img  id = "preview-img" src="" style="object-fit: contain; max-width: 300px;" /></div></td>
                                <td style="padding-top: 6px;padding-bottom: 6px;"><input name = "photos" value = "" type="text" class="w-100" style="outline: none;border: none;border-bottom: 1px solid lightgray;" /></td>
                                <form id = "myForm" action="/cms/tour/Photo/create" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <td style="width: 122px;padding-top: 4px;padding-bottom: 4px;">
                                        <input type="file" name="img" class="form-control" onchange="document.getElementById('preview-img').src = window.URL.createObjectURL(this.files[0])" />
                                        <input type="hidden" name="id" value = "">
                                    </td>
                                    <td style="width: 100px;padding-top: 4px;padding-bottom: 4px;">
                                        <button class="btn btn-sm text-danger" type="button" id = "submitBtn"><i class="fas fa-save"></i></button>
                                        <button class="btn btn-sm text-danger delete-photo" type="button">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </form>
                            </tr> --}}
                                @foreach ($data->photos as $item)
                                    <tr id="{{ $item->id }}">
                                        <td class="text-center">1.<div></div>
                                        </td>
                                        {{-- <td><img class="w-100 h-100" style="object-fit: contain;" src = {{$item->img_url}}/></td> --}}
                                        <td>
                                            <div class="preview-img form-control p-0"><img id="preview-img"
                                                    src="{{ $item->img_url }}"
                                                    style="object-fit: contain; max-width: 300px;" /></div>
                                        </td>
                                        <form action="/cms/tour/Photo/update" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <td style="padding-top: 6px;padding-bottom: 6px;"><input name="title"
                                                    value="{{ $item->title }}" type="text" class="w-100"
                                                    style="outline: none;border: none;border-bottom: 1px solid lightgray;" />
                                            </td>
                                            <td style="width: 122px;padding-top: 4px;padding-bottom: 4px;">
                                                <input type="file" name="img" class="form-control"
                                                    onchange="document.getElementById('preview-img').src = window.URL.createObjectURL(this.files[0])" />
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                {{-- <button class="btn btn-primary btn-sm" type="button">Upload Image</button></td> --}}
                                            </td>
                                            <td style="width: 100px;padding-top: 4px;padding-bottom: 4px;">
                                                <button class="btn btn-sm text-danger" type="submit "><i
                                                        class="fas fa-save"></i></button>
                                                <button class="btn btn-sm text-danger delete-photo" type="button">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center"><button class="btn btn-primary" id="add-photo" type="button"><i
                                class="fas fa-plus"></i></button></div>
                </div>
            </div>
        </section>
    </div>

    <div role="dialog" tabindex="-1" id='modal-photo' class="modal fade">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Notice</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/cms/tour/Photo/update" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 mb-3">
                            <p class="tiny">Slug</p>
                            <input class="form-control" type="text" placeholder="xyz.co.id/tours/" name="slug" value="{{ $data->slug }}">
                        </div>
                        <div class="col-12 mb-3">
                            <input type="file" name="img" class="form-control" onchange="document.getElementById('preview-img').src = window.URL.createObjectURL(this.files[0])" />
                        </div>
                        <div class="text-end mb-3">
                            <button class="btn btn-sm btn-danger mx-2" type="submit">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                            <button class="btn btn-sm btn-danger delete-photo" type="button">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </div>
                        <input type="hidden" name="id" value="{{ $item->id }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/backoffice/tour.js') }}"></script>
@endsection
