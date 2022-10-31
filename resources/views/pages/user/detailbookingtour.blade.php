@section('title')Data Diri Tour @endsection
@extends('layout.users')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container py-5">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>Title</th>
                    <th>Guest Name</th>
                    <th>NIK</th>
                    <th>Nomor HP</th>
                    <th>Tipe</th>
                </tr>
            </thead>
            <tbody>
                <tr class="row-kamar">
                    <td class="fw-bolder bg-main" colspan="5">Kamar 1</td>
                </tr>
                <tr class="row-data">
                    <td class="text-end">Mr</td>
                    <td>Kevin</td>
                    <td class="text-center">1234567890</td>
                    <td class="text-center">08123456789</td>
                    <td class="text-center">Adult</td>
                </tr>
                <tr class="row-data">
                    <td class="text-end">Mrs</td>
                    <td>Larisa</td>
                    <td class="text-center">1234567891</td>
                    <td class="text-center">08123456789</td>
                    <td class="text-center">Adult</td>
                </tr>
                <tr class="row-data">
                    <td class="text-end">Mr</td>
                    <td>Jimmy</td>
                    <td class="text-center">1234567892</td>
                    <td class="text-center">08123456789</td>
                    <td class="text-center">Child</td>
                </tr>
                <tr class="row-kamar">
                    <td class="fw-bolder bg-main" colspan="5">Kamar 2</td>
                </tr>
                <tr class="row-data">
                    <td class="text-end">Mr</td>
                    <td>Kevin</td>
                    <td class="text-center">1234567890</td>
                    <td class="text-center">08123456789</td>
                    <td class="text-center">Adult</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
