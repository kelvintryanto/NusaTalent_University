<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> Career Center - List Company </title>
	{!!$data['css']!!}
	<link href="{{ url('assets/css/manage-job-post.css') }}" rel="stylesheet" type="text/css">
</head>
<body class="navbar-top">

	 <!-- Loader -->
    <div class="loader-container">
        <div class="loader-logo">
            <div class="loader">
            </div>
        </div>
    </div>
    <!-- /loader -->

	<?php echo $data['navbar'];?>

	<div class="page-container no-padding">
		<!-- Page Content -->
		<div class="page-content bg-main-color">

			{!! $data['sidebar'] !!}

			<div class="container-wrapper">

				<!-- Content Area -->
				
				<div class="content">
				
					<!-- Page header -->
					<div class="page-header border-bottom border-bottom-grey-50" style="margin-bottom: 1%;">
						<div class="page-header-content">
							<div class="page-title">
								<div class="row">
									<div class="col-lg-3">
										<p class="no-margin">List Company</p>
									</div>
									<div class="col-lg-4">
										<form action="#">
											<select class="select text-right" id="cbSortBy">
												<option value=""> Sort By </option>
												<option value="totalApplied"> Total Applied </option>
												<option value="totalViewed"> Total Viewed </option>
												<option value="totalFavorite"> Total Favorite </option>
											</select>
											<div class="input-group" style="margin-top: 2%;">
												<input type="text" id="search-job-post" class="form-control" placeholder="Search company">
											</div>
										</form>
									</div>
									<div class="col-lg-3 col-lg-offset-1 text-right">
										<span class="no-padding">
											Total Company:
										</span>
										<span class="no-padding" id="total-job-post">
											{{ $data['totalCompany'] == NULL ? 0 : $data['totalCompany']}}
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /page header -->
					<!-- Container for list company -->
					
					@if($data['lstCompany'])
						@foreach($data['lstCompany'] as $row)
						<div class="panel panel-white panel-container panel-list-company">
							<div class="panel-body" id="company-{{$row->companyID}}">	
								<!-- Inactive -->
								<div class="row">
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-4">
												<p class="text-company-name"> {!! $row->companyName !!} </p>
											</div>
											<div class="col-lg-offset-5 col-lg-3">
												<p> Booth number: <span class="job-post-work-location"> <b> #{{ $row->boothNumber != NULL ? $row->boothNumber : " hasn't assigned yet"}} </b> </span> </p>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<p class="job-post-work-location" style="color: #00BFFF;opacity: 0.5;"> {!! $row->companyLocation !!} </p>
											</div>
											<div class="col-lg-offset-3 col-lg-3">
												<p> Total job post: <span class="job-post-work-location"> <b> {{ $row->totalJobPost != NULL ? $row->totalJobPost : 0 }}</b> </span> </p>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<p class="job-post-work-location"> {!! $row->companyIndustry !!}</p>
											</div>
											<div class="col-lg-offset-3 col-lg-3">
												<p> Last Login: <span style="color: #C7C7C7;"> <b> {{ $row->updated_at != "0000-00-00 00:00:00" ? date_format(date_create($row->updated_at), "l, d/m/Y") : "no signing yet" }} </b> </span> </p>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-2 text-grey">
												<i class="icon-eye position-left"></i> 
												{!! $row->totalViewed == NULL ? 0 : $row->totalViewed !!}
											</div>
											<div class="col-lg-2 text-grey">
												<i class="icon-star-full2 position-left"></i> 
												{!! $row->totalFavorite == NULL ? 0 : $row->totalFavorite !!}
											</div>
											<div class="col-lg-2 text-grey">
												<i class="icon-profile position-left"></i> 
												{!! $row->totalApplied == NULL ? 0 : $row->totalApplied !!}
											</div>
											<div class="col-lg-2">
												<a href="/Company/edit-profile/cID={{$row->companyID}}">
													<button type="button" class="btn job-post-action-button">
														<i class="material-icons">edit</i>
													</button>
												</a>
												<button type="button" class="btn job-post-action-button delete-job-post" 
													data-name="{{$row->companyName}}" data-id="{{$row->companyID}}" style="background-color: red;">
													<i class="material-icons">delete</i>
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					@endif
					<!-- /End company
				</div>
				<!-- /Content -->

			</div>
		</div>
		<!-- /Page Content -->
	</div>
	<?php echo $data['js']; ?>
	<script type="text/javascript" src="{{ url('assets/js/manage-list-company.js') }}"></script>
</body>
</html>