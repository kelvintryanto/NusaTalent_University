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
					<span class="title">All Students</span> 
					<small class="display-block subtitle">Lorem ipsum dolor sit amet,<br>consectetur adipiscing elit. </small>
				</h5>
			</div>
	
			<button class="btn-editstudent" style="margin-right: 3%;">Add Student</button>
		</div>

		<div class="nav-ah-2">
			<div style="display: flex" >
				<div class="panel-k">
					<form>
						<div class="form-group">
	                        <label class="text">University</label>    
	                        <select class="form-control form-control-a text14" id="education" placeholder="Education" name="education" style="width: 80%;">
	                        	<option class="text14">hahha</option>
	                        </select>
	                    </div>

	                    <div class="form-group">
	                        <label class="text">Register Date</label> 
	                       	<input type="date" class="form-control form-control-a text14 form-bottom" id="registerdate" placeholder="Register Date" name="registerdate" style="width: 60%;">
	                    </div>

	                    <div class="form-group">
	                        <label class="text">Enrollment Batch</label>    
	                        <select class="form-control form-control-b text14" id="jobfunction" placeholder="Job Function" name="jobfunction" style="width: 50%;">
	                        	<option class="text14"></option>
	                        </select>
	                    </div>

	                     <div class="form-group">
	                        <label class="text">Status</label>    
	                        <select class="form-control form-control-b text14" id="jobfunction" placeholder="Job Function" name="jobfunction" style="width: 50%;">
	                        	<option class="text14"></option>
	                        </select>
	                    </div>

	                    <div class="row row10">
	                    	<button class="btn btn-link btn-reset">Reset</button>
	                    	<button class="btn btn-filter">Filter</button>
	                    </div>
	                </form>
				</div>
			</div>
			
			<div style="display: flex; flex-flow: column;">
				<div style="display: flex; justify-content: space-around; margin-left: 25px;">
					<div class=" col-lg-7 col-sm-6 col-md-6 form-group">
		            	<!-- <label for="search" class="sr-only">Search Applicants</label> -->
		            	<input type="text" class="form-control text2" name="search" id="search" placeholder="Search Applicants">
		              	<span class="glyphicon glyphicon-search form-control-feedback" style="color: #246BB3;"></span>
			         </div>
		    
				
					<div class="col-lg-4 col-sm-6 col-md-5" style="display: flex; justify-content: flex-end; margin-right: 3%;">
						<div style="margin-right: 10px;"><a class="text left20" href="#"><i class="fas fa-sort-amount-down"></i></a></div>
						<div style="margin-right: 10px;"><a class="text left20" href="#"><i class="fas fa-sort-amount-down-alt"></i></a></div>
						<div>
							<label class="text">Sort by:</label>
							<select class="dropdown-li text14" id="filter" name="filter">
								<option class="text14">test</option>
				            </select>
				        </div>
					</div>
				</div>

				<div class="col-row5">
					<a href="#closemodal1" rel="modal:open">
					<button class="btn btninformasi column-c">
						<div class="row">
							<div class="col-lg-3">
								<img src="../icon/avatar.png" alt="Avatar" class="avatar-mini">
							</div>
							<div class="col-lg-6">
								<div><label class="text5">John Dae</label></div>
								<div style="margin-top: -10px"><label class="text4">Summary</label></div>
							</div>
						</div>

						<div style="display: flex; justify-content: flex-end; margin-top: 20px; margin-bottom: 15px;">
							<label class="text4"><i class="fas fa-briefcase" style="margin-right: 5px; "></i>Bina Nusantara Univer...</label>
						</div>

						<div style="display: flex; justify-content: flex-end;">
							<label class="text4" style="float: right;">21/02/2019</label>
						</div>
					</button></a>

					<button class="btn btninformasi column-c">
						<div class="row">
							<div class="col-lg-3">
								<img src="../icon/avatar.png" alt="Avatar" class="avatar-mini">
							</div>
							<div class="col-lg-6">
								<div><label class="text5">John Dae</label></div>
								<div style="margin-top: -10px"><label class="text4">Summary</label></div>
							</div>
						</div>

						<div style="display: flex; justify-content: flex-end; margin-top: 20px; margin-bottom: 15px;">
							<label class="text4"><i class="fas fa-briefcase" style="margin-right: 5px; "></i>Bina Nusantara Univer...</label>
						</div>

						<div style="display: flex; justify-content: flex-end;">
							<label class="text4" style="float: right;">21/02/2019</label>
						</div>
					</button>

					<button class="btn btninformasi column-c">
						<div class="row">
							<div class="col-lg-3">
								<img src="../icon/avatar.png" alt="Avatar" class="avatar-mini">
							</div>
							<div class="col-lg-6">
								<div><label class="text5">John Dae</label></div>
								<div style="margin-top: -10px"><label class="text4">Summary</label></div>
							</div>
						</div>

						<div style="display: flex; justify-content: flex-end; margin-top: 20px; margin-bottom: 15px;">
							<label class="text4"><i class="fas fa-briefcase" style="margin-right: 5px; "></i>Bina Nusantara Univer...</label>
						</div>

						<div style="display: flex; justify-content: flex-end;">
							<label class="text4" style="float: right;">21/02/2019</label>
						</div>
					</button>

					<button class="btn btninformasi column-c">
						<div class="row">
							<div class="col-lg-3">
								<img src="../icon/avatar.png" alt="Avatar" class="avatar-mini">
							</div>
							<div class="col-lg-6">
								<div><label class="text5">John Dae</label></div>
								<div style="margin-top: -10px"><label class="text4">Summary</label></div>
							</div>
						</div>

						<div style="display: flex; justify-content: flex-end; margin-top: 20px; margin-bottom: 15px;">
							<label class="text4"><i class="fas fa-briefcase" style="margin-right: 5px; "></i>Bina Nusantara Univer...</label>
						</div>

						<div style="display: flex; justify-content: flex-end;">
							<label class="text4" style="float: right;">21/02/2019</label>
						</div>
					</button>

					<button class="btn btninformasi column-c">
						<div class="row">
							<div class="col-lg-3">
								<img src="../icon/avatar.png" alt="Avatar" class="avatar-mini">
							</div>
							<div class="col-lg-6">
								<div><label class="text5">John Dae</label></div>
								<div style="margin-top: -10px"><label class="text4">Summary</label></div>
							</div>
						</div>

						<div style="display: flex; justify-content: flex-end; margin-top: 20px; margin-bottom: 15px;">
							<label class="text4"><i class="fas fa-briefcase" style="margin-right: 5px; "></i>Bina Nusantara Univer...</label>
						</div>

						<div style="display: flex; justify-content: flex-end;">
							<label class="text4" style="float: right;">21/02/2019</label>
						</div>
					</button>

					<button class="btn btninformasi column-c">
						<div class="row">
							<div class="col-lg-3">
								<img src="../icon/avatar.png" alt="Avatar" class="avatar-mini">
							</div>
							<div class="col-lg-6">
								<div><label class="text5">John Dae</label></div>
								<div style="margin-top: -10px"><label class="text4">Summary</label></div>
							</div>
						</div>

						<div style="display: flex; justify-content: flex-end; margin-top: 20px; margin-bottom: 15px;">
							<label class="text4"><i class="fas fa-briefcase" style="margin-right: 5px; "></i>Bina Nusantara Univer...</label>
						</div>

						<div style="display: flex; justify-content: flex-end;">
							<label class="text4" style="float: right;">21/02/2019</label>
						</div>
					</button>

					<button class="btn btninformasi column-c">
						<div class="row">
							<div class="col-lg-3">
								<img src="../icon/avatar.png" alt="Avatar" class="avatar-mini">
							</div>
							<div class="col-lg-6">
								<div><label class="text5">John Dae</label></div>
								<div style="margin-top: -10px"><label class="text4">Summary</label></div>
							</div>
						</div>

						<div style="display: flex; justify-content: flex-end; margin-top: 20px; margin-bottom: 15px;">
							<label class="text4"><i class="fas fa-briefcase" style="margin-right: 5px; "></i>Bina Nusantara Univer...</label>
						</div>

						<div style="display: flex; justify-content: flex-end;">
							<label class="text4" style="float: right;">21/02/2019</label>
						</div>
					</button>

					<button class="btn btninformasi column-c">
						<div class="row">
							<div class="col-lg-3">
								<img src="../icon/avatar.png" alt="Avatar" class="avatar-mini">
							</div>
							<div class="col-lg-6">
								<div><label class="text5">John Dae</label></div>
								<div style="margin-top: -10px"><label class="text4">Summary</label></div>
							</div>
						</div>

						<div style="display: flex; justify-content: flex-end; margin-top: 20px; margin-bottom: 15px;">
							<label class="text4"><i class="fas fa-briefcase" style="margin-right: 5px; "></i>Bina Nusantara Univer...</label>
						</div>

						<div style="display: flex; justify-content: flex-end;">
							<label class="text4" style="float: right;">21/02/2019</label>
						</div>
					</button>
				</div>

				 <!-- Modal button See Details-->
				<div id="closemodal1" class="modal modal-detail">
				 	<div class="flex-title">
						<label class="panel-title">Interview Detail</label>
						<a rel="modal:close" class="text2" style="margin-top: 5px;">Close</a>
					</div>
					<div class="flex-content">
						<div class="modal-margindetail" style="width: 35%;">
		                    <select class="form-control text9">
		                    	<option>Add New Schedule</option>
		                    </select>
							</div>
							<div class="modal-margindetail" style="width: 30%;">
								 <input class="form-control text9" type="date">
							</div>
							<div class="modal-margindetail" style="width: 50%;">
								 <input type="text" class="form-control text9" placeholder="Batch">
							</div>
		               	<div class="modal-margindetail" style="width: 60%;">
		                    <label class="text9">Interview Address</label>
		                    <input type="text" class="form-control text9" placeholder="Interview Address">
		                </div>
		                <div style="display: flex; margin-bottom: 10px; margin-top: 20px;">
		                    <input type="time" class="time3 text9" style="margin-top: 8px; margin-right: 10px;">
		                    <label class="text9" style="margin-top: 8px;  margin-right: 12px;">to</label>
		                    <input type="time" class="time3 text9" style="margin-top: 8px;">
		                </div>
	                    <div class="row modal-margindetail" style="width: 60%;">
		                    <label class="text9">Interviewer's Name</label>
		                    <input type="text" class="form-control text9" placeholder="Interviewer's Name">
		                </div>

		                <div class="row modal-margindetail" style="width: 60%;">
		                    <label class="text9">Notes</label>
		                    <input type="text" class="form-control text9" placeholder="Notes">
		                </div>
					</div>
				</div>
				<!-- / Modal button See Details-->

			</div>
								
		</div>


	

		
		<div style="display: flex; justify-content: center;">
			<div class="text-center bootpag-prev-next"></div>
		</div>
		
		
	</div>
</div>
<!-- /Page Header -->

@endsection