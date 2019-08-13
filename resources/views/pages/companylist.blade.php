@extends('layouts.generaltemplate')
@section('content')


<!-- Page Header -->
<div class="page-header">
	<!-- Navbar -->
	@include('includes.navbar')
	<!-- /Navbar -->

    <!-- Page Container -->
	<div class="page-container">
        <ul>

        </ul>
		<div class="nav-ah-1">
			<div class="page-title">
				<h5>
					<span class="title">Company List</span>
					<small class="display-block subtitle">Lorem ipsum dolor sit amet,<br>consectetur adipiscing elit. </small>
				</h5>
			</div>

            <a href="/company/add-company-page" style="margin-right: 3%;">
                <button class="btn-add">Add Company</button>
            </a>
		</div>

        <form action="/company/sort-list-company">
            <div class="nav-ah-2">
                <div style="display: flex" >
                    <div class="panel-k2">

                            <div class="form-group" style="margin-bottom: 30%;">
                                <label class="text">Job Industry</label>
                                <select class="form-control form-control-a text14" id="jobstatus" placeholder="Job Status" name="jobstatus" style="width: 80%;">
                                        <option value="">All</option>
                                    @foreach ($data['listCompanyIndustry'] as $compIndustry)
                                        <option class="{{$compIndustry->industry}}">{{$compIndustry->industry}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row row10">
                                <p>tombol reset harus bisa dihover supaya kelihatan bisa diklik</p>
                                <button class="btn btn-link btn-reset">Reset</button>
                                <button type="submit" class="btn btn-filter">Filter</button>
                            </div>
                    </div>
                </div>

                <div style="display: flex; flex-flow: column; width: 100%">
                    <div style="display: flex; justify-content: space-around; margin-left: 25px;">
                        <div class=" col-lg-7 col-sm-6 col-md-6 form-group">
                            <!-- <label for="search" class="sr-only">Search Applicants</label> -->
                            <input type="text" class="form-control text2" name="search" id="search-job-post" placeholder="Search Company">
                            <span class="glyphicon glyphicon-search form-control-feedback" style="color: #246BB3; z-index: 0;"></span>
                        </div>


                        <div class="col-lg-4 col-sm-6 col-md-5" style="display: flex; justify-content: flex-end; margin-right: 3%;">
                            <div style="margin-right: 10px;"><a class="text left20" href="#" title="Descending"><i class="fas fa-sort-amount-down"></i></a></div>
                            <div style="margin-right: 10px;"><a class="text left20" href="#" title="Ascending"><i class="fas fa-sort-amount-down-alt"></i></a></div>
                            <div title="Sort By">
                                <label class="text" >Sort by:</label>
                                <select class="dropdown-li text14" id="cbSortBy" name="cbSortBy">
                                    <option value="name" class="text14">name</option>
                                    <option value="viewed" class="text14">viewed</option>
                                    <option value="favorite" class="text14">favorite</option>
                                    {{-- <option class="job post">Job Posts</option> --}}
                                </select>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-row5">
                        <h3>Total Data : {{$data['listCompany']->total()}}</h3>
                        @foreach ($data['listCompany'] as $company)
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
                                            <i class="fas fa-edit fa-lg" style="color: #04518D; margin-right:20px;"></i>
                                            <i class="far fa-trash-alt fa-lg" style="color: #04518D;"></i>
                                        </div>
                                    </div>

                                    <div style="display: flex; width: 57%;">
                                        <div><i class="fas fa-map-marker-alt fa-lg icon"></i><a class="img-icon panel-subtitle text2" style="margin-top: 10px;">Location (lokasi tidak ada di column table company_profile, ngambil yang mana?)</a></div>
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
        </form>

		<div style="display: flex; justify-content: center;">
			<div class="text-center bootpag-prev-next"></div>
        </div>

        <h2>Back End</h2>
        <ul>
            <li>tombol ascending dan descending, apakah diperlukan?</li>
            <li>mau berapa banyak yang ditampilkan, mulai urutan, yang umum berapa banyak?  5,10,25,50,100</li>
            <li>pagination number ini dibuat dengan default laravel, tetapi jika tampilan ingin seperti di bawahnya berarti harus dicustom</li>
        </ul>

        <h2>Front End</h2>
        <ul>
            <li>implementasi database di laptop indah, benerin xampp</li>
            <li>tombol edit dan delete dibuat hover supaya kelihatan bisa diklik</li>
            <li>pagination number ini dibuat dengan default laravel, tetapi jika tampilan ingin seperti di bawahnya berarti harus dicustom</li>
            <li>container sebaiknya menggunakan class bootstrap, seperti contohnya di bawah ini menggunakan container</li>
            <li>Add Company belum ada formnya, dibuat page baru addCompanyList</li>
        </ul>
	</div>
</div>
<!-- /Page Header -->

    <script src="{{asset("assets/js/manage-list-company.js")}}"></script>
@endsection
