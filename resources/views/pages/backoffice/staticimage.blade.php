@extends('layout.admins')

@section('content')
    @include('includes.datatables')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container mt-5">
        <div class="card col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card-body">
                <header>
                    <h3>Static Images</h3>
                </header>
                <hr style="margin: 1rem -1rem;" />
                <div class="table-responsive">

                    <table class="table" id="table-StaticImg">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th class="text-center">Photo</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="update" method="post">
                                <tr>
                                    <td>1</td>
                                    <td><img src="" alt="" class="w-100 h-100"></td>
                                    <td>ABC</td>
                                    <td class="text-center"><i class="fas fa-exclamation-circle text-primary staticDetail">  <i class="fas text-primary fa-trash staticDelete"></td>
                                </tr>
                            </form>
                            {{-- @foreach ($data as $item)
                    <tr>
                        <td class="text-center">{{$loop->index+1}}</td>
                        <td class="text-center">{{$item->book_date}}</td>
                        <td class="text-center">{{$item->customer->guest_name}}</td>
                        <td class="cell-action text-right"><i class="fas fa-exclamation-circle text-primary"></i></td>
                    </tr>
                @endforeach --}}
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
@endsection
