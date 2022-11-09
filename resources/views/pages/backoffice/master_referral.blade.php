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
                            <option value="" hidden selected>-</option>
                            <option value="flight">Flight</option>
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
				<table class="table" id="table-tag"  style="width: 100%">
					<colgroup>
					   <col span="1" style="width: 10%;">
					   <col span="1" style="width: 80%;">
					   <col span="1" style="width: 10%;">
					</colgroup>
					<thead>
						<tr>
							<th>No.</th>
							<th>Tag Name </th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                        {{-- @foreach ($data as $item)
						<tr id="{{$item->id}}">
							<td>{{$loop->index+1}}</td>
							<td><p class="tag-name">{{$item->name}}</p><input style="display: none" type="text" name="" value="{{$item->name}}"/></td>
							<td class="cell-action">
                                <div class="d-flex justify-content-center align-items-center" style="font-size: 1.25rem">
                                    <i class="fas fa-save text-danger mx-2 save-tag"></i>
                                    <i class="fas fa-trash text-danger mx-2 delete-tag"></i>
                                </div>
                            </td>
						</tr>
                        @endforeach --}}
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script src="{{asset('js/backoffice/tag.js')}}"></script>
@endsection
