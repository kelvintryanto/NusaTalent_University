<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> Career Center - Edit Job Post </title>
	{!!$data['css']!!}
</head>

<body class="navbar-top">
	{!!$data['navbar']!!}
	
	<!-- Page container -->
	<div class="page-container no-padding">
		<!-- Page Content -->
		<div class="page-content bg-main-color">
		
			{!!$data['sidebar']!!}
			
			<!-- Main content -->
			<div class="content-fluid">
				
				<!-- Content area -->
				<div class="content">
				
					<!-- Page header -->
					<div class="page-header">
						<div class="page-header-content">
							<div class="page-title">
								<p class="no-margin">
									<i class="material-icons position-left">add_circle_outline</i> Edit Job Post
								</p>
								<h6>Please describe every details about the job you're about to post</h6>			
							</div>
						</div>
					</div>				
					<!-- /page header -->
					
					<!-- Form for posting job -->
					<div class="panel panel-white border-radius-30">
						<div class="panel-body">
							<form action="#" method="post" id="edit-job-post-form" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="form-group">
									<label>Job Position <span class="text-danger">*</span></label>
									<input type="text" name="job_position" class="form-control form-input" placeholder="Enter job title, ex. Content Developer" value="{{ $data['job_post']->job_position }}">
									<input type="hidden" name="job_post_id" value="{{ $data['job_post_id'] }}" ">
									<div class="alert alert-danger invalid" style="margin-top: 1%;">
										This field is required
									</div>
								</div>								
								
								<div class="form-group">
									<label>Working Location <span class="text-danger">*</span></label>					
									<input type="text" name="work_location" class="form-control form-input" placeholder="City or state, ex. Kuningan, Jakarta Selatan" value="{{ $data['job_post']->work_location }}">
									<div class="alert alert-danger invalid" style="margin-top: 1%;">
										This field is required
									</div>
								</div>								
								
								<div class="form-group">									
									<label>Job Category <span class="text-danger">*</span></label>
									<select data-placeholder="Select job category" name="job_category" class="select-search">
										<option></option>
										@if ($data['job_category'])
											@foreach($data['job_category'] as $result)
												<option value="{{ $result->categoryID }}" {{ $result->categoryID == $data['job_post']->category_id ? "selected" : "" }}> {{ $result->categoryName }} </option>
											@endforeach
										@endif
									</select>
									<div class="alert alert-danger invalid" style="margin-top: 1%;">
										Choose job category
									</div>	
								</div>								
											
								<div class="form-group">			
									<label>Talents Needed <span class="text-danger">*</span></label>				
									<input type="text" name="talent_needed" class="form-control form-input contact" placeholder="Enter talents needed" value="{{ $data['job_post']->talent_needed }}">
									<div class="alert alert-danger invalid" style="margin-top: 1%;">
										This field is required
									</div>
								</div>
								
								<div class="form-group">									
									<label class="display-block text-semibold">Job Descriptions <span class="text-danger">*</span></label>
									<ul class="list-group no-padding" id="list_job_desc">
										@php
											$job_desc_split = explode(";", $data['job_post']->job_description);

											for ($i = 0; $i < sizeof($job_desc_split); $i++) {
												if ($job_desc_split[$i] != "") 
													echo "<li class='list-group-item'><i class='icon-primitive-dot'></i> " . $job_desc_split[$i] . "<span style='float: right;color: red;cursor: pointer;' class='delete-list'><i class='icon-cross2'></i></span></li>";
											}
										@endphp
									</ul>
									<textarea type="text" class="form-control" placeholder="press ENTER to add new" name="txtJobDesc" id="txtJobDesc"></textarea>
									<input type="hidden" name="job_description" id="job_description" value="{{ $data['job_post']->job_description }}">
								</div>
								
								<div class="form-group">									
									<label class="display-block text-semibold">Job Requirements <span class="text-danger">*</span></label>	
									<ul class="list-group no-padding" id="list_job_req">
										@php
											$job_req_split = explode(";", $data['job_post']->job_requirement);

											for ($i = 0; $i < sizeof($job_req_split); $i++) {
												if ($job_req_split[$i] != "") 
													echo "<li class='list-group-item'><i class='icon-primitive-dot'></i> " . $job_req_split[$i] . "<span style='float: right;color: red;cursor: pointer;' class='delete-list'><i class='icon-cross2'></i></span></li>";
											}
										@endphp
									</ul>
									<textarea type="text" class="form-control" placeholder="press ENTER to add new" name="txtJobReq" id="txtJobReq"></textarea>
									<input type="hidden" name="job_requirement" id="job_requirement" value="{{ $data['job_post']->job_requirement }}">
								</div>

								<div class="form-group">									
									<label class="display-block text-semibold">Benefits <span class="text-danger">*</span></label>
									<ul class="list-group no-padding" id="list_benefits">
										@php
											$benefit_split = explode(";", $data['job_post']->employee_benefit);

											for ($i = 0; $i < sizeof($benefit_split); $i++) {
												if ($benefit_split[$i] != "") 
													echo "<li class='list-group-item'><i class='icon-primitive-dot'></i> " . $benefit_split[$i] . "<span style='float: right;color: red;cursor: pointer;' class='delete-list'><i class='icon-cross2'></i></span></li>";
											}
										@endphp
									</ul>
									<textarea type="text" class="form-control" placeholder="press ENTER to add new" name="txtEmployeeBenefit" id="txtEmployeeBenefit"></textarea>
									<input type="hidden" name="employee_benefit" id="employee_benefit" value="{{ $data['job_post']->employee_benefit }}">
								</div>

								<div class="form-group">									
									<label class="display-block text-semibold">Skills Needed <span class="text-danger">*</span></label>
									<ul class="list-group no-padding" id="list_skills">
										@php
											$skill_split = explode(";", $data['job_post']->special_skill);

											for ($i = 0; $i < sizeof($skill_split); $i++) {
												if ($skill_split[$i] != "") 
													echo "<li class='list-group-item'><i class='icon-primitive-dot'></i> " . $skill_split[$i] . "<span style='float: right;color: red;cursor: pointer;' class='delete-list'><i class='icon-cross2'></i></span></li>";
											}
										@endphp
									</ul>
									<textarea type="text" class="form-control" placeholder="press ENTER to add new" name="txtSpecialSkill" id="txtSpecialSkill"></textarea>
									<input type="hidden" name="special_skill" id="special_skill" value="{{ $data['job_post']->special_skill }}">
								</div>					
								
								<div class="form-group">									
									<label>Career Path </label>
									<input type="text" name="career_path" class="form-control" placeholder="Enter career path, ex. Lead Developer" value="{{ $data['job_post']->career_path }}">	
								</div>								
								
								<div class="form-group">									
									<label>Working Hours <span class="text-danger">*</span></label>
									<input type="text" name="work_hours" class="form-control form-input" placeholder="Enter working hours, ex. Senin - Jumat 09.00 - 18.00" value="{{ $data['job_post']->working_hour }}">
									<div class="alert alert-danger invalid" style="margin-top: 1%;">
										This field is required
									</div>
								</div>								
								
								<div class="form-group">									
									<label>Probation Period <span class="text-danger">*</span></label>	
									<input type="text" name="probation_period" class="form-control form-input" placeholder="Enter probation period, ex. 3 - 4 Bulan" value="{{ $data['job_post']->probation }}">
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
												<input type="text" name="salary_min" class="form-control txtSalaryMin" placeholder="Enter min salary, ex. 5.000.000" value="{{ $data['job_post']->salary_min }}">											
											</div>										
										</div>			

										<div class="col-lg-1 text-center" style="padding-top: 7px;">											
											<span>to</span>										
										</div>																				
										
										<div class="col-lg-4">											
											<div class="input-group">												
												<span class="input-group-addon">Rp</span>												
												<input type="text" name="salary_max" class="form-control txtSalaryMax" placeholder="Enter max salary, ex. 10.000.000" value="{{ $data['job_post']->salary_max }}">											
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
				</div>				
				<!-- /content area -->			
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
						<label class="text-bold">Employment Type:</label>
						<div class="form-control-static" id="modal_review_employment_status"></div>
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

					<div class="form-group">
						<label class="text-bold">Job Post Ends in:</label>
						<div class="form-control-static" id="modal_review_ends_in"></div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button type="button" id="submit-job-post-edit-button" class="btn bg-nusatalent">SUBMIT JOB POST</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /review job post -->
	<?php echo $data['js']; ?>
	<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
	<script type="text/javascript" src="{{ url('assets/js/circle-progress.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/js/post-job.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/js/validation-template.js') }}"></script>
	<script type="text/javascript">
		$(function(){
			$('#submit-job-post-edit-button').on('click', function(e) {
			console.log('edit');
			const alert = `
				<div class="row" id="alert-dialog">
					<div class="col-lg-12">	
						<div class="alert alert-success alert-bordered">
							<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
							Successfully edit job post!
						</div>
					</div>
				</div>`;
			const light_2 = $(this).parent();
			$(this).addClass('disabled');

			$(light_2).block({
				message: '<i class="icon-spinner2 spinner" style="font-size: 2rem;"></i>',
				overlayCSS: {
					backgroundColor: '#fff',
					opacity: 0.8,
					cursor: 'wait'
				},
				css: {
					border: 0,
					padding: 0,
					backgroundColor: 'none'
				}
			});

			$.ajax({
				type: "post",
				url: '/update-job-post',
				data: new FormData($("#edit-job-post-form")[0]),
				dataType: "json",
				processData: false,
				contentType: false,
				success: function(msg) {
					$('#submit-job-post-button').removeClass('disabled');
					$(light_2).unblock();
					$('#review_job_post_modal').modal('hide');

					$('#edit-job-post-form').append(alert);

					setTimeout(() => {
						$('#alert-dialog').remove();
					 	window.location = "/JobPost/list-job-post";
					}, 2000);
				},
				error: function(msg) {
				}
			});
		});
		})
	</script>
</body>
</html>