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
                <span class="title">Company</span>
                <small class="display-block subtitle">List of Company Partnership</small>
            </h5>

            <a href="/company/add-company" class="verticalCenter">
                <button class="btn-add">Add Company</button>
            </a>
		</div>

        <div class="nav-ah-2">
            <div>
                <div class="panel-k2">
                    <div class="form-group">
                        <label class="text">Job Industry</label>
                        <select class="form-control form-control-a text14" id="jobIndustry" placeholder="Job Status" name="jobIndustry">
                                <option value="">All</option>
                            @foreach ($data['listCompanyIndustry'] as $compIndustry)
                                <option class="{{$compIndustry->industry}}">{{$compIndustry->industry}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="horizontalCenter">
                        {{-- <p>tombol reset harus bisa dihover supaya kelihatan bisa diklik</p> --}}
                        {{-- <p>pakai javascript ga pakai tombol filter</p> --}}
                        <button class="btn btn-link btn-reset linkHover" id="resetCompany">Reset</button>
                        {{-- <button type="submit" class="btn btn-filter">Filter</button> --}}
                    </div>
                </div>
            </div>

            <div style="display: flex; flex-flow: column; width: 100%">
                <div style="display: flex; justify-content: space-around; margin-left: 25px;">
                    <div class=" col-lg-7 col-sm-6 col-md-6 form-group">
                        <!-- <label for="search" class="sr-only">Search Applicants</label> -->
                        <input type="text" class="form-control text2" name="searchCompany" id="searchCompany" placeholder="Search Company">
                        <span class="glyphicon glyphicon-search form-control-feedback" style="color: #246BB3; z-index: 0;"></span>
                    </div>


                    <div class="col-lg-4 col-sm-6 col-md-5" style="display: flex; justify-content: flex-end; margin-right: 3%;">
                        <div style="margin-right: 10px;"><a class="text left20" href="#" title="Descending" id="btnDesc"><i class="fas fa-sort-amount-down"></i></a></div>
                        <div style="margin-right: 10px;"><a class="text left20" href="#" title="Ascending" id="btnAsc"><i class="fas fa-sort-amount-down-alt"></i></a></div>
                        <input type="hidden" id="adesc" value="asc">
                        <div title="Sort By">
                            <label class="text" >Sort by:</label>
                            <select class="dropdown-li text14" id="cbSortBy" name="cbSortBy">
                                <option value="name" class="text14">Name</option>
                                <option value="amount" class="text14">Total Job Post</option>
                            </select>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>

                <div class="col-row5" id="companyColumn">
                    <h3>Total Data : {{$data['listCompany']->total()}}</h3>
                    @foreach ($data['listCompany'] as $company)
                        <a type="button" href="/company/detail/{{$company->id}}" >
                            <div class="panel-list">
                                <div style="margin-right: 60px;">
                                    <img src="../images/nusatalent.png" class="avatar-listjob">
                                </div>
                                <div style="display: flex; flex-direction: column; width: 100%;">
                                    <div style="display: flex; justify-content: space-between; width: 95%;">
                                        <div>
                                            <label class="panel-title">{{$company->name}}</label>
                                        </div>

                                        <div>
                                            <object>
                                            <a type="button" href="/company/edit/{{$company->id}}">
                                                <i class="fas fa-edit fa-lg" style="color: #04518D; margin-right:20px;"></i>
                                            </a>
                                            <a type="button" data-toggle="modal" data-target="#deleteCompany{{$company->id}}">
                                                <i class="far fa-trash-alt fa-lg" style="color: #04518D;"></i>
                                            </a>
                                            </object>
                                        </div>
                                    </div>

                                    <div style="display: flex; width: 57%;">
                                        <div>
                                            <i class="fas fa-map-marker-alt fa-lg icon"></i>
                                            <object>
                                            <a class="img-icon panel-subtitle text2" style="margin-top: 10px;">Location (lokasi tidak ada di column table company_profile, ngambil yang mana?)</a>
                                            </object>
                                        </div>
                                    </div>

                                    <div style="display: flex; justify-content: space-between; width: 80%; margin-top: 20px;">
                                        {{-- Company Viewed dan Company Favorited sudah tidak ada --}}
                                        {{--  --}}

                                        {{-- <div>
                                            <label class="text13">710</label>
                                            <label class="text13">Viewed</label>
                                        </div>

                                        <div>
                                            <label class="text13">127</label>
                                            <label class="text13">Favorited</label>
                                        </div> --}}

                                        <div>
                                        @if ($company->amount)
                                            <label class="text13">{{$company->amount}}</label>
                                            <label class="text13">Job&nbsp;Post(s)</label>
                                        @else
                                            <label class="text13">No Job Post</label>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- Modal Delete !-->
                        <div class="modal fade" id="deleteCompany{{$company->id}}">
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
                        </div>

                    @endforeach
                    {{-- <div class="bootpag-prev-next"> --}}
                    {{$data['listCompany']->links()}}

                    {{-- </div> --}}

                    {{-- <div class="panel-list">
                        <div style="margin-right: 60px;">
                            <img src="../icon/haha.png" class="avatar-listjob">
                        </div>
                        <div style="display: flex; flex-direction: column; width: 100%;">
                            <div style="display: flex; justify-content: space-between; width: 95%;">
                                <div>
                                    <label class="panel-title">Zen Group</label>
                                </div>

                                <div>
                                    <i class="fas fa-edit fa-lg" style="color: #04518D; margin-right:20px;"></i>
                                    <i class="far fa-trash-alt fa-lg" style="color: #04518D"></i>
                                </div>
                            </div>

                            <div style="display: flex; width: 57%;">
                                <div><i class="fas fa-map-marker-alt fa-lg icon"></i><a class="img-icon panel-subtitle text2" style="margin-top: 10px;">Location</a></div>
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
                                    <label class="text13">10</label>
                                    <label class="text13">Job&nbsp;Post(s)</label>
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
                                    <label class="panel-title">Zen Group</label>
                                </div>

                                <div>
                                    <i class="fas fa-edit fa-lg" style="color: #04518D; margin-right:20px;"></i>
                                    <i class="far fa-trash-alt fa-lg" style="color: #04518D"></i>
                                </div>
                            </div>

                            <div style="display: flex; width: 57%;">
                                <div><i class="fas fa-map-marker-alt fa-lg icon"></i><a class="img-icon panel-subtitle text2" style="margin-top: 10px;">Location</a></div>
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
                                    <label class="text13">10</label>
                                    <label class="text13">Job&nbsp;Post(s)</label>
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
                                    <label class="panel-title">Zen Group</label>
                                </div>

                                <div>
                                    <i class="fas fa-edit fa-lg" style="color: #04518D; margin-right:20px;"></i>
                                    <i class="far fa-trash-alt fa-lg" style="color: #04518D"></i>
                                </div>
                            </div>

                            <div style="display: flex; width: 57%;">
                                <div><i class="fas fa-map-marker-alt fa-lg icon"></i><a class="img-icon panel-subtitle text2" style="margin-top: 10px;">Location</a></div>
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
                                    <label class="text13">10</label>
                                    <label class="text13">Job&nbsp;Post(s)</label>
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
                                    <label class="panel-title">Zen Group</label>
                                </div>

                                <div>
                                    <i class="fas fa-edit fa-lg" style="color: #04518D; margin-right:20px;"></i>
                                    <i class="far fa-trash-alt fa-lg" style="color: #04518D"></i>
                                </div>
                            </div>

                            <div style="display: flex; width: 57%;">
                                <div><i class="fas fa-map-marker-alt fa-lg icon"></i><a class="img-icon panel-subtitle text2" style="margin-top: 10px;">Location</a></div>
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
                                    <label class="text13">10</label>
                                    <label class="text13">Job&nbsp;Post(s)</label>
                                </div>
                            </div>
                        </div>
                    </div> --}}
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
