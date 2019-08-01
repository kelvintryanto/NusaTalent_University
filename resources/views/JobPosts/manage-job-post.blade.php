<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Career Center - Manage Job Post </title>
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

				<!-- Content area -->
				<div class="content">
				
					<!-- Page header -->
					<div class="page-header border-bottom border-bottom-grey-50">
						<div class="page-header-content">
							<div class="page-title">
								<div class="row">
									<div class="col-lg-3">
										<p class="no-margin">Job Posts</p>
									</div>
									
									<div class="col-lg-4">
										<form action="#">
											<div class="input-group">
												<input type="text" id="search-job-post" class="form-control" placeholder="Search job posts">
												<span class="input-group-btn">
													<button class="btn btn-default" type="submit" id="search-job-post-button"><i class="icon-search4"></i></button>
												</span>
											</div>
										</form>
									</div>
									
									<div class="col-lg-2 col-lg-offset-3 text-right">
										<span class="no-padding" id="total-job-post">
											{{ $data['totalJobPost'] == NULL ? 0 : $data['totalJobPost'] }} {{ $data['totalJobPost'] > 1 ? "Jobs" : "Job" }}
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /page header -->
					
					
					<!-- Chips -->
					<div class="row">
						<div class="col-lg-12">
							<div class=" chips-container">
							<button type="button" class="btn btn-xs btn-rounded active" id="all-job-button">All Jobs</button>
							<button type="button" class="btn btn-xs btn-rounded" id="active-job-button"><i class="ic-light-blue icon-primitive-dot position-left"></i> Active Jobs</button>
							<!-- <button type="button" class="btn btn-xs btn-rounded"><i class="ic-orange icon-primitive-dot position-left"></i> Draft Jobs</button> -->
							<button type="button" class="btn btn-xs btn-rounded" id="inactive-job-button"><i class="ic-grey icon-primitive-dot position-left"></i> Inactive Jobs</button>
							<!-- <button type="button" class="btn btn-xs btn-rounded"><i class="ic-pink icon-primitive-dot position-left"></i> Archived Jobs</button>
							<button type="button" class="btn btn-xs btn-rounded"><i class="icon-three-bars position-left"></i> Filters</button> -->
						</div></div>
					</div>
					<!-- /chips -->
					
					@if ($data['lstJobPost'])
						@foreach($data['lstJobPost'] as $row)
							@if($row->jobPostStatus === 0)
								<div class="panel panel-white panel-container panel-job-post" data-status="inactive-job" data-j="{{ $row->jobPostID }}" style="display: block;">
									<div class="panel-body">
										<!-- Inactive -->
										<i class="icon-primitive-dot job-post-status-icon ic-grey" id="panel-status-{{ $row->jobPostID }}"></i>
							@endif
							
							@if($row->jobPostStatus === 1)
								<div class="panel panel-white panel-container panel-job-post" data-status="active-job" data-j="{{ $row->jobPostID }}" style="display: block;">
									<div class="panel-body">
										<!-- Active -->
										<i class="icon-primitive-dot job-post-status-icon ic-light-blue" id="panel-status-{{ $row->jobPostID }}"></i>
							@endif
							
							@if($row->jobPostStatus === 2)
								<div class="panel panel-white panel-container panel-job-post" data-status="archive-job" data-j="{{ $row->jobPostID }}" style="display: block;">
									<div class="panel-body">
										<!-- Archived -->
										<i class="icon-primitive-dot job-post-status-icon ic-pink" id="panel-status-{{ $row->jobPostID }}"></i>
							@endif

										<div class="col-lg-6">
											<a href="{{ URL::to('student/j='.$row->jobPostID)}}">
												<p class="job-post-position">{{ $row->jobPosition }} </p>
											</a>
											<p class="job-post-work-location" style="color: #5d7089;"> {{ $row->companyName }}</p>
											<p class="job-post-work-location">{{ $row->workLocation }}</p>
											<p class="job-post-created-at">Dibuat pada {{ date_format(date_create($row->jobPostCreatedDate), "j F Y") }}</p>
											<div class="row">
												<div class="col-lg-2 text-grey">
													<i class="icon-eye position-left"></i> {{ $row->totalViewed == NULL ? 0 : $row->totalViewed }}
												</div>
												<div class="col-lg-2 text-grey">
													<i class="icon-star-full2 position-left"></i> {{ $row->totalFavorite == NULL ? 0 : $row->totalFavorite }}
												</div>
												<div class="col-lg-2 text-grey">
													<i class="icon-profile position-left"></i> {{ $row->totalApplied == NULL ? 0 : $row->totalApplied }}
												</div>
											</div>
										</div>
										
										<div class="col-lg-2">
											@if($row->jobPostStatus === 0)
												<!-- Inactive -->
												<p class="ic-grey job-post-status-text" id="job-post-status-{{ $row->jobPostID }}">
													<i class="icon-primitive-dot position-left"></i> Status: Inactive
												</p>
											@endif

											@if($row->jobPostStatus === 1)
												<!-- Active -->
												<p class="ic-light-blue job-post-status-text" id="job-post-status-{{ $row->jobPostID }}">
													<i class="icon-primitive-dot position-left"></i> Status: Active
												</p>
											@endif

											@if($row->jobPostStatus === 2)
												<!-- Archived -->
												<p class="ic-pink job-post-status-text" id="job-post-status-{{ $row->jobPostID }}">
													<i class="icon-primitive-dot position-left"></i> Status: Archived
												</p>
											@endif
									
												
										</div>
										
										<div class="col-lg-2 manage-job-post">
											<select id="status-select-{{$row->jobPostID}}" class="select job-post-status" style="margin: 3px 0;" data-id="{{$row->jobPostID}}" data-j="{{$row->jobPosition}}" 
												data-s='{{ $row->jobPostStatus === 0 ? "in" : "" }}{{ $row->jobPostStatus === 1 ? "ac" : "" }}{{ $row->jobPostStatus === 2 ? "ar" : "" }}'>
												<option value="in" {{ $row->jobPostStatus === 0 ? "selected" : "" }}> Inactive </option>
												<option value="ac" {{ $row->jobPostStatus === 1 ? "selected" : "" }}> Active </option>
												<!-- <option value="ar" {{ $row->jobPostStatus === 2 ? "selected" : "" }}> Archived </option> -->
											</select>
										</div>

										<div class="col-lg-1" style="margin-top: 0.9%;">
											<a href="/JobPost/Edit/jpID={{$row->jobPostID}}"><button type="button" class="btn job-post-action-button"><i class="material-icons">edit</i></button></a>

											<button type="button" class="btn job-post-action-button delete-job-post" data-j="{{$row->jobPostID}}" data-jp="{{ $row->jobPosition }}"><i class="material-icons">delete</i></button>
										</div>

										<div class="col-lg-1">
											
										</div>
										
										<!-- <div class="checkbox job-post-checkbox">
											<input type="checkbox" class="styled">
										</div> -->
									</div>
								</div>
						@endforeach
					@endif
				</div>
				<!-- /content area -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /Page Content -->
	</div>
	<?php echo $data['js']; ?>
</body>
</html>