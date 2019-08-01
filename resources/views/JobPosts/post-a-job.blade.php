<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> Career Center - Post a Job </title>
	{!!$data['css']!!}
</head>
<body class="navbar-top">

	<!-- Navbar -->
    <?php echo $data['navbar']; ?>
	<!-- /navbar -->
	
	<!-- Page container -->
	<div class="page-container no-padding">
		<!-- Page Content -->
		<div class="page-content bg-main-color">
		
			<?php echo $data['sidebar']; ?>
			
			<!-- Main content -->
			<div class="content-fluid">

					<!-- Company partnership exists -->
					<div class="content">
						@if($data['companyPartnership'])
						<!-- Page header -->

						<div class="page-header">
							<div class="page-header-content">
								<div class="page-title">
									<p class="no-margin">
										<i class="material-icons position-left">add_circle_outline</i>Post a Job
									</p>
									<h6>Please describe every details about the job you're about to post</h6>							
								</div>
							</div>
						</div>				
						<!-- /page header -->
						<!-- Form for posting job -->
						<div class="panel panel-white border-radius-30">
							<div class="panel-body">
								<select class="select" id="cbCompanyPartnership">
									<option value=""> Choose your company partnership </option>
									@foreach($data['lstCompany'] as $row)
									<option value="{{$row->companyID}}"> {{$row->companyName}} </option>
									@endforeach
								</select>
								<form action="#" method="post" id="create-job-post-form" enctype="multipart/form-data" style="display: none;">
									{{ csrf_field() }}
									<div class="form-group" style="margin-top: 2%;">
										<label>Job Position 
											<span class="text-danger">*</span>
										</label>	
										<input type="hidden" name="txtCompanyID" id="txtCompanyID" value="">		
										<input type="text" name="job_position" class="form-control form-input" placeholder="Enter job title, ex. Content Developer">
										<div class="alert alert-danger invalid" style="margin-top: 1%;">
											This field is required
										</div>
									</div>								
									<div class="form-group">									
										<label>Working Location 
											<span class="text-danger">*</span>
										</label>					
										<input type="text" name="work_location" class="form-control form-input" placeholder="City or state, ex. Kuningan, Jakarta Selatan">
										<div class="alert alert-danger invalid" style="margin-top: 1%;">
											This field is required
										</div>
									</div>
									<div class="form-group">									
										<label>Job Category 
											<span class="text-danger">*</span>
										</label>
										<select data-placeholder="Select job category" name="job_category" class="select-search">
											<option></option>
											@if ($data['lstCategory'])
												@foreach($data['lstCategory'] as $row)
												<option value="{{ $row->categoryID }}"> {{ $row->categoryName }} </option>
												@endforeach
											@endif
										</select>
										<div class="alert alert-danger invalid" style="margin-top: 1%;">
											Job category cannot be empty
										</div>
									</div>								
								
									<div class="form-group">			
										<label> Talents Needed 
											<span class="text-danger">*</span>
										</label>			
										<input type="text" name="talent_needed" class="form-control form-input contact" placeholder="Enter talents needed">	
										<div class="alert alert-danger invalid" style="margin-top: 1%;">
											This field is required
										</div>						
									</div>
									
									<div class="form-group">									
										<label class="display-block text-semibold">
											Job Descriptions 
											<span class="text-danger">*</span>
										</label>
										
										<ul class="list-group no-padding" id="list_job_desc">
										</ul>

										<textarea type="text" class="form-control" placeholder="press ENTER to add new" name="txtJobDesc" id="txtJobDesc"></textarea>
										<input type="hidden" name="job_description" id="job_description"/>
										<div class="alert alert-danger invalid" style="margin-top: 1%;">
											This field is required
										</div>
									</div>
									
									<div class="form-group">									
										<label class="display-block text-semibold"> Job Requirements 
											<span class="text-danger">*</span>
										</label>	
										
										<ul class="list-group no-padding" id="list_job_req">
										</ul>

										<textarea type="text" class="form-control" placeholder="press ENTER to add new" name="txtJobReq" id="txtJobReq"></textarea>
										<input type="hidden" name="job_requirement" id="job_requirement"/>
										<div class="alert alert-danger invalid" style="margin-top: 1%;">
											This field is required
										</div>
									</div>

									<div class="form-group">									
										<label class="display-block text-semibold">
											Benefits 
											<span class="text-danger">*</span>
										</label>
										
										<ul class="list-group no-padding" id="list_benefits">
										</ul>

										<textarea type="text" class="form-control" placeholder="press ENTER to add new" name="txtEmployeeBenefit" id="txtEmployeeBenefit"></textarea>
										<input type="hidden" name="employee_benefit" id="employee_benefit"/>
										<div class="alert alert-danger invalid" style="margin-top: 1%;">
											This field is required
										</div>
									</div>

									<div class="form-group">									
										<label class="display-block text-semibold">
											Skills Needed 
											<span class="text-danger">*</span>
										</label>
										
										<ul class="list-group no-padding" id="list_skills">
										</ul>

										<textarea type="text" class="form-control" placeholder="press ENTER to add new" name="txtSpecialSkill" id="txtSpecialSkill"></textarea>
										<input type="hidden" name="special_skill" id="special_skill"/>
										<div class="alert alert-danger invalid" style="margin-top: 1%;">
											This field is required
										</div>
									</div>					
									
									<div class="form-group">									
										<label>Career Path </label>									
										<input type="text" name="career_path" class="form-control" placeholder="Enter career path, ex. Lead Developer">		
									</div>								
									
									<div class="form-group">									
										<label>Working Hours 
											<span class="text-danger">*</span>
										</label>									
										<input type="text" name="work_hours" class="form-control form-input" placeholder="Enter working hours, ex. Senin - Jumat 09.00 - 18.00">
										<div class="alert alert-danger invalid" style="margin-top: 1%;">
											This field is required
										</div>
									</div>								
									
									<div class="form-group">									
										<label>Probation Period 
											<span class="text-danger">*</span>
										</label>									
										<input type="text" name="probation_period" class="form-control form-input" placeholder="Enter probation period, ex. 3 - 4 Bulan">	
										<div class="alert alert-danger invalid" style="margin-top: 1%;">
											This field is required
										</div>						
									</div>

									<div class="form-group">									
										<label>Salary</label>																		
										<div class="row">										
											<div class="col-lg-4">											
												<div class="input-group">												
													<span class="input-group-addon">Rp</span>												
													<input type="text" name="salary_min" class="form-control txtSalaryMin" placeholder="Enter min salary, ex. 5.000.000">											
												</div>										
											</div>			

											<div class="col-lg-1 text-center" style="padding-top: 7px;">											
												<span>to</span>										
											</div>																				
											
											<div class="col-lg-4">											
												<div class="input-group">												
													<span class="input-group-addon">Rp</span>												
													<input type="text" name="salary_max" class="form-control txtSalaryMax" placeholder="Enter max salary, ex. 10.000.000">											
												</div>										
											</div>									
										</div>								
									</div>
									<div class="form-group">
										<button type="submit" id="review-job-post-button" class="btn bg-nusatalent btn-rounded max-width text-bold text-white">REVIEW JOB POST</button>
									</div>
								</form>
							</div>
						</div>					
						<!-- /form for posting job -->															
							
						<!-- Flash Message -->					
						<div class="row">
							@if (\Session::has('success'))						
								<div class="alert alert-success" id="alert" style="margin-left: 164px;margin-top: 55px;">							
									<a class="close" data-dismiss="alert">×</a>							
									{!!Session::get('success')!!}						
								</div>						
								
								<script>							
									setTimeout(function(){								
										$('#alert').fadeOut('slow');							
									}, 2000);						
								</script>						
							@endif					
								
							@if (\Session::has('failed'))						
								<div class="alert alert-danger" id="alert" style="margin-left: 164px;margin-top: 55px;">							
									<a class="close" data-dismiss="alert">×</a>							
									{!!Session::get('failed')!!}						
								</div>						
								
								<script>							
									setTimeout(function(){								
										$('#alert').fadeOut('slow');							
									}, 2000);						
								</script>							
							@endif					
						</div>					
						<!-- /Flash Message -->

						<!-- /company exists -->

						@else

						<!-- No company partnership -->

						<div class="page-header">
							<div class="page-header-content">
								<div class="page-title">
									<div class="container" style="text-align: center;margin-bottom: 2%;">
										<img src="{{ url('assets/icons/cross-icon.png') }}"
												style="width: 15%;">
									</div>	
									<p class="no-margin">
										<span class="text-danger-800"> You've no company partnership to post a job. </span>
									</p>
									<h3 style="color: #ffae42">First!, Insert 
										<a href="/Company/add-company-page"> 
											<b> <u> your partnership with company </u> </b> 
										</a> to enable job post </h3>							
								</div>
							</div>
						</div>

						<!-- /no company -->
						@endif
					</div>
					<!-- /review job post -->
			</div>			
			<!-- /main content -->
        </div>		
		<!-- /page content -->
    </div>	
	<!-- /page container -->	
		
	<!-- Review Job Post -->
	<div id="review_job_post_modal" class="modal fade" role="dialog" aria-labelledby="review_job_post_modal_title">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title" id="review_job_post_modal_title">Review Job Post</h5>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<label class="text-bold">Job Position:</label>
						<div class="form-control-static" id="modal_review_job_position"></div>
					</div>

					<div class="form-group">
						<label class="text-bold">Working Location:</label>
						<div class="form-control-static" id="modal_review_work_location"></div>
					</div>

					<div class="form-group">
						<label class="text-bold">Job Category:</label>
						<div class="form-control-static" id="modal_review_job_category"></div>
					</div>

					<div class="form-group">
						<label class="text-bold">Talents Needed:</label>
						<div class="form-control-static" id="modal_review_talent_needed"></div>
					</div>

					<div class="form-group">
						<label class="text-bold">Job Description:</label>
						<div class="form-control-static">
							<ul class="no-padding" id="modal_review_list_job_desc">
							</ul>
						</div>
					</div>

					<div class="form-group">
						<label class="text-bold">Job Requirement:</label>
						<div class="form-control-static">
							<ul class="no-padding" id="modal_review_list_job_req">
							</ul>
						</div>
					</div>

					<div class="form-group">
						<label class="text-bold">Employee Benefits:</label>
						<div class="form-control-static">
							<ul class="no-padding" id="modal_review_list_benefits">
							</ul>
						</div>
					</div>

					<div class="form-group">
						<label class="text-bold">Skills Needed:</label>
						<div class="form-control-static">
							<ul class="no-padding" id="modal_review_list_skils">
							</ul>
						</div>
					</div>

					<div class="form-group">
						<label class="text-bold">Career Path:</label>
						<div class="form-control-static" id="modal_review_career_path"></div>
					</div>

					<div class="form-group">
						<label class="text-bold">Working Hours:</label>
						<div class="form-control-static" id="modal_review_work_hour"></div>
					</div>

					<div class="form-group">
						<label class="text-bold">Probation Period:</label>
						<div class="form-control-static" id="modal_review_probation"></div>
					</div>

					<div class="form-group">
						<label class="text-bold">Salary:</label>
						<div class="form-control-static" id="modal_review_salary"></div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button type="button" id="submit-job-post-button" class="btn btn-primary">SUBMIT JOB POST</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /review modal -->
	<?php echo $data['js']; ?>
	<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
	<script type="text/javascript" src="{{ url('assets/js/circle-progress.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/js/post-job.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/js/validation-template.js') }}"></script>
</body>
</html>