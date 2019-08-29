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
			<div class="page-title">
				<h5>
					<span class="title">Edit Company</span>
					<small class="display-block subtitle">Lorem ipsum dolor sit amet,<br>consectetur adipiscing elit.</small>
				</h5>
			</div>
		</div>

		<div class="panel-card" style="flex-direction: column;">
			<div style="display: flex;">
				<div style="margin-right: 30px;">
					<img src="{{asset('assets/icons/nusatalent.png')}}" class="avatar-listjob">
				</div>

				<div class="col-lg-6 col-sm-5 col-md-6" style="margin-right: 5%; margin-top: 50px;">
					<input type="text" class="form-control text2 form-bottom" id="companyname" placeholder="Company Name" name="companyname" value="{{$data["companyData"]->name}}">
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
						<textarea class="text2 textareaAC" style="overflow:auto;height: 100px !important; width: 100%;" onkeyup="textAreaAdjust(this)" placeholder="Profile">{{$data["companyData"]->short_desc}}</textarea>
					</div>
					<div class="flex-content" style="margin-top: 20px;">
						<label class="text16">Website</label>
						<input type="text" class="form-control text2 form-bottom" id="website" placeholder="Website" name="website" style="width: 50%;" value="{{$data["companyData"]->website}}">
					</div>
					{{-- <div class="flex-content" style="margin-top: 20px;">
						<label class="text16">Number of Employees</label>
						<select type="text" class="form-control text2 form-bottom" id="numberofemployees" placeholder="Number of Employees" name="numberofemployees" style="width: 10%;">
							<option class="text2">100 - 300</option>
						</select>
					</div> --}}
					<div class="flex-content" style="margin-top: 20px;">
						<label class="text16">Industry</label>
						<select type="text" class="form-control text2 form-bottom" id="industry" placeholder="Industry" name="industry" style="width: 25%;">
							<option class="text2" value="">Select Industry...</option>
							@foreach($data['industry'] as $industry)
								@if(strtolower($data["companyData"]->industry) == strtolower($industry->description)){
									<option class="text2" value="{{$industry->id}}" selected>{{$industry->description}}</option>
								}
								@else{
									<option class="text2" value="{{$industry->id}}">{{$industry->description}}</option>
								}
								@endif								
							@endforeach
						</select>
					</div>
					<div class="flex-content" style="margin-top: 20px;">
						<label class="text16">LinkedIn</label>
						<input type="text17" class="form-control text2 form-bottom" id="linkedin" placeholder="LinkedIn" name="linkedin" style="width: 50%;" value="{{$data["companyData"]->linkedin}}">
					</div>

					<div class="flex-content" style="width: 50%;">
						<hr class="hr-1">
					</div>
				</div>
			</div>

			<div style="display: flex; margin-top: 20px;">
				<div>
					<label class="text3">Location</label>
				</div>
				<div class="flex-content" style="width: 100%; margin-left: 20px;">
					<form>
						<div>
	                    	<label class="text16">Address Name</label>
							<input type="text" class="form-control text2 form-bottom" id="addressname1" placeholder="Ex : Headquarter, Main Office, etc" name="addressname1" style="width: 50%;" value="{{$data["companyData"]->addressName}}">
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
                                        @foreach($data['province'] as $province)
                                            <option class="text2" value="{{$province->id}}">{{$province->name}}</option>
                                        @endforeach
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
							<input type="text" class="form-control text2 form-bottom" id="companyaddress" placeholder="Company Address" name="companyaddress" style="width: 50%;" value="{{$data["companyData"]->address}}">
		                </div>

						<div style="margin-top: 20px;">
		                    <span> <img src="{{asset('icon/location.png')}}"></span>
	                        <a class="text2" href="www.google.co.id">Pin location from map</a>
		                </div>
		                <div style="margin-top: 10px;">
		                	<iframe src="https://maps.google.com/maps?q=t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"class="stylemaps2" allowfullscreen style="width: 50%;"></iframe>
		                </div>
	           		</form>

	                {{-- <form>
						<div class="flex-title" style="width: 50%; margin-top: 40px;">
	                    	<label class="text16">Branch Address Name</label>
	                    	<a class="text2" href="" style="float: right;"> <i class="far fa-trash-alt"></i> Delete Address</a>
	                    </div>
	                    <div>
							<input type="text" class="form-control text2 form-bottom" id="branchname" placeholder="Branch Address Name" name="branchname" style="width: 50%;">
	               	 	</div>

						<div class="flex-content" style="margin-top: 20px;">
							<div id="location">
								<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 row-setting12">
									<label class="text16">Country</label>
									<select class="form-control text2 form-bottom" placeholder="Country" name="country">
										<option class="text2">Indonesia</option>
									</select>
								</div>
								<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 row-setting12" style="margin-left: 10px;">
									<label class="text16">Province</label>
									<select class="form-control text2 form-bottom" placeholder="Province" name="province">
										<option class="text2">Test</option>
									</select>
								</div>
								<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 row-setting12" style="margin-left: 10px;">
									<label class="text16">City</label>
									<select class="form-control text2 form-bottom" placeholder="Country" name="country">
										<option class="text2">Select City...</option>
									</select>
								</div>
							</div>
						</div>

						<div style="margin-top: 20px;">
		                    <label class="text16">Company Address</label>
							<input type="text" class="form-control text2 form-bottom" id="companyaddress" placeholder="Company Address" name="companyaddress" style="width: 50%;">
		                </div>

						<div style="margin-top: 20px;">
		                    <span> <img src="{{asset('icon/location.png')}}"/></span>
	                        <a class="text2" href="www.google.co.id">Pin location from map</a>
		                </div>
		                <div style="margin-top: 10px;">
		                	<iframe src="https://maps.google.com/maps?q=t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"class="stylemaps2" allowfullscreen style="width: 50%;"></iframe>
		                </div>
	           		</form> --}}

	           		{{-- <form>
						<div class="flex-title" style="width: 50%; margin-top: 40px;">
	                    	<label class="text16">Branch Address Name</label>
	                    	<a class="text2" href="" style="float: right;"> <i class="far fa-trash-alt"></i> Delete Address</a>
	                    </div>
	                    <div>
							<input type="text" class="form-control text2 form-bottom" id="branchname" placeholder="Branch Address Name" name="branchname" style="width: 50%;">
	               	 	</div>

						<div class="flex-content" style="margin-top: 20px;">
							<div id="location">
								<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 row-setting12">
									<label class="text16">Country</label>
									<select class="form-control text2 form-bottom" placeholder="Country" name="country">
										<option class="text2">Test</option>
									</select>
								</div>
								<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 row-setting12" style="margin-left: 10px;">
									<label class="text16">Province</label>
									<select class="form-control text2 form-bottom" placeholder="Province" name="province">
										<option class="text2">Test</option>
									</select>
								</div>
								<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 row-setting12" style="margin-left: 10px;">
									<label class="text16">City</label>
									<select class="form-control text2 form-bottom" placeholder="city" name="city" id="city">
										<option class="text2">Test</option>
									</select>
								</div>
							</div>
                        </div>
                        {{ csrf_field() }}

						<div style="margin-top: 20px;">
		                    <label class="text16">Company Address</label>
							<input type="text" class="form-control text2 form-bottom" id="companyaddress" placeholder="Company Address" name="companyaddress" style="width: 50%;">
		                </div>

						<div style="margin-top: 20px;">
		                    <span> <img src="{{asset('icon/location.png')}}"/></span>
	                        <a class="text2" href="www.google.co.id">Pin location from map</a>
		                </div>
		                <div style="margin-top: 10px;">
		                	<iframe src="https://maps.google.com/maps?q=t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"class="stylemaps2" allowfullscreen style="width: 50%;"></iframe>
		                </div>
	           		</form> --}}

	           		<div class="row row-setting6 row-setting10">
						<a href="" class="text2"><i class="fas fa-plus-circle fa-lg" style="margin-right: 20px;"></i>Add More</a>
					</div>

				</div>
			</div>

			<div style="display: flex; justify-content: flex-end;">
				<button class="btn-manage">Save Changes</button>
			</div>


		</div>

	</div>
</div>
<!-- /Page Header -->
@endsection
