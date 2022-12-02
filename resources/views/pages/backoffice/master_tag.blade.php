@extends('layout.admins')

@section('content')
@include('includes.datatables')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://unpkg.com/intro.js/minified/introjs.min.css">
<script src="https://unpkg.com/intro.js/minified/intro.min.js"></script>

<div class="container my-5">

	<div class="card col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="card-body">
			<header>
				<h3>Add New Tags</h3>
			</header>
			<hr style="margin: 1rem -1rem;" />
            <div id="add-tag">
                <form action="/backoffice/tag/create" method="post">
                    @csrf
                    <div class="mb-2">
                        <input type="text" class="form-control" name="name" placeholder="Name" >
                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-save">&nbsp;</i>Create</button>
                    </div>
                </form>
            </div>
			<hr style="margin: 1rem -1rem;" />
			<div class="table-responsive">
				<table class="table" id="table-tag"  style="width: 100%">
					<thead>
						<tr>
							<th style="width: 10%;">No.</th>
							<th style="width: 80%;">Tag Name </th>
							<th style="width: 10%;">Action</th>
						</tr>
					</thead>
					<tbody>
                        @foreach ($data as $item)
						<tr id="{{$item->id}}">
							<td>{{$loop->index+1}}</td>
							<td>
                                <p class="tag-name">{{$item->name}}</p>
                                <input class="input-tag-name" style="display: none" type="text" name="" value="{{$item->name}}"/>
                            </td>
							<td>
                                <div class="d-flex justify-content-evenly align-items-center" style="font-size: 1.25rem; padding: 2px 0;">
                                    <i class="fas fa-save text-success save-tag"></i>
                                    <i class="fas fa-trash text-danger delete-tag"></i>
                                </div>
                            </td>
						</tr>
                        @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script src="{{asset('js/backoffice/tag.js')}}"></script>
@endsection
