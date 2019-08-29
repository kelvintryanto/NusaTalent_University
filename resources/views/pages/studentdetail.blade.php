<meta name="_token" content="{{ csrf_token() }}"/>

@extends('layouts.generaltemplate')
@section('content')

<!-- Page Header -->
<div class="page-header">
	<!-- Navbar -->
	@include('includes.navbar')
	<!-- /Navbar -->

	<!-- Page Container -->
	<div class="page-container">

		<div class="nav-ah-1">
            <h5>
                <span class="title">Student Detail</span>
                <small class="display-block subtitle">Profile of the Student</small>
            </h5>
		</div>

		<div class="panel-card" style="flex-direction: column;">
			<div style="display: flex;">
				<div style="margin-right: 30px;">
					<img src="{{asset('assets/icons/nusatalent.png')}}" class="avatar-listjob">
				</div>

                <div style="display: flex; flex-direction: column; width: 100%;">
                    <div style="display: flex; justify-content: space-between; width: 95%;">
                        <h5 class="col-6">
                            <span class="title">{{$data["companyData"]->name}}</span>
                            <small class="display-block subtitle">Last Logged In : </small>
                        </h5>

                        <div>
                            <object>
                            <a type="button" href="/company/edit/{{$data["companyData"]->id}}" class="title linkHover">
                                <i class="fas fa-edit fa-lg"></i> Edit
                            </a>
                            </object>
                        </div>
                    </div>
                </div>
				{{-- <div class="col-lg-1 col-sm-1 col-md-1" style="margin-top: 50px;">
					<label class="text7" style="margin-top: 8px;">Event: </label>
				</div>
				<div class="col-lg-1 col-sm-2 col-md-2" style="margin-right: 5%; margin-top: 50px;">
					<select class="form-control text2 form-bottom" placeholder="Event" name="event">
						<option class="text2">Test</option>
					</select>
				</div>
				<div class="col-xl-1 col-lg-2 col-sm-3 col-md-2" style="margin-top: 50px;">
					<label class="text7" style="margin-top: 8px;">Booth&nbsp;Number: </label>
				</div>
				<div class="col-lg-1 col-sm-2 col-md-2" style="margin-right: 40px; margin-top: 50px;">
					<select class="form-control text2 form-bottom" placeholder="Booth Number" name="boothnumber">
						<option class="text2">Test</option>
					</select>
				</div> --}}

			</div>

			<div style="display: flex; margin-top: 30px;">
				<div style="margin-left: 13px;">
					<label class="text3">Profile</label>
				</div>
				<div class="flex-content" style="width: 100%; margin-left: 30px;">
					<div style="width: 95%;">
						<p class="text2 textareaAC" placeholder="Profile">{{$data["companyData"]->short_desc}}</p>
					</div>
					<div class="flex-content" style="margin-top: 20px;">
						<label class="text16">Website</label>
						<a href="//{{$data["companyData"]->website}}" class="text2" id="website" name="website" target="_blank" title="Click to open this Website"><i>{{$data["companyData"]->website}}</i></a>
					</div>
					<div class="flex-content" style="margin-top: 20px;">
						<label class="text16">Number of Employees</label>
						<p class="text2">{{$data["companyData"]->employees}}</p>
					</div>
					<div class="flex-content" style="margin-top: 20px;">
						<label class="text16">Industry</label>
						<p class="text2">{{$data["companyData"]->industry}}</p>
					</div>
					<div class="flex-content" style="margin-top: 20px;">
                        <label class="text16">LinkedIn</label>
                        @if(trim($data["companyData"]->linkedin) != "" || trim($data["companyData"]->linkedin) != "-")
                            <a href="//{{$data["companyData"]->linkedin}}" class="text2" id="linkedin" target="_blank" title="Click to open this Website"><i>{{$data["companyData"]->linkedin}}</i></a>
                        @else
						    <a class="text2" id="linkedin" target="_blank" title="Click to open this Website"><i>{{$data["companyData"]->linkedin}}</i></a>
                        @endif
                    </div>

                    <hr class="hr-1">
				</div>
			</div>

			<div style="display: flex; margin-top: 20px;">
				<div>
					<label class="text3">Location</label>
                </div>
                @if($data["companyData"]->address!=null || $data["companyData"]->address!="")
				<div class="flex-content" style="width: 100%; margin-left: 20px;">
                    <div>
                        <label class="text16">Address Name</label>
                        <p class="text2" id="addressname1" name="addressname1">name</p>
                    </div>

                    {{-- <div class="flex-content" style="margin-top: 20px;">
                        <div id="location">
                            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 row-setting12">
                                <label class="text16">Country</label>
                                <select class="form-control text2 form-bottom" placeholder="Country" name="country">
                                    <option class="text2">Indonesia</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 row-setting12" style="margin-left: 10px;">
                                <label class="text16">Province</label>
                                <select class="form-control text2 form-bottom" placeholder="Province" name="province" id="province">
                                        <option value="">Select province...</option>
                                        <option class="text2" value=""></option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 row-setting12" style="margin-left: 10px;">
                                <label class="text16">City</label>
                                <select class="form-control text2 form-bottom" placeholder="City" name="city" id="city">
                                    <option class="text2" value="">Select city...</option>
                                </select>
                            </div>
                        </div>
                    </div> --}}

                    <div style="margin-top: 20px;">
						<label class="text16">Company Address</label>

                        <p class="text2" id="companyaddress" name="companyaddress">{{$data["companyData"]->address}}</p>
                    </div>

                    <div style="margin-top: 20px;">
                        <span> <img src="{{asset('icon/location.png')}}"></span>
                        <a class="text2" href="www.google.co.id">Pin location from map</a>
                    </div>
                    <div style="margin-top: 10px;">
                        <iframe src="https://maps.google.com/maps?q=t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" class="stylemaps2" allowfullscreen style="width: 50%;"></iframe>
					</div>
					@endif
				</div>
			</div>

			<div style="display: flex; justify-content: flex-end;">
				<a href="/company"><button href="/company" class="btn-manage">Back</button></a>
			</div>
		</div>
	</div>
</div>
<!-- /Page Header -->
@endsection
