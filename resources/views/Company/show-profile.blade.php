assets<!DOCTYPE html>
@if (!\Session::has('cID'))
    <script type="text/javascript">
        window.location.href = "{{url('/Login')}}";
    </script>
@endif
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> Company - Post a Job </title>
	
	{!!$data['css']!!}
	<link href="assets/css/company-profile.css" rel="stylesheet" type="text/css">
</head>

<body class="navbar-top">

	{!!$data['navbar']!!}
	
	<input type="hidden" id="txtCompanyID" value="<?php echo Session::get('cID'); ?>">
	
	<!-- Page container -->
	<div class="page-container no-padding">

		<!-- Page Content -->
		<div class="page-content" style="background-color: #ffffff;">
			
			{!!$data['sidebar']!!}
			
			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content bg-main-color">
					
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
					<!-- /flash message -->
				
				
					<!-- Page header -->
					<div class="page-header">
						<div class="page-header-content">
							<div class="page-title">
								<p class="no-margin">Company Profile</p>
							</div>
						</div>
					</div>
					<!-- /page header -->
					
			
					<!-- Form for posting job -->
					<div class="panel panel-white border-radius-30 panel-company-profile">
						<div class="panel-body">
						
							<div class="form-group">
								<label>Logo</label>
								<div class="form-control-static">
									<img clas="company-logo" src="{{$data['companyData']->image_path}}" alt="Company logo" class="company-logo">
								</div>
							</div>

							<div class="form-group">
								<label>Company:</label>
								<div class="form-control-static">{{$data['companyData']->name}}</div>
							</div>
							
							<div class="form-group">
								<label>Company Email</label>
								<div class="form-control-static">{{$data['companyData']->email}}</div>
							</div>
						
							<div class="form-group">
								<label>Company Contact</label>
								<div class="form-control-static">{{$data['companyData']->contact}}</div>
							</div>
						
							<div class="form-group">
								<label>Website:</label>
								<div class="form-control-static">{{ $data['companyData']->website }}</div>
							</div>
							
							<div class="form-group">
								<label>Description:</label>
								<div class="form-control-static">
									<p class="no-margin">{{ $data['companyData']->overview }}</p>
								</div>
							</div>
							
							<div class="form-group">
								<label>Headquarters Address:</label>
								<div class="form-control-static">
									<p class="no-margin">{{$data['companyData']->address}}</p>
								</div>
							</div>
							
							<div class="form-group">
								<label>Why Talent should join this company?:</label>
								<div class="form-control-static">
									<p class="no-margin">{{$data['companyData']->reasons}}</p>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-5 col-lg-offset-3">
									<a href="/edit-profile">
										<button type="button" class="btn bg-nusatalent btn-rounded max-width text-bold text-white"><i class="icon-pencil7 position-left"></i> EDIT</button>
									</a>
								</div>
							</div>
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

	<?php echo $data['js']; ?>
	
	<script type="text/javascript" src="assets/js/core/app.js"></script>
</body>

</html>