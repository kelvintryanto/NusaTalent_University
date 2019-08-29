@extends('layouts.generaltemplate')
@section('content')

<body>
<!-- Page Header -->
	<div class="page-header bgdashboard responsive">
		<!-- Navbar -->
		@include('includes.navbar')
		<!-- /Navbar -->

        <!-- Page Container -->
        <div class="page-container bgdashboard">
            <div class="margin-dashboard1">
                <div class="row">
                    <label class="text18">welcome,</label>
                    <label class="text18">name</label>
                </div>
                <div class="row">
                    <label class="text2">Good to see you again!<br>Here are some things that happened while you were gone:</label>
                </div>
                <div class="row row-setting11">
                    <button class="btn-dashboardinterview">Interviews</button>
                    <button class="btn-dashboardactivity">Activities</button>
                </div>
            </div>
            {{-- /margin-dashboard1 --}}
        </div>
        {{-- /page-container --}}
	</div>
<!-- /Page Header -->
<body>
@endsection
