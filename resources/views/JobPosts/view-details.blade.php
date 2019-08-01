<!DOCTYPE html>
<html>
<head>
	<title> Company - Detail Job Post </title>
	<?php echo $data['css']; ?>
	 <?php echo $data['js']; ?>
</head>
<body>
	<?php echo $data['navbar'];?>
	<input type="hidden" id="txtCompanyID" value="<?php echo Session::get('uID'); ?>">
	<div class="page-container no-padding">
		<!-- Page Content -->
		<div class="page-content">
			<div class="container-fluid" style="margin-top: 35px;padding: 35px;">
				<div class="row">
					<h6 style="font-size: 20px;font-family: Roboto;margin-left: 0.6%;margin-bottom: 2.5%;">
						<b> Detail Lowongan Kerja </b>
					</h6>
				</div>
				<div  class="panel-body" style="background-color: #FFFFFF;box-shadow: 4px 4px 20px rgba(0, 0, 0, 0.2);">
					<div class="media">
						<div class="media-body">
							<div class="row">
								<div class="col-lg-10">
									<div class="row">
										<div class="col-lg-5">
											<div class="row">
												<div class="col-lg-4">
													<h6 class="media-heading" style="font-family: Roboto;"><b> Posisi Pekerjaan </b></h6>
												</div>
												<div class="Col-lg-2">
													<h6 class="media-heading" style="font-family: Roboto;">: {{ $data['jobPosts'][0]['detailJobPost'][0]->jp_job_position }}</h6>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-4">
													<h6 class="media-heading" style="font-family: Roboto;"><b> Perusahaan </b></h6>
												</div>
												<div class="Col-lg-2">
													<h6 class="media-heading" style="font-family: Roboto;">: 
														{{ $data['jobPosts'][0]['detailJobPost'][0]->company_name }}
													</h6>
												</div>
											</div>
										</div>
										<div class="col-lg-5">
 											<div class="row">
												<div class="col-lg-4">
													<h6 class="media-heading" style="font-family: Roboto;"><b> Total View </b></h6>
												</div>
												<div class="Col-lg-2">
													<h6 class="media-heading" style="font-family: Roboto;">: 
														{{ $data['jobPosts'][0]['detailJobPost'][0]->totalViewed = NULL ? 0 : $data['jobPosts'][0]['detailJobPost'][0]->totalViewed}}
													</h6>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-4">
													<h6 class="media-heading" style="font-family: Roboto;"><b> Total Favorite </b></h6>
												</div>
												<div class="Col-lg-2">
													<h6 class="media-heading" style="font-family: Roboto;">: 
														{{ $data['jobPosts'][0]['detailJobPost'][0]->totalFavorite = NULL ? 0 : $data['jobPosts'][0]['detailJobPost'][0]->totalFavorite}}
													</h6>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-4">
													<h6 class="media-heading" style="font-family: Roboto;"><b> Total Applied </b></h6>
												</div>
												<div class="Col-lg-2">
													<h6 class="media-heading" style="font-family: Roboto;">: 
														{{ $data['jobPosts'][0]['detailJobPost'][0]->totalApplied = NULL ? 0 : $data['jobPosts'][0]['detailJobPost'][0]->totalApplied}}
													</h6>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
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
				 	<div class="alert alert-danger" id="alert" style="margin-bottom: 2%;">
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
				<div class="panel-body" style="background-color: #FFFFFF;box-shadow: 4px 4px 20px rgba(0, 0, 0, 0.2);margin-top: 1%;margin-bottom: 5%;">
					<table class="table datatable-pagination" id="tblListJobPost">
						<thead>
							<tr>
								<th> Student Name </th>
								<th> Status 
									<a title="" data-toggle="popover" data-placement="bottom" id="statusTooltip">
										<img src="/assets/icons/info-sign.png" width="16px;"/>
									</a>
									<span style="background-color: #555555;border: 1px solid rgba(0,0,0,0.2);padding: 16px;position: absolute;margin-top: 12px;border-radius: 15%;display: none;z-index: 999;width: 150px;" id="showStatustip">
										<span style='float: right;color: red;cursor: pointer;' id="closeStatustooltip">
											<i class='icon-cross2'></i>
										</span>
										<font color="white"> 
											All job applications have been professionally reviewed by NusaTalent team
										</font>
									</span>
								</th>
								<th> Applied Date </th>
								<th> View CV </th>
								<th> Answer </th>
								<th> Approve 
									<a title="" data-toggle="popover" data-placement="bottom" id="approveTooltip">
										<img src="/assets/icons/info-sign.png" width="16px;"/>
									</a>
									<span style="background-color: #555555;border: 1px solid rgba(0,0,0,0.2);padding: 16px;position: absolute;margin-top: 12px;border-radius: 15%;display: none;z-index: 999;width: 150px;" id="showApprovetip">
										<span style='float: right;color: red;cursor: pointer;' id="closeApprovetooltip">
											<i class='icon-cross2'></i>
										</span>
										<font color="white"> 
											With ‘Approve’, candidate will be informed that you are interested and can patiently wait for your call.
										</font>
									</span>
								</th>
								<th> Disapprove 
									<a title="" data-toggle="popover" data-placement="bottom" id="disapproveTooltip">
										<img src="/assets/icons/info-sign.png" width="16px;"/>
									</a>
									<span style="background-color: #555555;border: 1px solid rgba(0,0,0,0.2);padding: 16px;position: absolute;margin-top: 12px;border-radius: 15%;display: none;z-index: 999;width: 150px;" id="showDisapprovetip">
										<span style='float: right;color: red;cursor: pointer;' id="closeDisapprovetooltip">
											<i class='icon-cross2'></i>
										</span>
										<font color="white"> 
											With ‘Disapprove’, candidate will be informed that you are not interested.
										</font>
									</span>
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data['jobPosts'][0]['talentJobPost'] as $row)
							<tr>
								<td> 	
									{{ $row->full_name }} 
								</td>
								<td>
									@if($row->reviewed === 1 && $row->hired === 1 && $row->rejected === 0)
                                        <span style="margin-right: 1%;"> Approved </span>
                                        <img src="/assets/icons/approved.png" width="10%;">
                                    @endif
                                    @if($row->reviewed === 1 && $row->rejected === 1 && $row->hired === 0)
                                        <span style="margin-right: 1%;"> Disapproved </span>
                                        <img src="/assets/icons/error.png" width="10%;"> 
                                    @endif
                                    @if($row->reviewed === 1 && $row->rejected === 0 && $row->hired ===0)
                                        <span style="margin-right: 1%;"> In Review </span>
                                        <img src="/assets/icons/in-review.png" width="10%"> 
                                    @endif
                                    @if($row->reviewed === 0 && $row->rejected === 0 && $row->hired === 0)
                                        <span style="margin-right: 1%;"> New Applicant </span>
                                        <img src="/assets/icons/alarm.png" width="10%;">
                                    @endif
								</td>
								<td>
									{!! $row->applied_date !!}
								</td>
								<td>
									<a href="http://cv.nusatalent.com/?s={{$row->student_id}}" target='_blank' data-id="{{$row->jp_id.'&'.$row->student_id}}" class="btnReviewTalent"> 
										<span> <i class="icon-file-text3"></i></span>
									</a>
								</td>
								<td>
									<a class="vwAnswer" data-id="{{$row->jp_id}}&{{$row->student_id}}">
										@if(!is_null($row->answerFile) && $row->answerFile !== "")
											<span> View Answer </span>
										@else
											<span> No Answer </span>
										@endif
									</a>
								</td>
								<td>
	                                <a title="Approve"
	                                	data-toggle="modal" data-id="{{$row->jp_id}}&{{$row->student_id}}" data-name="{{$row->full_name}}" class="btnApprove">
	                                    <button class="btn btn-success"> 
	                                        <span> <i class="icon-checkmark4"></i> </span>
	                                    </button>
	                                </a>
								</td>
								<td>
                                    <a title="Disapprove"
                                    	data-toggle="modal" data-id="{{$row->jp_id}}&{{$row->student_id}}" data-name="{{$row->full_name}}" class="btnDisapprove">
                                        <button class="btn btn-danger"> 
                                            <span> <i class="icon-cross2"></i> </span>
                                        </button>
                                    </a>
                                </td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- /Page Content -->
	</div>
	<!-- Modal Answer -->
	<div class="modal fade" id="mdlAnswer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
		
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
	<?php echo $data['footer']; ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#statusTooltip").on("click", function(e){
				$("#showStatustip").fadeIn("slow")
			});

			$("#approveTooltip").on("click", function(e){
				$("#showApprovetip").fadeIn("slow")
			});

			$("#disapproveTooltip").on("click", function(e){
				$("#showDisapprovetip").fadeIn("slow")
			});

			$("#closeStatustooltip").on("click", function(){
				$("#showStatustip").fadeOut("slow");
			})

			$("#closeApprovetooltip").on("click", function(){
				$("#showApprovetip").fadeOut("slow");
			});

			$("#closeDisapprovetooltip").on("click", function(){
				$("#showDisapprovetip").fadeOut("slow");
			});

		    $('#tblListJobPost').DataTable({
		    	"searching": false,
		    	"order": [[1, 'asc']]
		    });
		    $("#tblListJobPost").on("click", ".vwAnswer", function(e){
		    	$(".modal-body").empty();
		    	let arr = $(this).data("id").split("&");
		    	let jobPostID = arr[0];
		    	let studentID = arr[1];
		    	let url = "/GetJobPostAnswers"
		    	$.ajax({
		    		url: url,
		    		method: "POST",
		    		data: {_token: "<?php echo csrf_token(); ?>", jobPostID: jobPostID, studentID: studentID},
		    		success: function(resp){
		    			if(resp.length !== 0)
		    			{
		    				for(var i in resp)
			    			{
			    				var dataAppend = "<div class='row'><div class='col-lg-12'><h3> "+resp[i].questionName+" </h3></div><div class='col-lg-12'><audio controls src='"+resp[i].questionAnswer+"'>Your browser does not support the audio element.</audio></div></div>";			
			    				$(".modal-body").append(dataAppend);
			    			}
		    			}
		    			else
		    			{
		    				var dataAppend = "<div class='row'><div class='col-lg-12'><h3> No Answer </h3></div></div>";
		    				$(".modal-body").append(dataAppend);
		    			}
		    			$("#mdlAnswer").modal('show');
		    			//
		    		},
		    		error: function(resp){
		    			console.log(resp);
		    		}
		    	});
		    	//$("#mdlAnswer").modal('show');
		    });

		    $("#tblListJobPost").on("click", ".btnReviewTalent", function(e){
		    	var id = $(this).data("id");
		    	console.log(id);
		    	var url = "/ManageJobPosts/TalentReviewed/sID=" + id;
		    	$.ajax({
		    		url: url,
		    		method: "GET",
		    		success: function(resp)
		    		{
		    			console.log(resp.size());
		    		},
		    		error: function(textStatus)
		    		{
		    			console.log(textStatus);
		    		}
		    	});
		    })

		    $("#tblListJobPost").on("click", ".btnApprove", function(e){
		    	e.preventDefault();
		    	var studentID = $(this).data("id");
		    	var studentName = $(this).data("name");
		    	swal({
		            title: "Are you sure to approve <b>" + studentName + "</b> ?",
		            type: "warning",
		            html: true,
		            showCancelButton: true,
		            confirmButtonColor: "#5CB85C",
		            confirmButtonText: "Approve",
		            cancelButtonColor: "#FF0000",
		            cancelButtonText: "No",
		            closeOnConfirm: false,
		            closeOnCancel: true,
		            showLoaderOnConfirm: true
		        },
		        function(isConfirm){
		            if (isConfirm) 
		            {
		            	var url = "/ApproveTalent";
		            	$.ajax({
		            		url: url,
		            		method: "POST",
		            		data: {_token: "<?php echo csrf_token(); ?>", studentID: studentID},
		            		beforeSend: function(){
		            		},
		            		success: function(resp)
		            		{
		            			if(resp)
		            			{
		            				swal({
							            title: "Success!",
							           	showConfirmButton: false,
							            type: "success",
							            timer: 2000
								    });
	            				 	setTimeout(function(){
						            	location.reload();
						            }, 1500);
		            			}
		            			else
		            			{
		            				swal({
					                    title: "Failed to approve !",
					                    confirmButtonColor: "#66BB6A",
					                    type: "success"
					                });
		            			}
		            		},
		            		error: function(textStatus)
		            		{
	            			 	swal({
				                    title: "Failed!",
				                    confirmButtonColor: "#66BB6A",
				                    type: "success"
				                });
		            		}
		            	});
		            }
		        });
		    });

		    $("#tblListJobPost").on("click", ".btnDisapprove", function(e){
		    	e.preventDefault();
		    	var studentID = $(this).data("id");
		    	var studentName = $(this).data("name");

		    	swal({
		            title: "Are you sure to disapprove <b>" + studentName + "</b> ?",
		            type: "warning",
		            html: true,
		            showCancelButton: true,
		            confirmButtonColor: "#EF5350",
		            confirmButtonText: "Disapprove",
		            cancelButtonText: "No",
		            closeOnConfirm: false,
		            closeOnCancel: true,
		            showLoaderOnConfirm: true
		        },
		        function(isConfirm){
		            if (isConfirm) 
		            {
		            	var url = "/DisapproveTalent";
		            	$.ajax({
		            		url: url,
		            		method: "POST",
		            		data: {_token: "<?php echo csrf_token(); ?>", studentID: studentID},
		            		beforeSend: function(){
		            		},
		            		success: function(resp)
		            		{
		            			if(resp)
		            			{
		            				swal({
							            title: "Success!",
							           	showConfirmButton: false,
							            type: "success",
							            timer: 2000
								    });
	            				 	setTimeout(function(){
						            	location.reload();
						            }, 1500);
		            			}
		            			else
		            			{
		            				 swal({
					                    title: "Failed to disapprove!",
					                    confirmButtonColor: "#66BB6A",
					                    type: "success"
					                });
		            			}
		            		},
		            		error: function(textStatus)
		            		{
		            			 swal({
				                    title: "Disapprove!",
				                    confirmButtonColor: "#66BB6A",
				                    type: "success"
				                });
		            		}
		            	});
		            }
		        });
		    })
		});
	</script>
</body>
</html>