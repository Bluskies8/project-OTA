@extends('layout.admins')

@section('content')
    @include('includes.datatables')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        <div class="card col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card-body">
                <header>
                    <h3>All Flight</h3>
                </header>
                <hr style="margin: 1rem -1rem;" />
                <div class="table-responsive">

                    <table class="table" id="table-Flight">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Tanggal </th>
                                <th>Customer</th>
                                <th>Invoice</th>
                                <th>Booking Code</th>
                                <th>City Route</th>
                                <th>Total (IDR)</th>
                                <th>Booking Status</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->index + 1 }}</td>
                                    <td class="text-center">{{ $item->book_date }}</td>
                                    <td class="text-center">{{ $item->customer->first_name }}</td>
                                    <td class="text-center">{{ $item->invoice }}</td>
                                    <td class="text-center">{{ $item->booking_code }}</td>
                                    <td class="text-right">{{ $item->city_route }}</td>
                                    <td class="text-right thousand-separator">{{ round($item->total); }}</td>
                                    <td class="text-right">{{ $item->book_status }}</td>
                                    <td class="text-right">{{ $item->payment_xstatus }}</td>
                                    <td class="cell-action text-right"><i
                                            class="fas fa-exclamation-circle text-primary"></i></td>
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
    {{-- <div class="card-body">
                <header>
				<h3>Filter</h3>
			</header>
			<hr style="margin: 1rem -1rem;" /> --}}
            {{-- <form class="needs-validation" novalidate>
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
						<input id="inputEmail" type="email" name="email" data-parsley-trigger="change" placeholder="Contact's Email" autocomplete="off" class="form-control">
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
						<input type="text" class="form-control" id="validationCustom02" placeholder="Booking Code" >
					</div>

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
						<input type="text" class="form-control" id="validationCustom02" placeholder="Passanger Name" >
					</div>
				</div>

				<div class="row mt-3">
					<div class="col-1 offset-11">
						<button class="btn btn-primary" type="submit">Search</button>
					</div>
				</div>
			</form>
		</div> --}}
    <script src="{{ asset('js/backoffice/tour.js') }}"></script>
@endsection
