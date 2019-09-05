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
					<span class="title">Add Company Event</span>
					<small class="display-block subtitle">Add University Partnership with Company</small>
				</h5>
			</div>
		</div>

        <div class="panel-card" style="flex-direction: column;">
            <form method="get" action="/event/{{$data['eventID']}}/addCompanyData">
                {{ csrf_field() }}
            <div style="display: flex;">
				<div style="margin-right: 30px;">
					<img src="{{asset('assets/icons/nusatalent.png')}}" class="avatar-listjob">
				</div>

				<div class="col-lg-6 col-sm-5 col-md-6" style="margin-right: 5%; margin-top: 50px;">
					<input type="text" class="form-control text2 form-bottom" id="companyEventName" placeholder="Company Name" name="companyEventName">
                </div>
                <input style="display: none;" class="form-control" value="{{$data['eventID']}}" id="eventID" name="eventID">
				{{-- <div class="col-lg-1 col-sm-1 col-md-1" style="margin-top: 50px;">
					<label class="text7" style="margin-top: 8px;">Event: </label>
				</div>
				<div class="col-lg-1 col-sm-2 col-md-2" style="margin-right: 5%; margin-top: 50px;">
					<select class="form-control text2 form-bottom" placeholder="Event" name="event">
						<option class="text2">Test</option>
					</select>
				</div> --}}
				<div style="margin-top: 50px;">
					<label class="text7" style="margin-top: 8px;">Booth Number: </label>
				</div>
				<div class="col-lg-1 col-sm-2 col-md-2" style="margin-top: 50px;">
                    <input type="text" class="form-control text2 form-bottom" id="boothNo" name="boothNo">
				</div>

			</div>

			<div style="display: flex; margin-top: 30px;">
				<div style="margin-left: 13px;">
					<label class="text3">Profile</label>
				</div>
				<div class="flex-content" style="width: 100%; margin-left: 30px;">
					<div style="width: 95%;">
						<textarea class="text2 textareaAC" style="overflow:auto;height: 100px !important; width: 100%; padding: 8px;" onkeyup="textAreaAdjust(this)" placeholder="Description of this company... " name="companyEventDesc" id="companyEventDesc"></textarea>
					</div>
					<div class="flex-content" style="margin-top: 20px;">
						<label class="text16">Website</label>
						<input type="text" class="form-control text2 form-bottom" id="companyWebsiteEvent" placeholder="Ex: https://www.google.com" name="companyWebsiteEvent" style="width: 50%;">
					</div>
					<div class="flex-content" style="margin-top: 20px;">
						<label class="text16">Number of Employees</label>
						<select type="text" class="form-control text2 form-bottom" id="companyEventEmployees" placeholder="Number of Employees" name="companyEventEmployees" style="width: 50%;">
							<option class="text2" value="">Select Number of Employee...</option>
							@foreach($data['totalEmployee'] as $employee)
								<option class="text2" value="{{$employee->description}}">{{$employee->description}}	</option>
							@endforeach
						</select>
					</div>
					<div class="flex-content" style="margin-top: 20px;">
						<label class="text16">Industry</label>
						<select type="text" class="form-control text2 form-bottom" id="companyEventIndustry" placeholder="Industry" name="companyEventIndustry" style="width: 25%;">
							<option class="text2" value="">Select Industry...</option>
							@foreach($data['industry'] as $industry)
								<option class="text2" value="{{$industry->description}}">{{$industry->description}}</option>
							@endforeach
						</select>
					</div>
					<div class="flex-content" style="margin-top: 20px;">
						<label class="text16">LinkedIn</label>
						<input type="text17" class="form-control text2 form-bottom" id="companyEventLinkedin" placeholder="LinkedIn" name="companyEventLinkedin" style="width: 50%;">
					</div>

					<div class="flex-content" style="width: 50%;">
						<hr class="hr-1">
					</div>
                </div>
            </div>
            <div style="display: flex; justify-content: flex-end;">
                <button type="submit" class="btn-manage">Save Changes</button>
            </div>
            </form>
            {{-- end of form company-form --}}
		</div>

	</div>
</div>
<!-- /Page Header -->

@endsection
