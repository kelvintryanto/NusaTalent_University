@extends('layouts.generaltemplate')

@section('content')
<div style="margin-top: 110px; min-height:882px" class="page-container-event">
<!-- Page Header -->
	<div>
		<!-- Navbar -->
        {!!$data['navbar']!!}
        {!!$data['navbarEvent']!!}
		<!-- /Navbar -->

        <div class="page-container">
            <div class="nav-ah-1">
                <h5>
                    <span class="title">Dashboard</span>
                    <small class="display-block subtitle">Event List and Summary of Job Fair</small>
                </h5>
            </div>
        </div>
		<!-- Page Container -->

	</div>
<!-- /Page Header -->
</div>
@endsection
