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
					<span class="title">Job Posts</span>
					<small class="display-block subtitle">Lorem ipsum dolor sit amet,<br>consectetur adipiscing elit. </small>
				</h5>
			</div>
		</div>

		<div class="nav-ah-2">
			<div style="display: flex" >
				<div class="panel-k2">
					<form>
						<div class="form-group">
	                        <label class="text">Company Name</label>
	                        <select class="form-control form-control-a text14" id="companyname" placeholder="Company Name" name="companyname" style="width: 80%;">
	                        	<option class="text14">hahha</option>
	                        </select>
	                    </div>

	                    <div class="form-group">
	                        <label class="text">Job Status</label>
	                        <select class="form-control form-control-a text14" id="jobstatus" placeholder="Job Status" name="jobstatus" style="width: 80%;">
	                        	<option class="text14">hahha</option>
	                        </select>
	                    </div>

	                    <div class="row row10">
	                    	<button class="btn btn-link btn-reset">Reset</button>
	                    	<button class="btn btn-filter">Filter</button>
	                    </div>
	                </form>
				</div>
			</div>

			<div style="display: flex; flex-flow: column; width: 100%">
				<div style="display: flex; justify-content: space-around; margin-left: 25px;">
					<div class=" col-lg-7 col-sm-6 col-md-6 form-group">
		            	<!-- <label for="search" class="sr-only">Search Applicants</label> -->
		            	<input type="text" class="form-control text2" name="search" id="search" placeholder="Search for Job Post">
		              	<span class="glyphicon glyphicon-search form-control-feedback" style="color: #246BB3; z-index: 0;"></span>
			         </div>


					<div class="col-lg-4 col-sm-6 col-md-5" style="display: flex; justify-content: flex-end; margin-right: 3%;">
						<div style="margin-right: 10px;" title="descending"><a class="text left20" href="#"><i class="fas fa-sort-amount-down"></i></a></div>
                        <div style="margin-right: 10px;" title="ascending"><a class="text left20" href="#"><i class="fas fa-sort-amount-down-alt"></i></a></div>
						<div>
							<label class="text">Sort by:</label>
							<select class="dropdown-li text14" id="filter" name="filter">
								<option class="text14">test</option>
				            </select>
				        </div>
					</div>
				</div>

				<div class="col-row5">
					<div class="panel-list">
						<div style="margin-right: 60px;">
							<img src="../icon/haha.png" class="avatar-listjob">
						</div>
						<div style="display: flex; flex-direction: column; width: 100%;">
							<div style="display: flex; justify-content: space-between; width: 95%;">
								<div>
									<label class="panel-title">Back End Programmer</label>
									<label class="panel-title">&nbsp;-&nbsp;</label>
									<label class="panel-title">Zen Group</label>
								</div>

								<div>
									<i class="fas fa-edit fa-lg" style="color: #04518D; margin-right:20px;"></i>
									<i class="far fa-trash-alt fa-lg" style="color: #04518D"></i>
								</div>
							</div>
							<div style="display: flex; justify-content: space-between; width: 70%;">
								<div><i class="fas fa-briefcase fa-lg icon"></i><a class="img-icon panel-subtitle text2" style="margin-top: 10px;">Information Technology</a></div>

								<div><i class="fas fa-user-alt fa-lg icon"></i><a class="panel-subtitle text2">Full Time</a></div>
							</div>
							<div style="display: flex; justify-content: space-between; width: 80%; margin-top: 20px;">
								<div>
									<label class="text13">710</label>
									<label class="text13">Viewed</label>
								</div>

								<div>
									<label class="text13">127</label>
									<label class="text13">Favorited</label>
								</div>

								<div>
									<label class="text13">550</label>
									<label class="text13">Applied</label>
								</div>
							</div>
						</div>
					</div>

					<div class="panel-list">
						<div style="margin-right: 60px;">
							<img src="../icon/haha.png" class="avatar-listjob">
						</div>
						<div style="display: flex; flex-direction: column; width: 100%;">
							<div style="display: flex; justify-content: space-between; width: 95%;">
								<div>
									<label class="panel-title">Back End Programmer</label>
									<label class="panel-title">&nbsp;-&nbsp;</label>
									<label class="panel-title">Zen Group</label>
								</div>

								<div>
									<i class="fas fa-edit fa-lg" style="color: #04518D; margin-right:20px;"></i>
									<i class="far fa-trash-alt fa-lg" style="color: #04518D"></i>
								</div>
							</div>
							<div style="display: flex; justify-content: space-between; width: 70%;">
								<div><i class="fas fa-briefcase fa-lg icon"></i><a class="img-icon panel-subtitle text2" style="margin-top: 10px;">Information Technology</a></div>

								<div><i class="fas fa-user-alt fa-lg icon"></i><a class="panel-subtitle text2">Full Time</a></div>
							</div>
							<div style="display: flex; justify-content: space-between; width: 80%; margin-top: 20px;">
								<div>
									<label class="text13">710</label>
									<label class="text13">Viewed</label>
								</div>

								<div>
									<label class="text13">127</label>
									<label class="text13">Favorited</label>
								</div>

								<div>
									<label class="text13">550</label>
									<label class="text13">Applied</label>
								</div>
							</div>
						</div>
					</div>

					<div class="panel-list">
						<div style="margin-right: 60px;">
							<img src="../icon/haha.png" class="avatar-listjob">
						</div>
						<div style="display: flex; flex-direction: column; width: 100%;">
							<div style="display: flex; justify-content: space-between; width: 95%;">
								<div>
									<label class="panel-title">Back End Programmer</label>
									<label class="panel-title">&nbsp;-&nbsp;</label>
									<label class="panel-title">Zen Group</label>
								</div>

								<div>
									<i class="fas fa-edit fa-lg" style="color: #04518D; margin-right:20px;"></i>
									<i class="far fa-trash-alt fa-lg" style="color: #04518D"></i>
								</div>
							</div>
							<div style="display: flex; justify-content: space-between; width: 70%;">
								<div><i class="fas fa-briefcase fa-lg icon"></i><a class="img-icon panel-subtitle text2" style="margin-top: 10px;">Information Technology</a></div>

								<div><i class="fas fa-user-alt fa-lg icon"></i><a class="panel-subtitle text2">Full Time</a></div>
							</div>
							<div style="display: flex; justify-content: space-between; width: 80%; margin-top: 20px;">
								<div>
									<label class="text13">710</label>
									<label class="text13">Viewed</label>
								</div>

								<div>
									<label class="text13">127</label>
									<label class="text13">Favorited</label>
								</div>

								<div>
									<label class="text13">550</label>
									<label class="text13">Applied</label>
								</div>
							</div>
						</div>
					</div>

					<div class="panel-list">
						<div style="margin-right: 60px;">
							<img src="../icon/haha.png" class="avatar-listjob">
						</div>
						<div style="display: flex; flex-direction: column; width: 100%;">
							<div style="display: flex; justify-content: space-between; width: 95%;">
								<div>
									<label class="panel-title">Back End Programmer</label>
									<label class="panel-title">&nbsp;-&nbsp;</label>
									<label class="panel-title">Zen Group</label>
								</div>

								<div>
									<i class="fas fa-edit fa-lg" style="color: #04518D; margin-right:20px;"></i>
									<i class="far fa-trash-alt fa-lg" style="color: #04518D"></i>
								</div>
							</div>
							<div style="display: flex; justify-content: space-between; width: 70%;">
								<div><i class="fas fa-briefcase fa-lg icon"></i><a class="img-icon panel-subtitle text2" style="margin-top: 10px;">Information Technology</a></div>

								<div><i class="fas fa-user-alt fa-lg icon"></i><a class="panel-subtitle text2">Full Time</a></div>
							</div>
							<div style="display: flex; justify-content: space-between; width: 80%; margin-top: 20px;">
								<div>
									<label class="text13">710</label>
									<label class="text13">Viewed</label>
								</div>

								<div>
									<label class="text13">127</label>
									<label class="text13">Favorited</label>
								</div>

								<div>
									<label class="text13">550</label>
									<label class="text13">Applied</label>
								</div>
							</div>
						</div>
					</div>

					<div class="panel-list">
						<div style="margin-right: 60px;">
							<img src="../icon/haha.png" class="avatar-listjob">
						</div>
						<div style="display: flex; flex-direction: column; width: 100%;">
							<div style="display: flex; justify-content: space-between; width: 95%;">
								<div>
									<label class="panel-title">Back End Programmer</label>
									<label class="panel-title">&nbsp;-&nbsp;</label>
									<label class="panel-title">Zen Group</label>
								</div>

								<div>
									<i class="fas fa-edit fa-lg" style="color: #04518D; margin-right:20px;"></i>
									<i class="far fa-trash-alt fa-lg" style="color: #04518D"></i>
								</div>
							</div>
							<div style="display: flex; justify-content: space-between; width: 70%;">
								<div><i class="fas fa-briefcase fa-lg icon"></i><a class="img-icon panel-subtitle text2" style="margin-top: 10px;">Information Technology</a></div>

								<div><i class="fas fa-user-alt fa-lg icon"></i><a class="panel-subtitle text2">Full Time</a></div>
							</div>
							<div style="display: flex; justify-content: space-between; width: 80%; margin-top: 20px;">
								<div>
									<label class="text13">710</label>
									<label class="text13">Viewed</label>
								</div>

								<div>
									<label class="text13">127</label>
									<label class="text13">Favorited</label>
								</div>

								<div>
									<label class="text13">550</label>
									<label class="text13">Applied</label>
								</div>
							</div>
						</div>
					</div>

				</div>


			</div>

		</div>

        <div style="display: flex; justify-content: center;">
            {{-- lihat bootpag-prev-next ada js mana? --}}
			<div class="text-center bootpag-prev-next"></div>
		</div>


	</div>
</div>
<!-- /Page Header -->

@endsection
