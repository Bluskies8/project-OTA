@extends('layout.admins')

@section('content')
@include('includes.datatables')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container mt-5">
	<div class="card col-12">
		<div class="card-body">
			<header>
				<h3>Add New Referral Code</h3>
			</header>
			<hr style="margin: 1rem -1rem;" />
			<form action="/backoffice/referral/create" method="post">
                @csrf
				<div class="row">
					<div class="col-12 mt-2 d-flex">
						<input type="text" class="form-control" name="kode" placeholder="Kode" required>
                        <select name="tipe" required>
                            {{-- <option value="" hidden selected>-</option> --}}
                            <option value="flight" selected>Flight</option>
                            <option value="tour">Tour</option>
                        </select>
					</div>
					<div class="col-6 mt-2 d-flex">
						<input type="number" min=0 max=999999999 class="form-control" name="limit" placeholder="Limit Penggunaan" required>
                    </div>
					<div class="col-6 mt-2 d-flex">
						<input type="number" min=0 max=100 class="form-control" name="diskon" placeholder="Besar Diskon" required>
                    </div>
				</div>

                <div class="w-100 text-end mt-3">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-save">&nbsp;</i>Create</button>
                </div>
			</form>
			<hr style="margin: 1rem -1rem;" />
			<div class="table-responsive">
				<table class="table"  style="width: 100%" id = "table-referal">
					<colgroup>
					   <col span="1" style="width: 10%;">
					   <col span="1" style="width: 15%;">
					   <col span="1" style="width: 25%;">
					   <col span="1" style="width: 20%;">
					   <col span="1" style="width: 20%;">
					   <col span="1" style="width: 10%;">
					</colgroup>
					<thead>
						<tr>
							<th>No.</th>
							<th>Tipe </th>
							<th>Kode</th>
							<th>Amount</th>
							<th>Limit</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                        @foreach ($data as $item)
						<tr id="{{$item->id}}">
							<td>{{$loop->index+1}}</td>
							<td>{{$item->tipe}}</td>
							<td>{{$item->kode}}</td>
							<td>{{$item->discount}}</td>
							<td>{{$item->limit}}</td>
							<td><i class="fas fa-exclamation-circle text-primary detail-referal" ></i> &emsp;<i class="fas fa-pen-to-square text-primary edit-referal" ></i> &emsp;<i class="fas fa-trash text-danger delete-referal"></i></td>

						</tr>
                        @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="card col-12" id = "table-detail" style="display: none;">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table"  style="width: 100%" id = "table-referal-detail">
                    <colgroup>
                    <col span="1" style="width: 10%;">
                    <col span="1" style="width: 15%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>nama </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" role="dialog" tabindex="-1" id="modal-master">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modal-master-header" class="modal-title">Update Supplier</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="/backoffice/referral/update">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div id="container-tipe" class="col-12 position-relative mb-3">
                            <p class="position-absolute px-1" style="top: -10px;left: 1rem;font-size: 12px;background-color: white;">Tipe</p>
                            <select name="tipe" required id = "tipe">
                                {{-- <option value="" hidden selected>-</option> --}}
                                <option value="flight" selected>Flight</option>
                                <option value="tour">Tour</option>
                            </select>
                            @error('tipe')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div id="container-kode" class="col-12 position-relative mb-3">
                            <p class="position-absolute px-1" style="top: -10px;left: 1rem;font-size: 12px;background-color: white;">Kode</p>
                            <input id="kode" type="text" name="kode" placeholder="Kode*" autocomplete="off" class="form-control">
                            @error('kode')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div id="container-amount" class="col-12 position-relative mb-3">
                            <p class="position-absolute px-1" style="top: -10px;left: 1rem;font-size: 12px;background-color: white;">Amount</p>
                            <input type="number" id = "amount" class="form-control" name="amount" placeholder="Amount*" >
                            @error('amount')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div id="container-limit" class="col-12 position-relative mb-3">
                            <p class="position-absolute px-1" style="top: -10px;left: 1rem;font-size: 12px;background-color: white;">Limit</p>
                            <input type="text" id="limit" class="form-control" name = "limit" placeholder="Limit" >
                            @error('limit')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('js/backoffice/kodeReferal.js')}}"></script>
@endsection
