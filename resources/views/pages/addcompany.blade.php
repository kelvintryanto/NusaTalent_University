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
					<span class="title">Add Company</span>
					<small class="display-block subtitle">Add University Partnership with Company</small>
				</h5>
			</div>
		</div>

        <div class="panel-card" style="flex-direction: column;">
            <form method="get" action="/company/addCompanyRegular">
                {{ csrf_field() }}
            <div style="display: flex;">
				<div style="margin-right: 30px;">
					<img src="{{asset('assets/icons/nusatalent.png')}}" class="avatar-listjob">
				</div>

				<div class="col-lg-6 col-sm-5 col-md-6" style="margin-right: 5%; margin-top: 50px;">
					<input type="text" class="form-control text2 form-bottom" id="companyName" placeholder="Company Name" name="companyName">
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
						<textarea class="text2 textareaAC" style="overflow:auto;height: 100px !important; width: 100%; padding: 8px;" onkeyup="textAreaAdjust(this)" placeholder="Description of this company... " name="companyShortdesc"></textarea>
					</div>
					<div class="flex-content" style="margin-top: 20px;">
						<label class="text16">Website</label>
						<input type="text" class="form-control text2 form-bottom" id="companyWebsite" placeholder="Ex: https://www.google.com" name="companyWebsite" style="width: 50%;">
					</div>
					<div class="flex-content" style="margin-top: 20px;">
						<label class="text16">Number of Employees</label>
						<select type="text" class="form-control text2 form-bottom" id="companyEmployees" placeholder="Number of Employees" name="companyEmployees" style="width: 50%;">
							<option class="text2" value="">Select Number of Employee...</option>
							@foreach($data['totalEmployee'] as $employee)
								<option class="text2" value="{{$employee->description}}">{{$employee->description}}	</option>
							@endforeach
						</select>
					</div>
					<div class="flex-content" style="margin-top: 20px;">
						<label class="text16">Industry</label>
						<select type="text" class="form-control text2 form-bottom" id="companyIndustry" placeholder="Industry" name="companyIndustry" style="width: 25%;">
							<option class="text2" value="">Select Industry...</option>
							@foreach($data['industry'] as $industry)
								<option class="text2" value="{{$industry->description}}">{{$industry->description}}</option>
							@endforeach
						</select>
					</div>
					<div class="flex-content" style="margin-top: 20px;">
						<label class="text16">LinkedIn</label>
						<input type="text17" class="form-control text2 form-bottom" id="companyLinkedin" placeholder="LinkedIn" name="companyLinkedin" style="width: 50%;">
					</div>

					<div class="flex-content" style="width: 50%;">
						<hr class="hr-1">
					</div>
                </div>
            </div>
            <div style="display: flex; justify-content: flex-end;">
                <button type="submit" class="btn-manage">Save Changes</button>
            </div>
            </form>
            {{-- end of form company-form --}}
			<div style="display: flex; margin-top: 20px;">
				<div>
					<label class="text3">Location</label>
				</div>
				<div class="flex-content" style="width: 100%; margin-left: 20px;">
					<form>
						<div>
	                    	<label class="text16">Address Name</label>
							<input type="text" class="form-control text2 form-bottom" id="headquartername" placeholder="Headquarter Address Name" name="headquartername" style="width: 50%;">
	               	 	</div>

						{{-- <div class="flex-content" style="margin-top: 20px;">
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
									<select class="form-control text2 form-bottom" placeholder="Country" name="country">
										<option class="text2">Test</option>
									</select>
								</div>
							</div>
						</div> --}}

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
	           		</form>

	                <form>
						<div class="flex-title" style="width: 50%; margin-top: 40px;">
	                    	<label class="text16">Branch Address Name</label>
	                    	<a class="text2" href="" style="float: right;"> <i class="far fa-trash-alt"></i> Delete Address</a>
	                    </div>
	                    <div>
							<input type="text" class="form-control text2 form-bottom" id="branchname" placeholder="Branch Address Name" name="branchname" style="width: 50%;">
	               	 	</div>

						{{-- <div class="flex-content" style="margin-top: 20px;">
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
									<select class="form-control text2 form-bottom" placeholder="Country" name="country">
										<option class="text2">Test</option>
									</select>
								</div>
							</div>
						</div> --}}

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
	           		</form>

	           		<form>
						<div class="flex-title" style="width: 50%; margin-top: 40px;">
	                    	<label class="text16">Branch Address Name</label>
	                    	<a class="text2" href="" style="float: right;"> <i class="far fa-trash-alt"></i> Delete Address</a>
	                    </div>
	                    <div>
							<input type="text" class="form-control text2 form-bottom" id="branchname" placeholder="Branch Address Name" name="branchname" style="width: 50%;">
	               	 	</div>

						{{-- <div class="flex-content" style="margin-top: 20px;">
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
									<select class="form-control text2 form-bottom" placeholder="Country" name="country">
										<option class="text2">Test</option>
									</select>
								</div>
							</div>
						</div> --}}

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
	           		</form>

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
