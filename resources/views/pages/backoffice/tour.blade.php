@extends('layout.admins')

@section('content')
<div class="container">
    <div class="my-3 content-header d-flex align-items-center">
        <i class="fas fa-arrow-left color-main me-4"></i>
        <a class="me-3" href="#">CMS</a>
        <i class="fas fa-chevron-right me-3"></i>
        <a class="me-3" href="#">Product Management</a>
        <i class="fas fa-chevron-right me-3"></i>
        <a class="me-3" href="#">Tour</a>
        <i class="fas fa-chevron-right me-3"></i>
        <a class="me-3" href="#">Details</a></div>
    <section id="section-tour-detail">
        <h4 class="mb-2">Tour Details</h4>
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-6 d-flex flex-column justify-content-end mb-4"><input class="form-control" type="text" placeholder="Nama Tour"></div>
                        <div class="col-6 d-flex flex-column justify-content-end mb-4">
                            <p class="tiny">Slug</p><input class="form-control" type="text" placeholder="lila.co.id/tours/">
                        </div>
                        <div class="col-3 d-flex flex-column justify-content-end mb-4">
                            <div class="d-flex align-items-center spesial"><input class="form-control spesial" type="text" placeholder="Minumum Passanger">
                                <p>person</p>
                            </div>
                        </div>
                        <div class="col-3 d-flex flex-column justify-content-end mb-4">
                            <div class="d-flex align-items-center spesial"><input class="form-control spesial" type="text" placeholder="Passanger Limit">
                                <p>person</p>
                            </div>
                        </div>
                        <div class="col-3 d-flex flex-column justify-content-end mb-4">
                            <div class="d-flex align-items-center spesial"><input class="form-control spesial" type="text" placeholder="Days Count">
                                <p>day(s)</p>
                            </div>
                        </div>
                        <div class="col-3 d-flex flex-column justify-content-end mb-4">
                            <div class="d-flex align-items-center spesial"><input class="form-control spesial" type="text" placeholder="Night Count">
                                <p>night(s)</p>
                            </div>
                        </div>
                        <div class="col-4 d-flex flex-column justify-content-end mb-4">
                            <p class="tiny">Start Price</p>
                            <div class="d-flex align-items-center spesial">
                                <p>Rp.&nbsp;</p><input class="form-control spesial" type="text">
                            </div>
                        </div>
                        <div class="col-4 d-flex flex-column justify-content-end mb-4">
                            <p class="tiny">Gimmic Price</p>
                            <div class="d-flex align-items-center spesial">
                                <p>Rp.&nbsp;</p><input class="form-control spesial" type="text">
                            </div>
                        </div>
                        <div class="col-4 d-flex flex-column justify-content-end mb-4">
                            <p class="tiny">Down Payment</p>
                            <div class="d-flex align-items-center spesial">
                                <p>Rp.&nbsp;</p><input class="form-control spesial" type="text">
                            </div>
                        </div>
                        <div class="col d-flex align-items-center mb-4">
                            <div class="form-check me-3"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Require Visa</label></div>
                            <div class="form-check me-3"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Is Domestic</label></div>
                            <div class="form-check me-3"><input class="form-check-input" type="checkbox" id="formCheck-3"><label class="form-check-label" for="formCheck-3">Include Hotel</label></div>
                            <div class="form-check me-3"><input class="form-check-input" type="checkbox" id="formCheck-4"><label class="form-check-label" for="formCheck-4">Include Flight</label></div>
                            <div class="form-check me-3"><input class="form-check-input" type="checkbox" id="formCheck-5"><label class="form-check-label" for="formCheck-5">Include Ride</label></div>
                            <div class="form-check me-3"><input class="form-check-input" type="checkbox" id="formCheck-6"><label class="form-check-label" for="formCheck-6">Include Ticket</label></div>
                            <div class="form-check me-3"><input class="form-check-input" type="checkbox" id="formCheck-7"><label class="form-check-label" for="formCheck-7">Include Boat</label></div>
                            <div class="form-check me-3"><input class="form-check-input" type="checkbox" id="formCheck-8"><label class="form-check-label" for="formCheck-8">Include Guide</label></div>
                        </div>
                        <div class="col-6 d-flex flex-column justify-content-end mb-4">
                            <p class="tiny">Supplier</p><select class="form-select">
                                <option value="" selected="" hidden="" disabled="">Supplier</option>
                            </select>
                        </div>
                        <div class="col-6 d-flex flex-column justify-content-end mb-4">
                            <p class="tiny">Kategori Tour</p><select class="form-select">
                                <option value="" selected="" hidden="" disabled="">Normal</option>
                            </select>
                        </div>
                        <div class="col-12 d-flex flex-column justify-content-end mb-4">
                            <p class="tiny">Description</p><textarea class="form-control" style="resize: none;"></textarea>
                        </div>
                        <div class="col-6 d-flex flex-column justify-content-end mb-4">
                            <p class="tiny">Tags</p>
                            <div class="d-flex align-items-center spesial position-relative"><input class="form-control spesial input-tags" type="text" id="input-tags" readonly="" style="background-color: inherit;"><button class="btn show-tags" type="button" style="color: #212529;font-size: 14px;"><i class="fas fa-chevron-down"></i></button>
                                <div id="tag-list" class="position-absolute w-100 p-3 card" style="top: 38px;background-color: white;display: none;">
                                    <div class="d-flex mb-2"><input class="form-control me-3" type="search" placeholder="Cari tag"><button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button></div>
                                    <div class="row" style="max-height: 200px;overflow-y: auto;">
                                        <div class="col-4 mb-1">
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-9" value="tag 1"><label class="form-check-label" for="formCheck-9">Tag 1</label></div>
                                        </div>
                                        <div class="col-4 mb-1">
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-10" value="tag 2"><label class="form-check-label" for="formCheck-10">Tag 2</label></div>
                                        </div>
                                        <div class="col-4 mb-1">
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-11" value="tag 3"><label class="form-check-label" for="formCheck-11" value="tag 2">Tag 3</label></div>
                                        </div>
                                        <div class="col-4 mb-1">
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-12" value="tag 4"><label class="form-check-label" for="formCheck-12">Tag 4</label></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 d-flex flex-column justify-content-end mb-4">
                            <p class="tiny">Country Tags</p>
                            <div class="d-flex align-items-center spesial position-relative"><input class="form-control spesial input-tags" type="text" id="input-country-tags" readonly="" style="background-color: inherit;"><button class="btn show-tags" type="button" style="color: #212529;font-size: 14px;"><i class="fas fa-chevron-down"></i></button>
                                <div id="country-tag-list" class="position-absolute w-100 p-3 card" style="top: 38px;background-color: white;display: none;">
                                    <div class="d-flex mb-2"><input class="form-control me-3" type="search" placeholder="Cari tag"><button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button></div>
                                    <div class="row" style="max-height: 200px;overflow-y: auto;">
                                        <div class="col-4 mb-1">
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-13" value="country tag 1"><label class="form-check-label" for="formCheck-13">Country Tag 1</label></div>
                                        </div>
                                        <div class="col-4 mb-1">
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-14" value="country tag 2"><label class="form-check-label" for="formCheck-14">Country Tag 2</label></div>
                                        </div>
                                        <div class="col-4 mb-1">
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-15" value="country tag 3"><label class="form-check-label" for="formCheck-15" value="tag 2">Country Tag 3</label></div>
                                        </div>
                                        <div class="col-4 mb-1">
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-16" value="country tag 4"><label class="form-check-label" for="formCheck-16">Country Tag 4</label></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 d-flex flex-column justify-content-end mb-4">
                            <p class="tiny">Valid Date Start</p><input class="form-control" type="date">
                        </div>
                        <div class="col-6 d-flex flex-column justify-content-end mb-4">
                            <p class="tiny">Valid Date End</p><input class="form-control" type="date">
                        </div>
                        <div class="col-6 d-flex flex-column justify-content-end mb-4">
                            <p class="tiny">Header Image</p><input class="form-control" type="file" style="padding: 6px 12px;">
                        </div>
                        <div class="col-6 d-flex flex-column justify-content-end mb-4">
                            <p class="tiny">Thumbnail Image</p><input class="form-control" type="file" style="padding: 6px 12px;">
                        </div>
                    </div>
                    <div class="text-end"><button class="btn btn-primary" type="submit"><i class="fas fa-save me-2"></i>Create</button></div>
                </form>
            </div>
        </div>
    </section>

</div>

<script src="{{asset('js/backoffice/tour.js')}}"></script>
@endsection
