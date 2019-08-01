<!DOCTYPE html>
<html lang="en">
<head>
	<title> Career Center - Change Password </title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php echo $data['css']; ?>
	<link href="{{URL::to('assets/css/company-profile.css')}}" rel="stylesheet" type="text/css">
</head>
<body class="login-container">
	{!! $data['navbar'] !!}
	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			{!!$data['sidebar']!!}
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Simple login form -->
				<form action="{{ action('MainController@ChangePassword') }}" method="post" style="margin-top: 7%;">
				    {{ csrf_field() }}
					<div class="panel panel-body login-form" style="padding: 35px;width: 28%;height: 485px;">
						<div class="text-center">
							<h1 style="font-family: Roboto;color: #04518D;font-size: 32px;"> 
								<b> Change Password </b>
							</h1>
						</div>
						<div class="row" style="margin-top: 15%;">
							<label style="font-family: Roboto;font-size: 12px;">
								Old Password
							</label>
							<input type="password" class="input-text" placeholder="*********" name="txtOldPassword">
						</div>
						<div class="row" style="margin-top: 5%;margin-bottom: 10%;">
							<label style="font-family: Roboto;font-size: 12px;">
								New Password
							</label>
							<input type="password" class="input-text" placeholder="*********" name="txtNewPassword">
						</div>
						<div class="row" style="margin-top: 5%;margin-bottom: 10%;">
							<label style="font-family: Roboto;font-size: 12px;">
								Retype New Password
							</label>
							<input type="password" class="input-text" placeholder="*********" name="txtRetypePassword">
						</div>
						<div class="form-group">
							<button type="submit" class="btn-signin">
								<font color="white"> Change Password </font>
							</button>
						</div>
					</div>
					<div class="row">
						@if (\Session::has('success'))
						 	<div class="alert alert-success" id="alert">
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
						 	<div class="alert alert-danger" id="alert">
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
				</form>
				<!-- /simple login form -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<?php echo $data['footer']; ?>
	<!-- /page container -->
	<?php echo $data['js']; ?>
	<script type="text/javascript" src="{{URL::to('assets/js/core/app.js')}}"></script>
	<script type="text/javascript" src="{{URL::to('assets/js/manage-job-post.js')}}"></script>
</body>
</html>