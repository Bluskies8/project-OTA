@extends('layout.admins')

@section('content')
@include('includes.datatables')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
	<div class="card col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="card-body">
			<header>
				<h3>Admin Account</h3>
			</header>
            <hr style="margin: 1rem -1rem;" />
			<form action="/admin/account/create" method="post">
                @csrf
				<div class="row">
					<div class="col-12 mt-2">
						<input type="text" name="username" class="form-control" placeholder="Username*" >
					</div>
					<div class="col-12 mt-2">
						<input type="text" class="form-control" name="password" placeholder="Password*" >
					</div>
                    <div class="col-12 mt-2">
                        <select id="select-tipe" class="form-select" name="role_id">
                            @foreach ($role as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                            {{-- <option value="upah">upah</option>
                            <option value="alat">alat</option> --}}
                        </select>
                    </div>
				</div>
                <br>
                <div class="col-1 offset-11">
                    <button class="btn btn-primary d-flex align-items-center" type="submit"><i class="fas fa-save">&nbsp;</i>Create</button>
                </div>
			</form>
		</div>
		<div class="card-body">
			<hr style="margin: 1rem -1rem;" />
			<div class="table-responsive">
				<table class="table" id="table-tours"  style="width: 100%">
					<thead>
						<tr>
							<th >No.</th>
							<th >Username </th>
							<th >Role Name </th>
							<th >Action</th>
						</tr>
					</thead>
					<tbody>
                        @foreach ($data as $item)
						<tr id = "{{$item->id}}">
                            <td>{{$loop->index+1}}</td>
							<td>{{$item->username}}</td>
							<td>{{$item->role->name}}</td>
							<td class="d-none">{{$item->role->id}}</td>
							<td class="align-items-center"><i class="fas fa-exclamation-circle text-primary edit-account"></i> &emsp;<i class="fas fa-trash text-danger delete-account"></i></td>
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
					<div class="col-12 mt-2">
						<input type="text" id = "username" name="username" class="form-control" placeholder="Username*" >
					</div>
					<div class="col-12 mt-2">
						<input type="text" id = "password" class="form-control" name="password" placeholder="Password*" >
					</div>
                    <div class="col-12 mt-2">
                        <p class="position-absolute px-1" style="top: -10px;left: 1rem;font-size: 12px;background-color: white;">Tipe</p>
                        <select class="form-select" name="role_id" id = "role_id">
                            @foreach ($role as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                            {{-- <option value="upah">upah</option>
                            <option value="alat">alat</option> --}}
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('js/backoffice/adminAccount.js')}}"></script>
@endsection
