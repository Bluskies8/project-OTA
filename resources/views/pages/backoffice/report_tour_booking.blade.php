@extends('layout.admins')

@section('content')
@include('includes.datatables')

	<div class="card col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="section-tour">
		<div class="card-body">
			<header>
				<h3>1. Select Tour</h3>
			</header>
			<hr style="margin: 1rem -1rem;" />

			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group">
				<input list="data-tour"  class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group data-tour" >
				<datalist id="data-tour">
                    @foreach ($tour as $item)
                        <option value="{{$item->name}}" id = "{{$item->id}}"></option>
                    @endforeach
				</datalist>
			</div>

			<header>
				<h3>2. Select Depature Date</h3>
			</header>
			<hr style="margin: 1rem -1rem;" />

			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group">
				<input list="tour-date"  class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group data-date">
				<datalist id="tour-date">

				</datalist>
			</div>
		</div>
		<div class="card-body">
			<hr style="margin: 1rem -1rem;" />
			<div class="table-responsive">
				<table class="table" id="table-tours">
					<thead>
						<tr>
							<th>No.</th>
							<th>Booking Code </th>
							<th>Customer</th>
							{{-- <th>Product Tour</th>
							<th>Tour Date</th> --}}
							<th>Total (IDR)</th>
							<th>Payment URL</th>
							<th>Payment Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                        {{-- @foreach ($data as $item)
						<tr id = "">
							<td>{{$loop->index+1}}</td>
							<td>{{$item->bookingCode}}</td>
							<td>{{$item->customer->guest_name}}</td>
							<td class="text-right">{{$item->total}}</td>
							<td class="text-right">{{$item->payment_url}}</td>
							<td class="text-right">{{$item->payment_status}}</td>
							<td class="cell-action"><i class="fas fa-exclamation-circle text-primary"></i></td>
						</tr>
                        @endforeach --}}
					</tbody>
				</table>
			</div>
		</div>
	</div>

<script src="{{asset('js/backoffice/reportTour.js')}}"></script>
@endsection
