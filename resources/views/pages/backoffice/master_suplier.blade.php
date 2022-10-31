@extends('layout.admins')

@section('content')
@include('includes.datatables')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">

	<div class="card col-12">
		<div class="card-body">
			<header>
				<h3>Add New Supplier</h3>
			</header>
			<hr style="margin: 1rem -1rem;" />
			<form action="/backoffice/supplier/create" method="post">
                @csrf
				<div class="row">
					<div class="col-12 mt-2">
						<input type="text" name="name" class="form-control" placeholder="Name*" >
					</div>

					<div class="col-12 mt-2">
						<input id="inputEmail" type="email" name="email" placeholder="Email*" autocomplete="off" class="form-control">
					</div>

					<div class="col-12 mt-2">
						<input type="number" class="form-control" name="phone" placeholder="Phone*" >
					</div>

					<div class="col-12 mt-2">
						<input type="text" class="form-control" name = "address" placeholder="Address" >
					</div>
				</div>

					<div class="col-1 offset-11">
						<button class="btn btn-primary d-flex align-items-center" type="submit"><i class="fas fa-save">&nbsp;</i>Create</button>
					</div>
			</form>
		</div>
		<div class="card-body">
			<hr style="margin: 1rem -1rem;" />
			<div class="table-responsive">
				<table class="table" id="table-supplier"  style="width: 100%">
					<thead>
						<tr class="text-center">
							<th >No.</th>
							<th >Supplier Name </th>
							<th >Supplier Email </th>
							<th >Supplier Phone </th>
							<th >Supplier Address </th>
							<th >Action</th>
						</tr>
					</thead>
					<tbody>
                        @foreach ($data as $item)
						<tr id = "{{$item->id}}">
							<td>{{$loop->index+1}}</td>
							<td>{{$item->name}}</td>
							<td>{{$item->email}}</td>
							<td>{{$item->phone}}</td>
							<td>{{$item->address}}</td>
							<td><i class="fas fa-exclamation-circle text-primary edit-supplier" ></i> &emsp;<i class="fas fa-trash text-danger delete-supplier"></i></td>
						</tr>
                        @endforeach
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
            <form method="POST" action="/backoffice/supplier/update">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div id="container-kode" class="col-12 position-relative mb-3">
                            <p class="position-absolute px-1" style="top: -10px;left: 1rem;font-size: 12px;background-color: white;">Nama</p>
                            <input type="text" id = "name" name="name" class="form-control" placeholder="Nama*" >
                            @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div id="container-nama" class="col-12 position-relative mb-3">
                            <p class="position-absolute px-1" style="top: -10px;left: 1rem;font-size: 12px;background-color: white;">Email</p>
                            <input id="email" type="email" name="email" placeholder="Email*" autocomplete="off" class="form-control">
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div id="container-satuan" class="col-12 position-relative mb-3">
                            <p class="position-absolute px-1" style="top: -10px;left: 1rem;font-size: 12px;background-color: white;">phone</p>
                            <input type="number" id = "phone" class="form-control" name="phone" placeholder="Phone*" >
                            @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div id="container-harga" class="col-12 position-relative mb-3">
                            <p class="position-absolute px-1" style="top: -10px;left: 1rem;font-size: 12px;background-color: white;">Address</p>
                            <input type="text" id="address" class="form-control" name = "address" placeholder="Address" >
                            @error('address')
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
<script src="{{asset('js/backoffice/supplier.js')}}"></script>
@endsection
