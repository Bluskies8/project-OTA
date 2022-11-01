@extends('layout.admins')

@section('content')
@include('includes.datatables')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
	<div class="card col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="card-body">
			<header>
				<h3>Add New Role</h3>
			</header>
			<hr style="margin: 1rem -1rem;" />
			<form class="needs-validation" novalidate>
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
						<input type="text" class="form-control" id="validationCustom02" placeholder="Role Name" >

						<h4 class="mt-3">Role Type</h4>

						<label class="custom-control custom-radio">
						    <input type="radio" name="radio-stacked" checked="" class="custom-control-input"><span class="custom-control-label">Super Admin (Create,Read,Update,Delete)</span>
						</label>
						<label class="custom-control custom-radio">
							<input type="radio" name="radio-stacked" class="custom-control-input" ><span class="custom-control-label">Backoffice(Create,Read,Update,Delete)</span>
						</label>
						<label class="custom-control custom-radio">
							<input type="radio" name="radio-stacked" class="custom-control-input" ><span class="custom-control-label">CMS(Create,Read,Update,Delete)</span>
						</label>
					</div>

				</div>

				<div class="row mt-3">
					<div class="col-1 offset-11">
						<button class="btn btn-primary" type="submit"><i class="fas fa-save">&nbsp;</i>Create</button>
					</div>
				</div>
			</form>
		</div>
		<div class="card-body">
			<header>
				<h3>--</h3>
			</header>
			<hr style="margin: 1rem -1rem;" />
			<div class="table-responsive">
				<table class="table" id="table-tours"  style="width: 100%">
					<thead>
						<tr class="text-center">
							<th >No.</th>
							<th >Role Name </th>
							<th >Role Type </th>
							<th >Action</th>
						</tr>
					</thead>
					<tbody>
                        @foreach ($data as $item)
						<tr id = "{{$item->id}}">
							<td class="text-center">{{$loop->index+1}}</td>
							<td class="text-center">{{$item->name}}</td>
							<td class="text-center">{{$item->type}}</td>
							<td class="cell-action text-right"><i class="fas fa-exclamation-circle text-primary"></i> &emsp;<i class="fas fa-trash text-danger"></i></td>
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

<script src="{{asset('js/backoffice/tour.js')}}"></script>
@endsection
