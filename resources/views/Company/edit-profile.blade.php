<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> Career Center - Edit Company Profile </title>
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
	{!!$data['css']!!}
	
	<link href="{{URL::to('assets/css/company-profile.css')}}" rel="stylesheet" type="text/css">

</head>

<body class="navbar-top">
	
	{!!$data['navbar']!!}
	
	<!-- Page container -->
	<div class="page-container no-padding">
	
		<!-- Page Content -->
		<div class="page-content bg-main-color">
			
			{!!$data['sidebar']!!}
			
			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">
					<!-- Page header -->
					<div class="page-header">
						<div class="page-header-content">
							<!-- Alert -->
							@if(\Session::has('success'))
							<div class="alert alert-success" id="alert" style="width: 35%;padding-left: 3%;">
								<a class="close" data-dismiss="alert">×</a>
								{!!Session::get('success')!!}
							</div>
							@elseif(\Session::has('failed'))
							<div class="alert alert-danger" id="alert" style="width: 35%;padding-left: 3%;">
								<a class="close" data-dismiss="alert">×</a>
								{!!Session::get('failed')!!}
							</div>
							@endif
							<!-- /alert -->
							<div class="page-title">
								<p class="no-margin">Company Profile</p>
								<h6>Please fill this in to help talents understand your company better.</h6>
							</div>
						</div>
					</div>
					<!-- /page header -->
					
			
					<!-- Form for edit company profile -->
					<div class="panel panel-white border-radius-30 panel-company-profile">
						<div class="panel-body">
							<form action="#" method="post" id="edit-profile-form" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="row">
									<div class="form-group">
										<div class="col-lg-4">
											<select class="select" name="cbBooth" id="cbBooth">
												<option value=""> Choose booth number: </option>
												@if(!empty($data['boothNumber']))
												<?php for($i = 1; $i <= 53; $i++){ ?>
													@if($i == $data['boothNumber'][0]->boothNumber)
													<option value="{{$i}}" selected> {!! $i !!} </option>
													@else
													<option value="{{$i}}"> {!! $i !!} </option>
													@endif
												<?php } ?>
												@else
												<?php for($i = 1; $i <= 53; $i++){ ?>
													<option value="{{$i}}"> {{$i}} </option>
												<?php } ?>
												@endif
											</select>
											<div class="alert alert-danger invalid" style="margin-top: 1%;">
												Booth number cannot be empty
											</div>
										</div>
									</div>
								</div>
								<div class="row" style="margin-top: 1%;">
									<div class="form-group">
										<div class="col-lg-6">
											<label> Company Logo <span class="text-danger">*</span></label>
											<img id="companyLogo" src="{!! Storage::disk('s3')->url('companies/photo/'.$data['companyData']->image_path); !!}" alt="Company logo" class="form-control company-logo" style="height: 250px;width: 400px;cursor: pointer;">
											<input type="hidden" id="txtOldPicture" name="txtOldPicture" value="{{$data['companyData']->image_path}}" ?>
											<input type="file" name="uploadImage" id="uploadImage" class="hidden">
											<input type="hidden" name="txtCompanyID" value="{{ $data['companyID'] }}">
											<input type="hidden" name="txtBoothID" value="{{ $data['boothNumber'][0]->boothID }}">
											<input type="hidden" name="txtBoothNumber" value="{{$data['boothNumber'][0]->boothNumber}}">
											<div class="alert alert-danger invalid" style="margin-top: 1%;">
											</div>
										</div>
									</div>
								</div>
								
								<div class="row" style="margin-top: 1%;">
									<div class="form-group">
										<div class="col-lg-12">
											<label>Company Name <span class="text-danger">*</span></label>
											<input type="text" name="txtCompanyName" id="txtCompanyName" class="form-control form-input" placeholder="Enter company name" value="{{$data['companyData']->name}}">
											<div class="alert alert-danger invalid" style="margin-top: 1%;">
												This field is required
											</div>
										</div>
									</div>
								</div>
								
								<div class="row" style="margin-top: 1%;">
									<div class="form-group">
										<div class="col-lg-12">
											<label>Company Website <span class="text-danger">*</span></label>
											<input type="text" name="txtCompanyWebsite" id="txtCompanyWebsite" class="form-control form-input" placeholder="Enter company website" value="{{$data['companyData']->website}}">
											<div class="alert alert-danger invalid" style="margin-top: 1%;">
												This field is required
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="margin-top: 1%;">
									<div class="form-group">
										<div class="col-lg-12">
											<label>Company Email <span class="text-danger">*</span></label>
											<input type="email" name="txtCompanyEmail" id="txtCompanyEmail" class="form-control" placeholder="Enter company email" value="{{$data['companyData']->email}}">
											<div class="alert alert-danger invalid" style="margin-top: 1%;">
												This field is required
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="margin-top: 1%;">
									<div class="form-group">
										<div class="col-lg-12">
											<label>Company Contact <span class="text-danger">*</span></label>
											<input type="text" name="txtCompanyContact" id="txtCompanyContact" class="form-control form-input contact" placeholder="Enter company contact" value="{{$data['companyData']->contact}}">
											<div class="alert alert-danger invalid" style="margin-top: 1%;">
												This field is required
											</div>
										</div>
									</div>
								</div>
								
								<div class="row" style="margin-top: 1%;">
									<div class="form-group">
										<div class="col-lg-12">
											<label>Company Location <span class="text-danger">*</span></label>
											<input type="text" name="txtCompanyLocation" id="txtCompanyLocation" class="form-control form-input" placeholder="Enter company name" value="{{$data['companyData']->location }}">
											<div class="alert alert-danger invalid" style="margin-top: 1%;">
												This field is required
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="margin-top: 1%">
									<div class="form-group">
										<div class="col-lg-12">
											<label>HR Name <span class="text-danger">*</span></label>
											<input type="text" name="txtCompanyHRName" id="txtCompanyHRName" class="form-control form-input" placeholder="Enter company contact" value="{{$data['companyData']->pic_hr}}">
											<div class="alert alert-danger invalid" style="margin-top: 1%;">
												This field is required
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="margin-top: 1%">
									<div class="form-group">
										<div class="col-lg-12">
											<label>HR Contact <span class="text-danger">*</span></label>
											<input type="text" name="txtCompanyHRContact" id="txtCompanyHRContact" class="form-control form-input contact" placeholder="Enter company contact" value="{{$data['companyData']->hr_contact}}">
											<div class="alert alert-danger invalid" style="margin-top: 1%;">
												This field is required
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="margin-top: 1%">
									<div class="form-group">
										<div class="col-lg-12">
											<label>HR Email <span class="text-danger">*</span></label>
											<input type="email" name="txtCompanyHREmail" id="txtCompanyHREmail" class="form-control" placeholder="Enter company contact" value="{{$data['companyData']->hr_email}}">
											<input type="hidden" name="txtCompanyHROldEmail" id="txtCompanyHROldEmail" class="form-control" placeholder="Enter company contact" value="{{$data['companyData']->hr_email}}">
											<div class="alert alert-danger invalid" style="margin-top: 1%;">
												This field is required
											</div>
										</div>
									</div>
								</div>
								<!-- /HR -->
								
								<div class="row" style="margin-top: 1%;">
									<div class="form-group">
										<div class="col-lg-12">
											<label>Industry <span class="text-danger">*</span></label>
											<input type="text" name="txtCompanyIndustry" id="txtCompanyIndustry" class="form-control form-input" placeholder="Enter company industry" value="{{$data['companyData']->industry}}">
											<div class="alert alert-danger invalid" style="margin-top: 1%;">
												This field is required
											</div>
										</div>
									</div>
								</div>
								
								<div class="row" style="margin-top: 1%;">
									<div class="form-group">
										<div class="col-lg-12">
											<label>LinkedIn</label>
											<input type="text" name="txtCompanyLinkedln" id="txtCompanyLinkedln" class="form-control form-input" placeholder="Enter company LinkedIn url" value="{{$data['companyData']->linkedin}}">
											<div class="alert alert-danger invalid" style="margin-top: 1%;">
												This field is required
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="margin-top: 1%;">
									<div class="form-group">
										<div class="col-lg-12">
										<label>Total Employee</label>
											<select name="cbTotalEmployee" id="cbTotalEmployee" data-placeholder="Number of employees" class="select text-nusatalent">
												<option></option>
												<option value="1" {{ $data['companyData']->employees == 1 ? "selected" : "" }}>Self-employed</option>
												<option value="2" {{ $data['companyData']->employees  == 2 ? "selected" : "" }}>1-10 employees</option>
												<option value="3" {{ $data['companyData']->employees  == 3 ? "selected" : "" }}>11-50 employees</option>
												<option value="4" {{ $data['companyData']->employees  == 4 ? "selected" : "" }}>51-200 employees</option>
												<option value="5" {{ $data['companyData']->employees  == 5 ? "selected" : "" }}>201-500 employees</option>
												<option value="6" {{ $data['companyData']->employees  == 6 ? "selected" : "" }}>501-1000 employees</option>
												<option value="7" {{ $data['companyData']->employees  == 7 ? "selected" : "" }}>1001-5000 employees</option>
												<option value="8" {{ $data['companyData']->employees  == 8 ? "selected" : "" }}>5001-10.000 employees</option>
												<option value="9" {{ $data['companyData']->employees  == 9 ? "selected" : "" }}>10.001+ employees</option>
											</select>
											<div class="alert alert-danger invalid" style="margin-top: 1%;">
												Choose one of total employee company have
											</div>
										</div>
									</div>
								</div>
								
								<div class="row" style="margin-top: 1%;">
									<div class="form-group">
										<div class="col-lg-12">
											<label>Headquarters Address <span class="text-danger">*</span></label>
											<textarea rows="5" cols="5" name="txtCompanyAddress" id="txtCompanyAddress" class="form-control form-area" placeholder="Enter headquarters address">{{$data['companyData']->address }}</textarea>
											<div class="alert alert-danger invalid" style="margin-top: 1%;">
												This field is required
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="margin-top: 1%;">
									<div class="form-group">
										<div class="col-lg-12">
											<label>Description <span class="text-danger">*</span></label>
											<textarea rows="5" cols="5" name="txtCompanyDescription" id="txtCompanyDescription" class="form-control form-area" placeholder="Enter company description">{{$data['companyData']->overview }}</textarea>
											<div class="alert alert-danger invalid" style="margin-top: 1%;">
												This field is required
											</div>
										</div>
									</div>
								</div>
								
								<div class="row" style="margin-top: 1%;">
									<div class="form-group">
										<div class="col-lg-12">
											<label>Why Talent should join this company? <span class="text-danger">*</span></label>
											<textarea rows="5" cols="5" name="txtCompanyReasons" id="txtCompanyReasons" class="form-control form-area" placeholder="Tell talents why they should join your company">{{$data['companyData']->reason}}</textarea>
											<div class="alert alert-danger invalid" style="margin-top: 1%;">
												This field is required
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="margin-top: 1%;">
									<div class="col-lg-5 col-lg-offset-3">
										<button type="submit" id="edit-profile-button" class="btn bg-nusatalent btn-rounded max-width text-bold text-white">SUBMIT</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- /form for edit company profile -->
				</div>
				<!-- /content area -->
			</div>
			<!-- /main content -->

        </div>
		<!-- /page content -->
    </div>
	<!-- /page container -->

	<?php echo $data['js']; ?>
	<script type="text/javascript" src="{{ url('assets/js/validation-template.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/js/add-company-validation.js') }}"></script>
    <script type="text/javascript">
    	$(function(){

    		$("#edit-profile-button").on("click", function(e){
				e.preventDefault();

				let name_valid = 
					email_valid = 
					contact_valid = 
					website_valid = 
					industry_valid = 
					image_valid =
					address_valid = 
					desc_valid = 
					reasons_valid = 
					booth_valid = 
					total_employee_valid = 
					hr_name_valid = 
					hr_contact_valid = 
					hr_email_valid = 
					location_valid = 
					website_valid = false;

				const booth          = $("#cbBooth").val();
				const totalEmployee  = $("#cbTotalEmployee").val();
				const name           = $('#txtCompanyName').val();
				const location       = $("#txtCompanyLocation").val()
				const email          = $('#txtCompanyEmail').val();
				const contact        = $('#txtCompanyContact').val();
				const website        = $('#txtCompanyWebsite').val();
				const industry       = $('#txtCompanyIndustry').val();
				const linkedin       = $('#txtCompanyLinkedln').val();
				const total_employee = $('#cbTotalEmployee option:selected').val();
				const address        = $('#txtCompanyAddress').val();
				const desc           = $('#txtCompanyDescription').val();
				const reasons        = $('#txtCompanyReasons').val();
				const hrName         =	$("#txtCompanyHRName").val();
				const hrContact      = $("#txtCompanyHRContact").val();
				const hrEmail        = $("#txtCompanyHREmail").val();
				
				if (booth != "") {
					booth_valid = true;
					$('#cbBooth').next("span").children().children().removeClass("border-red");
					$("#cbBooth").parent().find('.invalid').css('display', 'none');
				} else {
					booth_valid = false;
					$('#cbBooth').next("span").children().children().addClass("border-red");
					$("#cbBooth").parent().find('.invalid').css('display', 'block');
				}

				if (location != "") {
					location_valid = true;
					$('#txtCompanyLocation').removeClass('border-red');
					$("#txtCompanyLocation").parent().find('.invalid').css('display', 'none');
				} else {
					location_valid = false;
					$('#txtCompanyLocation').addClass('border-red');
					$("#txtCompanyLocation").parent().find('.invalid').css('display', 'block');
				}

				if (totalEmployee != "") {
					total_employee_valid = true;
					$('#cbTotalEmployee').next("span").children().children().removeClass("border-red");
					$("#cbTotalEmployee").parent().find('.invalid').css('display', 'none');
				} else {
					total_employee_valid = false;
					$('#cbTotalEmployee').next("span").children().children().addClass("border-red");
					$("#cbTotalEmployee").parent().find('.invalid').css('display', 'block');
				}

				if (name != "") {
					name_valid = true;
					$('#txtCompanyName').removeClass('border-red');
					$("#txtCompanyName").parent().find('.invalid').css('display', 'none');
				} else {
					name_valid = false;
					$('#txtCompanyName').addClass('border-red');
					$("#txtCompanyName").parent().find('.invalid').css('display', 'block');
				}

				if (email != "") {
					email_valid = true;
					$('#txtCompanyEmail').removeClass('border-red');
					$("#txtCompanyEmail").parent().find('.invalid').css('display', 'none');
				} else {
					email_valid = false;
					$('#txtCompanyEmail').addClass('border-red');
					$("#txtCompanyEmail").parent().find('.invalid').css('display', 'block');
				}

				if (contact != "") {
					contact_valid = true;
					$('#txtCompanyContact').removeClass('border-red');
					$("#txtCompanyContact").parent().find('.invalid').css('display', 'none');
				} else {
					contact_valid = false;
					$('#txtCompanyContact').addClass('border-red');
					$("#txtCompanyContact").parent().find('.invalid').css('display', 'block');
				}

				if (website != "") {
					website_valid = true;
					$('#txtCompanyWebsite').removeClass('border-red');
					$("#txtCompanyWebsite").parent().find('.invalid').css('display', 'none');
				} else {
					website_valid = false;
					$('#txtCompanyWebsite').addClass('border-red');
					$("#txtCompanyWebsite").parent().find('.invalid').css('display', 'block');
				}

				if (industry != "") {
					industry_valid = true;
					$('#txtCompanyIndustry').removeClass('border-red');
					$("#txtCompanyIndustry").parent().find('.invalid').css('display', 'none');
				} else {
					industry_valid = false;
					$('#txtCompanyIndustry').addClass('border-red');
					$("#txtCompanyIndustry").parent().find('.invalid').css('display', 'block');
				}

				if (address != "") {
					address_valid = true;
					$('#txtCompanyAddress').removeClass('border-red');
					$("#txtCompanyAddress").parent().find('.invalid').css('display', 'none');
				} else {
					address_valid = false;
					$('#txtCompanyAddress').addClass('border-red');
					$("#txtCompanyAddress").parent().find('.invalid').css('display', 'block');
				}

				if (desc != "") {
					desc_valid = true;
					$('#txtCompanyDescription').removeClass('border-red');
					$("#txtCompanyDescription").parent().find('.invalid').css('display', 'none');
				} else {
					desc_valid = false;
					$('#txtCompanyDescription').addClass('border-red');
					$("#txtCompanyDescription").parent().find('.invalid').css('display', 'block');
				}

				if (reasons != "") {
					reasons_valid = true;
					$('#txtCompanyReasons').removeClass('border-red');
					$("#txtCompanyReasons").parent().find('.invalid').css('display', 'none');
				} else {
					reasons_valid = false;
					$('#txtCompanyReasons').addClass('border-red');
					$("#txtCompanyReasons").parent().find('.invalid').css('display', 'block');
				}

				if (hrName != "") {
					hr_name_valid = true;
					$('#txtCompanyHRName').removeClass('border-red');
					$("#txtCompanyHRName").parent().find('.invalid').css('display', 'none');
				} else {
					hr_name_valid = false;
					$('#txtCompanyHRName').addClass('border-red');
					$("#txtCompanyHRName").parent().find('.invalid').css('display', 'block');
				}

				if (hrContact != "") {
					hr_contact_valid = true;
					$('#txtCompanyHRContact').removeClass('border-red');
					$("#txtCompanyHRContact").parent().find('.invalid').css('display', 'none');
				} else {
					hr_contact_valid = false;
					$('#txtCompanyHRContact').addClass('border-red');
					$("#txtCompanyHRContact").parent().find('.invalid').css('display', 'block');
				}

				if (hrEmail != "") {
					hr_email_valid = true;
					$('#txtCompanyHREmail').removeClass('border-red');
					$("#txtCompanyHREmail").parent().find('.invalid').css('display', 'none');			
				} else {
					hr_email_valid = false;
					$('#txtCompanyHREmail').addClass('border-red');
					$("#txtCompanyHREmail").parent().find('.invalid').css('display', 'block');
				}

				if (name_valid && email_valid && contact_valid && website_valid && industry_valid && 
					address_valid && desc_valid && reasons_valid && booth_valid && total_employee_valid && hr_name_valid && hr_email_valid && hr_contact_valid) 
				{
					swal(
						{
							title: "Are you sure",
							text: "You're going to edit <b>" + name + " ?",
							type: "warning",
							showCancelButton: true,
				            html: true,
				            confirmButtonColor: "#F44336",
				            confirmButtonText: "Submit !",
				            closeOnConfirm: false,
				            showLoaderOnConfirm: true
						}, 
						function(isConfirm){
							if(!isConfirm)
								return false;
							$.ajax({
								type: "post",
								url: '/update-profile',
								data: new FormData($("#edit-profile-form")[0]),
								dataType: "json",
			    				processData: false,
			    				contentType: false,
								success: function(resp) {
									if(resp)
				        			{
						                swal({
								            title: "Successfully Update Company Profile!",
								            html: true,
								            confirmButtonColor: "#FF0000",
								            confirmButtonText: "OK",
								            closeOnConfirm: false,
		                                    closeOnCancel: false,
								            type: "success"
						                },
								            function(isConfirm) {
								                if(isConfirm)
								                    window.location = "/Company/list-company";
								            }
								        );
				        			}
				        			else
				        			{
				        				setTimeout(function() {
							                swal({
							                	title: "Failed updating company profile!",
							                	type: "error",
							                    title: "Failed !",
							                    confirmButtonColor: "#EF5350",
							                    timer: 2000
							                });
						          	 	}, 2000);
				        			}
								},
								error: function(msg) {
									setTimeout(function() {
						                swal({
						                	title: "Whoops, Something happened!",
						                	type: "error",
						                    title: "Failed !",
						                    confirmButtonColor: "#EF5350",
						                    timer: 2000
						                });
					          	 	}, 2000);
								}
							});
						}
					);
				}
    		});

    	})

    </script>

	  

</body>

</html>