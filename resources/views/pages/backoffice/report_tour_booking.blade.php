@extends('layout.admins')

@section('content')
@include('includes.datatables')

<div class="container">
    <div class="my-4" style="font-size: 1.25rem;">
        <i class="fas fa-arrow-left color-main me-4"></i>
        <a class="me-3" href="#" style=" color: inherit!important; text-decoration: none!important;">CMS</a>
        <i class="fas fa-chevron-right me-3"></i>
        <a class="me-3" href="#" style=" color: inherit!important; text-decoration: none!important;">Product Management</a>
        <i class="fas fa-chevron-right me-3"></i>
        <a class="me-3" href="#" style=" color: inherit!important; text-decoration: none!important;">Tour</a>
        <i class="fas fa-chevron-right me-3"></i>
        <a class="me-3" href="#" style=" color: inherit!important; text-decoration: none!important;">Booking</a>
    </div>
    <div class="card" id="section-tour">
        <div class="card-body">
            <div id="container-tour">
                <h3 class="mb-2">Tour List</h3>
                <div class="form-group mt-4">
                    <input list="data-tour" class="px-2 form-control data-tour" style="border-radius: .25rem;">
                    <datalist id="data-tour">
                        @foreach ($tour as $item)
                            <option value="{{$item->name}}" id = "{{$item->id}}"></option>
                        @endforeach
                    </datalist>
                </div>
            </div>

            <hr style="margin: 1rem -1rem;" />
            <div id="container-departure" class="text-muted">
                <h3 class="mb-2">Depature Date</h3>
                <div class="form-group mt-4" style="display: none;">
                    <input list="tour-date" class="px-2 form-control data-date" style="border-radius: .25rem;">
                    <datalist id="tour-date">

                    </datalist>
                </div>
            </div>

            <hr style="margin: 1rem -1rem;" />
            <div id="container-passanger" class="text-muted">
                <h3 class="mb-2">Table Passanger</h3>
                <div class="table-responsive" style="display: none;">
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
    </div>
</div>

<script src="{{asset('js/backoffice/reportTour.js')}}"></script>
@endsection
