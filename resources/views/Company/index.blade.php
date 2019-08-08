@extends('layouts.generaltemplate')
@section('content')

<body>
    {!!$data['navbar']!!}
    <!-- Page Header -->
	<div class="page-header responsive">
		<!-- Navbar -->
        {{-- @include('includes.navbar') --}}

		<!-- /Navbar -->

        <!-- Page Container -->
        <div class="container">
            <div  class="row">
                <h1>Company Page</h1>

                <a href="/company/add-company-page">
                    <button class="btn btn-primary">
                        Add Company
                    </button>
                </a>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Website</th>
                    <th scope="col">Industry</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i = 1;
                    $u = 1;
                @endphp
                @foreach ($data['companyData'] as $comp)
                @php
                @endphp
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$comp->name}}</td>
                    <td>{{$comp->website}}</td>
                    <td>{{$comp->industry}}</td>
                </tr>
                @php
                    $i++;
                @endphp
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
<!-- /Page Header -->
<body>
@endsection
