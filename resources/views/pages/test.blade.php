@extends('layout.admins')

@section('content')
@include('includes.datatables')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group">
            <label for="validationCustom02">List Tour</label>
            <select class="form-control form-control">
                <option>Normal Tour</option>
            </select>
        </div>
		<div class="card col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="section-tour">
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
								<th>Tanggal Dibuat</th>
								<th>Valid Dari</th>
								<th>Valid Sampai</th>
								<th>Tipe</th>
								<th>Start Price(IDR)</th>
								<th>Action</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							{{-- @foreach ($data as $item) --}}
							<tr id = "">
								<td class="text-center"><input type="checkbox" /></td>
								{{-- @if ($item->enabled == 1)  --}}
								<td class="text-center">dsd</td>
								{{-- @else
									<td class="text-center"><i class="fa fa-times"></i></td>
								@endif  --}}
								<td  class="text-center">tony</td>
								<td class="text-center">15-23-2444</td>
								<td class="text-center">15-23-2444</td>
								<td class="text-center">15-23-2444</td>
								<td class="text-right">Rp.2333333</td>
								<td class="cell-action text-right"><button class="btn btn-primary btn-sm btn-show-action" type="button"><i class="fas fa-bars"></i></button>
								<button class="btn btn-primary btn-sm btn-show-action" type="button"><i class="fas fa-edit"></i></button></td>
							</tr>
							{{-- @endforeach  --}}
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
