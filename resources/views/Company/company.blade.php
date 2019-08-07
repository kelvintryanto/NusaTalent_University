<!DOCTYPE html>
<html>
<head>
	<title> Company - Profile </title>
	{!!$data['css']!!}
	{!! $data['js'] !!}
</head>
<body>
	{!! $data['navbar'] !!}
	<div class="page-container no-padding">
        <div class="page-content">
            <div class="container-fluid" style="margin-top: 31px;padding-left: 200px;padding-right: 200px;padding-bottom: 2.5%;margin-bottom: 5%;">
            	<!-- Flash Message -->
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
				<!-- /Flash Message -->
            	<div class="row" style="background-color: #04518D;border-radius: 7px;height: 35px;padding-top: 4px;margin-top: 5%;">
            		<h5 class="panel-title" style="font-family: Robot-Medium;color: #FFFFFF;text-align: center;"> Company Profile </h5>
            	</div>
				<div class="panel-body no-padding" style="background-color: #FFFFFF;border-radius: 7px;">
					<form class="form-horizontal" action="{{ action('MainController@EditProfile') }}" method="post" id="myForm" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="row" style="width: 80%;margin-top: 1%;margin-left: 9%;">
							<div class="col-lg-offset-10" style="display: none;" id="editMode">
								<span>
									<img src="/assets/icons/Edit-01.png" width="100%">
								</span>
								<span>
									<font size="2"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspChange to <u style="cursor: pointer;" id="changeViewMode"> Edit Mode </u> </font>
								</span>
							</div>
							<div class="col-lg-offset-10" style="display: block;" id="viewMode">
								<span>
									<img src="/assets/icons/view-02.png" width="100%">
								</span>
								<span>
									<font size="2"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspChange to <u style="cursor: pointer;" id="changeEditMode"> Edit Mode </u> </font>
								</span>
							</div>
						</div>
						<input type="file" name="uploadImage" id="uploadImage" style="display: none;">
						<div class="row" style="width: 80%;margin-left: 40%;display: none;" id="divUploadImage">
							<div class="col-lg-3 col-md-6">
								<div class="thumbnail no-padding">
									<div class="thumb">
										<img id="profilePic1" src="/images/{{$data['companyData'][0]->image_path}}" alt="No Profile Picture">
										<div class="caption-overflow">
											<span>
												<a href="assets/images/placeholder.jpg" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox" id="triggerUpload"><i class="icon-plus2"></i></a>
											</span>
										</div>
									</div>
					    		</div>
							</div>
						</div>
						<div class="row" style="width: 80%;margin-left: 40%;display: block;" id="divDisplayImage">
							<div class="col-lg-3 col-md-6">
								<div class="thumbnail no-padding">
									<div class="thumb">
										<img id="profilePic2" src="/images/{{$data['companyData'][0]->image_path}}" alt="No Profile Picture">
									</div>
					    		</div>
							</div>
						</div>
						<div class="row" style="width: 80%;margin-top: 1.5%;margin-left: 9%;">
							<div class="col-lg-12">
								<label style="font-family: Robot-Medium;">
									<b> Company Name </b>
								</label>
							</div>
							<div class="col-lg-12">
								<input type="text" name="txtCompanyName" class="text-value" value="{{$data['companyData'][0]->name}}" disabled>
							</div>
						</div>
						<div class="row" style="width: 80%;margin-top: 1.5%;margin-left: 9%;">
							<div class="col-lg-6">
								<label style="font-family: Robot-Medium;">
									<b> Company Email </b>
								</label>
								<input type="text" name="txtCompanyEmail" class="text-value" value="{{$data['companyData'][0]->email}}" disabled>
							</div>
							<div class="col-lg-6">
								<label style="font-family: Robot-Medium;">
									<b> Company Contact </b>
								</label>
								<input type="text" name="txtCompanyContact" class="text-value" value="{{$data['companyData'][0]->contact}}" disabled>
							</div>
						</div>
						<div class="row" style="width: 80%;margin-top: 1.5%;margin-left: 9%;">
							<div class="col-lg-6">
								<label style="font-family: Robot-Medium;">
									<b> Company Industry </b>
								</label>
								<input type="text" name="txtCompanyIndustry" class="text-value" value="{{$data['companyData'][0]->industry}}" disabled>
							</div>
							<div class="col-lg-6">
								<label style="font-family: Robot-Medium;">
									<b> Company Website </b>
								</label>
								<input type="text" name="txtCompanyWebsite" class="text-value" value="{{$data['companyData'][0]->website}}" disabled>
							</div>
						</div>
						<div class="row" style="width: 80%;margin-top: 1.5%;margin-left: 9%;">
							<div class="col-lg-12">
								<label style="font-family: Robot-Medium;">
									<b> Company LinkedIn </b>
								</label>
							</div>
							<div class="col-lg-12">
								<input type="text" name="txtCompanyLinkedin" class="text-value" value="{{$data['companyData'][0]->linkedin}}" disabled>
							</div>
						</div>
						<div class="row" style="width: 80%;margin-top: 1.5%;margin-left: 9%;">
							<div class="col-lg-12">
								<label style="font-family: Robot-Medium;">
									<b> Total Employee </b>
								</label>
							</div>
							<div class="col-lg-12">
								<input type="text" name="txtEmployeeNeeded" class="text-value" value="{{$data['companyData'][0]->employees}}" disabled>
							</div>
						</div>
						<div class="row" style="width: 80%;margin-top: 1.5%;margin-left: 9%;">
							<div class="col-lg-12">
								<label style="font-family: Robot;">
									<b> Address Headquarters </b>
								</label>
							</div>
							<div class="col-lg-12">
								<textarea class="text-value" name="txtCompanyAddress" rows="3" disabled>{{$data['companyData'][0]->address}}</textarea>
							</div>
						</div>
						<div class="row" style="width: 80%;margin-top: 1.5%;margin-left: 9%;">
							<div class="col-lg-12">
								<label style="font-family: Robot-Medium;">
									<b> Company Description </b>
								</label>
							</div>
							<div class="col-lg-12">
								<textarea class="text-value" name="txtCompanyDesc" rows="3" disabled>{{$data['companyData'][0]->overview}}</textarea>
							</div>
						</div>
						<div class="row" style="width: 80%;margin-top: 1.5%;margin-left: 9%;">
							<div class="col-lg-12">
								<label style="font-family: Robot-Medium;">
									<b> Why Join Us? </b>
								</label>
							</div>
							<div class="col-lg-12">
								<textarea class="text-value" name="txtCompanyReasons" rows="3" disabled>{{$data['companyData'][0]->reasons}}</textarea>
							</div>
						</div>
						<div class="form-group" style="width: 35%;margin-top: 3.5%;margin-left: 30%;">
							<button type="submit" class="btn-signin disabled" id="btnSubmit">
								<font color="white"> Submit </font>
							</button>
						</div>
					</form>
				</div>
            </div>
        </div>
    </div>
    {!! $data['footer'] !!}
    <script type="text/javascript">
    	$(document).ready(function(){
    		let active = false;
    		$("#cbActiveEdit").bootstrapSwitch();
    		$("#cbActiveEdit").on("click.bootstrapSwitch", function(e){
    			active = $(this).bootstrapSwitch('state');
    			console.log(active);
    		});

    		$("#changeViewMode").on("click", function(e){
    			e.preventDefault();
    			$("#editMode").css("display", "none");
    			$("#viewMode").css("display", "block");
    			$("#divUploadImage").css("display", "none");
    			$("#divDisplayImage").css("display", "block");


    			$("input[type='text']").prop("disabled", true);
    			$("textarea").prop("disabled", true);
    			$("button").addClass("disabled");
    			$("button").prop("disabled", true);
    		});

    		$("#changeEditMode").on("click", function(e){
    			e.preventDefault();
    			$("#editMode").css("display", "block");
    			$("#viewMode").css("display", "none");
    			$("#divUploadImage").css("display", "block");
    			$("#divDisplayImage").css("display", "none");

    			$("input[type='text']").prop("disabled", false);
    			$("textarea").prop("disabled", false);
    			$("button").removeClass("disabled");
    			$("button").prop("disabled", false);
    		});

    		$("#triggerUpload").on("click", function(e){
    			e.preventDefault();

    			$("#uploadImage:hidden").trigger("click");
    		});

    		$("#uploadImage").on("change", function(e){
    			$.ajax({
    				url: '/UploadImage',
    				data: new FormData($("#myForm")[0]),
    				dataType: "json",
    				async: false,
    				type: "post",
    				processData: false,
    				contentType: false,
    				success:function(resp)
    				{
    					$("#profilePic1").attr("src", "/images/"+resp);
    					$("#profilePic2").attr("src", "/images/"+resp);
    				},
    				error: function(resp)
    				{
    					console.log(resp);
    				}
    			});
    		});

    		$("#btnSubmit").on("click", function(e){
    			e.preventDefault();

    			$("#myForm").trigger("submit");
    		});
    	})
    </script>
</body>
</html>
