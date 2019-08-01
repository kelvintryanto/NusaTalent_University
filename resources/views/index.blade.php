<!DOCTYPE html>
<html lang="en">
<head>
	<title> Career Center - Login </title>
	<?php echo $data['css']; ?>
</head>
<body class="login-container">
	<div class="navbar navbar-default">
		<!-- Navbar header -->
		<div class="navbar-header">
			<a class="navbar-brand" href="/manage-job-post" style="padding: 14px 20px !important;">
				<img src="{{asset('/assets/icons/nusatalent-cc.png')}}" alt='Image not found!' style="width: 118px;height: 35px;" />
			</a>
		</div>
		<!-- /navbar header -->
	</div>
	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Simple login form -->
				<div class="row" style="width: 20%;height: 30px;margin-left: 40%;">
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
				<form action="{{ action('MainController@authorizedAccess') }}" method="post" style="margin-top: 1.5%;">
				    {{ csrf_field() }}
					<div class="panel panel-body login-form" style="padding: 35px;width: 28%;height: 450px;">
						<div class="text-center">
							<h1 style="font-family: Roboto;color: #0F76BC;font-size: 32px;"> 
								Career Center
								<br/> 
								<b> Sign In </b>
							</h1>
						</div>
						<div class="row" style="margin-top: 15%;">
							<label style="font-family: Roboto;font-size: 12px;color: #0F76BC;">
								Email
							</label>
							<input type="text" class="input-text" placeholder="hello@nusatalent.com" name="txtEmail">
						</div>
						<div class="row" style="margin-top: 5%;margin-bottom: 10%;">
							<label style="font-family: Roboto;font-size: 12px;color: #0F76BC;">
								Password
							</label>
							<input type="password" class="input-text" placeholder="**********" name="txtPassword">
						</div>
						<div class="form-group">
							<button type="submit" class="btn-signin">
								<font color="white"> Sign in </font>
							</button>
						</div>
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
</body>
</html>