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
                    <span class="title">Add Career Fair</span>
                    <small class="display-block subtitle">Add Event on University</small>
                </h5>
            </div>
        </div>

        <div class="panel-card" style="flex-direction: column;">
            <form method="get" action="/event/{{$data['eventID']}}/editEventData">
                {{ csrf_field() }}
                <div style="display: flex;">
                    <div style="margin-right: 30px;">
                        <img src="{{asset('assets/icons/nusatalent.png')}}" class="avatar-listjob">
                    </div>

                    <div class="col-lg-6 col-sm-5 col-md-6" style="margin-right: 5%; margin-top: 50px;">
                        <input type="text" class="form-control text2 form-bottom" id="eventName" placeholder="Event Name" name="eventName" value="{{$data['eventData']->name}}">
                    </div>
                    <input type="hidden" id="eventID" name="eventID" value="{{$data['eventID']}}">
                    {{-- <div class="col-lg-1 col-sm-1 col-md-1" style="margin-top: 50px;">
					<label class="text7" style="margin-top: 8px;">Event: </label>
				</div>
				<div class="col-lg-1 col-sm-2 col-md-2" style="margin-right: 5%; margin-top: 50px;">
					<select class="form-control text2 form-bottom" placeholder="Event" name="event">
						<option class="text2">Test</option>
					</select>
				</div>
				<div class="col-xl-1 col-lg-2 col-sm-3 col-md-2" style="margin-top: 50px;">
					<label class="text7" style="margin-top: 8px;">Booth&nbsp;Number: </label>
				</div>
				<div class="col-lg-1 col-sm-2 col-md-2" style="margin-right: 40px; margin-top: 50px;">
					<select class="form-control text2 form-bottom" placeholder="Booth Number" name="boothnumber">
						<option class="text2">Test</option>
					</select>
				</div> --}}

                </div>

                <div style="display: flex; margin-top: 30px;">
                    <div style="margin-left: 13px;">
                        <label class="text3">Profile</label>
                    </div>
                    <div class="flex-content" style="width: 50%; margin-left: 30px;">
                        <div style="width: 95%;">
                            <textarea class="text2 textareaAC" style="overflow:auto;height: 100px !important; width: 100%; padding: 8px;" onkeyup="textAreaAdjust(this)" placeholder="Description of this Event..." name="eventShortDesc" id="eventShortDesc">{{$data['eventData']->description}}</textarea>
                        </div>
                        <div class="flex-content" style="width: 50%; margin-top: 5px;">
                            <label class="text16">Start Date</label>
                            <input type="date" class="form-control text2 form-bottom" id="startDate" name="startDate" value="{{$data['eventData']->startDate}}">
                        </div>
                        <div class="flex-content" style="width: 50%; margin-top: 5px;">
                            <label class="text16">End Date</label>
                            <input type="date" class="form-control text2 form-bottom" id="endDate" name="endDate" value="{{$data['eventData']->endDate}}">
                        </div>
                        <div class="flex-content" style="width: 50%; margin-top: 5px;">
                            <label class="text16">Capacity</label>
                            <input type="number" class="form-control text2 form-bottom" id="capacity" name="capacity" placeholder="kapasitas peserta perusahaan" value="{{$data['eventData']->capacity}}">
                        </div>
                        <div class="flex-content" style="width: 50%; margin-top: 5px;">
                            <label class="text16">Place</label>
                            <input type="text" class="form-control text2 form-bottom" id="place" name="place" placeholder="pengambilan dari map google API" value="{{$data['eventData']->place}}">
                        </div>
                        <div class="flex-content" style="width: 50%;">
                            <hr class="hr-1">
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: flex-end;">
                    <button type="submit" class="btn-manage">Save Changes</button>
                    <a href="/event" class="btn btn-manage" style="background:tomato;">Cancel</a>
                </div>
            </form>
            {{-- end of form company-form --}}

        </div>

    </div>
</div>
<!-- /Page Header -->

@endsection
