@extends('layouts.generaltemplate')
@section('content')

<body>
<!-- Page Header -->
	<div class="page-header responsive">
		<!-- Navbar -->
        {{-- @include('includes.navbar') --}}
        {!!$data['navbar']!!}
		<!-- /Navbar -->

        <!-- Page Container -->
        <div class="container">
            <div  class="row">
                <h1>Company Page</h1>

                <button class="btn btn-primary">
                    Add Company
                </button>
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
            {{-- {{ $data['company']->links() }} --}}

        </div>



	</div>
<!-- /Page Header -->
<body>
@endsection
