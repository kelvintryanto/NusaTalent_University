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
                    <span class="title">Company</span>
                    <small class="display-block subtitle">List of Company Partnership</small>
                </h5>

                <a href="/company/add-company" class="verticalCenter">
                    <button class="btn-add">Add Company Event</button>
                </a>
            </div>
        </div>
		<!-- Page Container -->

	</div>
<!-- /Page Header -->
</div>
@endsection
