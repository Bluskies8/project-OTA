@extends('layout.admins')

@section('content')
    @include('includes.datatables')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        <div class="card col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card-body">
                <header>
                    <h3>Users</h3>
                </header>
                <hr style="margin: 1rem -1rem;" />
                <div class="table-responsive">

                    <table class="table" id="table-Customers">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Title</th>
                                <th>Customer Name</th>
                                <th>Nomor HP</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr id = "{{$item->id}}">
                                    <td class="text-center">{{$loop->index+1}}</td>
                                    <td class="text-center">{{$item->title}}</td>
                                    <td class="text-center">{{$item->first_name}} {{$item->middle_name}} {{$item->last_name}}</td>
                                    <td class="text-center">{{$item->phone_number}}</td>
                                    <td class="cell-action text-center">
                                        <i class="fas fa-exclamation-circle text-primary detail"></i>
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
    <script src="{{ asset('js/backoffice/reportCustomer.js') }}"></script>
@endsection
