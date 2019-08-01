@if ($data['result'])
						@foreach($data['result'] as $row)
							@if($row->job_post_status === 0)
								<div class="panel panel-white panel-container panel-job-post" data-status="inactive-job" data-j="{{ $row->job_post_id }}" style="display: block;">
									<div class="panel-body">
										<!-- Inactive -->
										<i class="icon-primitive-dot job-post-status-icon ic-grey" id="panel-status-{{ $row->job_post_id }}"></i>
							@endif
							
							@if($row->job_post_status === 1)
								<div class="panel panel-white panel-container panel-job-post" data-status="active-job" data-j="{{ $row->job_post_id }}" style="display: block;">
									<div class="panel-body">
										<!-- Active -->
										<i class="icon-primitive-dot job-post-status-icon ic-light-blue" id="panel-status-{{ $row->job_post_id }}"></i>
							@endif
							
							@if($row->job_post_status === 2)
								<div class="panel panel-white panel-container panel-job-post" data-status="archive-job" data-j="{{ $row->job_post_id }}" style="display: block;">
									<div class="panel-body">
										<!-- Archived -->
										<i class="icon-primitive-dot job-post-status-icon ic-pink" id="panel-status-{{ $row->job_post_id }}"></i>
							@endif

										<div class="col-lg-6">
											<a href="{{ URL::to('student/j='.$row->job_post_id)}}">
												<p class="job-post-position">{{ $row->job_position }}</p>
											</a>
											<p class="job-post-work-location">{{ $row->work_location }}</p>
											<p class="job-post-created-at">Dibuat pada {{ date_format(date_create($row->created_at), "j F Y") }}</p>
											<div class="row">
												<div class="col-lg-2 text-grey">
													<i class="icon-eye position-left"></i> {{ $row->total_viewed == NULL ? 0 : $row->total_viewed }}
												</div>
												<div class="col-lg-2 text-grey">
													<i class="icon-star-full2 position-left"></i> {{ $row->total_favorite == NULL ? 0 : $row->total_favorite }}
												</div>
												<div class="col-lg-2 text-grey">
													<i class="icon-profile position-left"></i> {{ $row->total_applied == NULL ? 0 : $row->total_applied }}
												</div>
											</div>
										</div>
										
										<div class="col-lg-2">
											@if($row->job_post_status === 0)
												<!-- Inactive -->
												<p class="ic-grey job-post-status-text" id="job-post-status-{{ $row->job_post_id }}">
													<i class="icon-primitive-dot position-left"></i> Status: Inactive
												</p>
											@endif

											@if($row->job_post_status === 1)
												<!-- Active -->
												<p class="ic-light-blue job-post-status-text" id="job-post-status-{{ $row->job_post_id }}">
													<i class="icon-primitive-dot position-left"></i> Status: Active
												</p>
											@endif

											@if($row->job_post_status === 2)
												<!-- Archived -->
												<p class="ic-pink job-post-status-text" id="job-post-status-{{ $row->job_post_id }}">
													<i class="icon-primitive-dot position-left"></i> Status: Archived
												</p>
											@endif
									
												
										</div>
										
										<div class="col-lg-2 manage-job-post">
											<select id="status-select-{{$row->job_post_id}}" class="select job-post-status" style="margin: 3px 0;" data-id="{{$row->job_post_id}}" data-j="{{$row->job_position}}" 
												data-s='{{ $row->job_post_status === 0 ? "in" : "" }}{{ $row->job_post_status === 1 ? "ac" : "" }}{{ $row->job_post_status === 2 ? "ar" : "" }}'>
												<option value="in" {{ $row->job_post_status === 0 ? "selected" : "" }}> Inactive </option>
												<option value="ac" {{ $row->job_post_status === 1 ? "selected" : "" }}> Active </option>
												<!-- <option value="ar" {{ $row->job_post_status === 2 ? "selected" : "" }}> Archived </option> -->
											</select>
										</div>

										<div class="col-lg-1">
											<a href="/edit-job-post/j={{$row->job_post_id}}"><button type="button" class="btn job-post-action-button"><i class="material-icons">edit</i></button></a>
										</div>

										<div class="col-lg-1">
											<button type="button" class="btn job-post-action-button delete-job-post" data-j="{{$row->job_post_id}}" data-jp="{{ $row->job_position }}"><i class="material-icons">delete</i></button>
										</div>
										
										<!-- <div class="checkbox job-post-checkbox">
											<input type="checkbox" class="styled">
										</div> -->
									</div>
								</div>
						@endforeach
					@endif


SELECT SUM(CASE WHEN id IS NOT NULL THEN 1 ELSE 0 END) AS totalCompany,
		MONTH(created_at),
        CASE
			WHEN MONTH(created_at) = 2 THEN WEEK(created_at) - 4
            WHEN MONTH(created_at) = 3 THEN WEEK(created_at) - 8
            WHEN MONTH(created_at) = 4 THEN WEEK(created_at) - 12
            WHEN MONTH(created_at) = 5 THEN WEEK(created_at) - 16
            WHEN MONTH(created_at) = 6 THEN WEEK(created_at) - 20
            WHEN MONTH(created_at) = 7 THEN WEEK(created_at) - 24
            WHEN MONTH(created_at) = 8 THEN WEEK(created_at) - 28
            WHEN MONTH(created_at) = 9 THEN WEEK(created_at) - 32
            WHEN MONTH(created_at) = 10 THEN WEEK(created_at) - 36
            WHEN MONTH(created_at) = 11 THEN WEEK(created_at) - 40
            WHEN MONTH(created_at) = 12 THEN WEEK(created_at) - 44
		END AS week
FROM company_profile
GROUP BY MONTH(created_at), week
