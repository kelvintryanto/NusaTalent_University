<meta name="_token" content="{{ csrf_token() }}"/>

@extends('layouts.generaltemplate')
@section('content')

<!-- Page Header -->
<div class="page-header">
	<!-- Navbar -->
	{!!$data['navbar']!!}
	<!-- /Navbar -->

    <!-- Page Container -->
	<div class="page-container">
		<div class="nav-ah-1">
            <h5>
                <span class="title">Event Dashboard</span>
                <small class="display-block subtitle">Event List and Summary of Job Fair</small>
            </h5>

            <a href="/event/addEvent" class="verticalCenter">
                <button class="btn-add">Add Event</button>
            </a>
		</div>

        <div class="nav-ah-2">
            <div>
                <div class="panel-k2">
                    <div class="form-group">
                        <label class="text">Status</label>
                        <select class="form-control form-control-a text14" id="statusActive" name="statusActive">
                            <option value="">All</option>
                            <option value=">=">Active</option>
                            <option value="<">Expired</option>
                        </select>
                    </div>

                    <div class="horizontalCenter">
                        {{-- <p>tombol reset harus bisa dihover supaya kelihatan bisa diklik</p> --}}
                        {{-- <p>pakai javascript ga pakai tombol filter</p> --}}
                        <button class="btn btn-link btn-reset linkHover" id="resetEvent">Reset</button>
                        {{-- <button type="submit" class="btn btn-filter">Filter</button> --}}
                    </div>
                </div>
            </div>

            <div style="display: flex; flex-flow: column; width: 100%">
                <div style="display: flex; justify-content: space-around; margin-left: 25px;">
                    <div class=" col-lg-7 col-sm-6 col-md-6 form-group">
                        <!-- <label for="search" class="sr-only">Search Applicants</label> -->
                        <input type="text" class="form-control text2" name="searchEventCompany" id="searchEventCompany" placeholder="Search Event...">
                        <span class="glyphicon glyphicon-search form-control-feedback" style="color: #246BB3; z-index: 0;"></span>
                    </div>


                    <div class="col-lg-4 col-sm-6 col-md-5" style="display: flex; justify-content: flex-end; margin-right: 3%;">
                        <div style="margin-right: 10px;"><a class="text left20" href="#" title="Descending" id="btnDescEvent"><i class="fas fa-sort-amount-down"></i></a></div>
                        <div style="margin-right: 10px;"><a class="text left20" href="#" title="Ascending" id="btnAscEvent"><i class="fas fa-sort-amount-down-alt"></i></a></div>
                        <input type="hidden" id="adesc" value="asc">
                        <div title="Sort By">
                            <label class="text" >Sort by:</label>
                            <select class="dropdown-li text14" id="sortByEvent" name="sortByEvent">
                                <option value="startDate" class="text14">Date</option>
                                <option value="name" class="text14">Name</option>
                                <option value="" class="text14">Company</option>
                                <option value="" class="text14">Job Post</option>
                                <option value="" class="text14">Visitor</option>
                            </select>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>

                <div class="col-row5" id="eventColumn">
                    {{-- <h3>Total Data : </h3> --}}
                    @foreach ($data['eventList'] as $eventList)
                        <a type="button" href="/event/{{$eventList->id}}" >
                            <div class="panel-list">
                                <div style="margin-right: 60px;">
                                    <img src="../images/nusatalent.png" class="avatar-listjob">
                                </div>
                                <div style="display: flex; flex-direction: column; width: 100%;">
                                    <div style="display: flex; justify-content: space-between; width: 95%;">
                                        <div>
                                            <label class="panel-title">{{$eventList->name}}</label>
                                        </div>

                                        <div>
                                            <object>
                                            <a type="button" href="/event/{{$eventList->id}}/editEvent">
                                                <i class="fas fa-edit fa-lg" style="color: #04518D; margin-right:20px;"></i>
                                            </a>
                                            <a type="button" data-toggle="modal" data-target="#deleteCompany">
                                                <i class="far fa-trash-alt fa-lg" style="color: #04518D;"></i>
                                            </a>
                                            </object>
                                        </div>
                                    </div>

                                    <div style="display: flex; width: 57%;">
                                        <div>
                                            <i class="fas fa-map-marker-alt fa-lg icon"></i>
                                            <object>
                                                <a class="img-icon panel-subtitle text2" style="margin-top: 10px;">Location (Lokasi diambil dari career_location table, bikin baru)</a>
                                            </object>
                                        </div>
                                    </div>

                                    <div style="display: flex; justify-content: space-between; width: 80%; margin-top: 20px;">
                                        {{-- Company Viewed dan Company Favorited sudah tidak ada --}}


                                        <div>
                                            <label class="text13">{{$eventList->company}}</label>
                                            <label class="text13">Company</label>
                                        </div>

                                        <div>
                                            <label class="text13">75</label>
                                            <label class="text13">Job Post(s)</label>
                                        </div>

                                        <div>
                                                <label class="text13">800</label>
                                                <label class="text13">Visitor(s)</label>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- Modal Delete !-->
                        {{-- <div class="modal fade" id="deleteCompany{{$company->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h5 class="modal-title">Delete Company</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure want to deactive this company <b>{{$company->name}}</b> ?</p>
                                    </div>
                                    <form action="/company/delete/{{$company->id}}">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger" autofocus>Yes</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}

                    @endforeach
                    {{-- <div class="bootpag-prev-next"> --}}
                    {{-- {{$data['listCompany']->links()}} --}}
                </div>
            </div>
        </div>

		<div style="display: flex; justify-content: center;">
			<div class="text-center bootpag-prev-next"></div>
        </div>
	</div>
</div>
<!-- /Page Header -->
    </div>
</div>
@endsection
