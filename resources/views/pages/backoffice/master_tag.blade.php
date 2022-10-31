@extends('layout.admins')

@section('content')
@include('includes.datatables')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container mt-5">

	<div class="card col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="card-body">
			<header>
				<h3>Add New Tags</h3>
			</header>
			<hr style="margin: 1rem -1rem;" />
			<form action="/backoffice/tag/create" method="post">
                @csrf
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
						<input type="text" class="form-control" name="name" placeholder="Name" >
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
                        @foreach ($data as $item)
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
                        @endforeach
					</tbody>
				</table>
				<!-- <ul class="list-unstyled form-control" id="list-action"> -->
					<!-- <li id="action-detail"><i class="fa-solid fa-circle-info"></i>&nbsp;Detail</li> -->
					<!-- <li id="action-duplicate"><i class="fa-solid fa-clone"></i>&nbsp;Duplicate</li> -->
					<!-- <li id="action-delete"><i class="fa-solid fa-trash"></i>&nbsp;Delete</li> -->
				<!-- </ul> -->
			</div>
		</div>
	</div>
</div>

<script src="{{asset('js/backoffice/tag.js')}}"></script>
@endsection
