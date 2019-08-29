<meta name="_token" content="{{ csrf_token() }}"/>

@extends('layouts.generaltemplate')
@section('content')

<!-- Page Header -->
<div class="page-header">
	<!-- Navbar -->
	@include('includes.navbar')
	<!-- /Navbar -->

	<!-- Page Container -->
	<div class="page-container">
        {{-- <ul>
            <li>container sebaiknya menggunakan class bootstrap, seperti contohnya di bawah ini menggunakan container</li>
            <li>Universitas hanya bisa melihat student yang ada di dalam kampusnya</li>
            <li>Apakah universitas dapat merubah profil yang dimiliki oleh mahasiswanya?</li>TIDAK
            <li>Saran : kampus hanya dapat memverifikasi bahwa mahasiswa tersebut benar dari universitas tersebut dengan logo verified_university</li>
        </ul> --}}
		<div class="nav-ah-1">
            <h5>
                <span class="title">All Students</span>
                <small class="display-block subtitle">List of Student in {{Session::get('univName')}}</small>
            </h5>
		</div>

		<div class="nav-ah-2">
			<div>
				<div class="panel-k2">
                    {{-- <div class="form-group">
                        <label class="text">University</label>
                        <select class="form-control form-control-a text14" id="university" placeholder="University" name="university" style="width: 80%;">
                            <option class="text14">hahha</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="text">Register Date</label>
                        <input type="date" class="form-control form-control-a text14 form-bottom" id="registerdate" placeholder="Register Date" name="registerdate" style="width: 60%;">
                    </div> --}}

                    <div class="form-group">
                        <label class="text">Enrollment Batch</label>
                        <select class="form-control form-control-b text14" id="enrollmentbatch" placeholder="Enrollment Batch" name="enrollmentbatch">
                                <option class="text14" value="">Select Year...</option>
                            @foreach($data['batch'] as $batch)
                                @if($batch->enrollment != "0000-00-00 00:00:00")
                                    <option class="text14" value="{{date_format(date_create($batch->enrollment),"Y")}}">{{date_format(date_create($batch->enrollment),"Y")}}</option>
                                @endif()
                            @endforeach
                        </select>
                    </div>

                        <div class="form-group">
                        <label class="text">Status</label>
                        <select class="form-control form-control-b text14" id="status" placeholder="Status" name="status">
                            <option class="text14" value="">Select Status...</option>
                            <option class="text14" value="1">Currently Working</option>
                            <option class="text14" value="0">Last Work</option>
                            <option class="text14" value="never">Never Work</option>
                        </select>
                    </div>

                    <div class="horizontalCenter">
                        <button class="btn btn-link btn-reset linkHover" id="resetStudent">Reset</button>
                        {{-- <button class="btn btn-filter">Filter</button> --}}
                    </div>
				</div>
			</div>

			<div style="display: flex; flex-flow: column; width: 100%">
				<div style="display: flex; justify-content: space-around; margin-left: 25px;">
					<div class=" col-lg-7 col-sm-6 col-md-6 form-group">
		            	<!-- <label for="search" class="sr-only">Search Applicants</label> -->
		            	<input type="text" class="form-control text2" name="searchStudent" id="searchStudent" placeholder="Search for Student">
		              	<span class="glyphicon glyphicon-search form-control-feedback" style="color: #246BB3; z-index: 0;"></span>
                     </div>

					<div class="col-lg-4 col-sm-6 col-md-5" style="display: flex; justify-content: flex-end; margin-right: 3%;">
						<div style="margin-right: 10px;" title="descending" id="btnDescStudent"><a class="text left20" href="#"><i class="fas fa-sort-amount-down"></i></a></div>
                        <div style="margin-right: 10px;" title="ascending" id="btnAscStudent"><a class="text left20" href="#"><i class="fas fa-sort-amount-down-alt"></i></a></div>
                        <input type="hidden" id="adesc" value="asc">
						<div>
							<label class="text">Sort by:</label>
							<select class="dropdown-li text14" id="filterStudent" name="filterStudent">
                                <option class="text14" value="fullName">Name</option>
                                <option class="text14" value="registerDate">Register Date</option>
                                {{-- <option class="text14" value="">Not Working</option> --}}
                                <option class="text14" value="end">Graduation</option>
				            </select>
				        </div>
					</div>
                </div>

				<div class="col-row5" id="studentColumn">
                    <h1>Total Data : {{$data['students']->total()}} student(s)</h1>
                    @foreach ($data['students'] as $student)
                        <a data-target="#detail{{$student->studentID}}" data-toggle="modal" type="button">
                            <button class="btn btninformasi column-c">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <img src="../icon/avatar.png" alt="Avatar" class="avatar-mini">
                                    </div>
                                    <div class="col-lg-9">
                                        <div><label class="text5">{{$student->fullName}}</label></div>
                                        <div style="margin-top: -10px"><label class="text4">Summary</label></div>
                                    </div>
                                </div>

                                <div style="display: flex; justify-content: flex-end; margin-top: 20px; margin-bottom: 15px;">
                                    <label class="text4"><i class="fas fa-briefcase" style="margin-right: 5px; "></i>
                                        @if($student->currently == 1)
                                            Currently Working
                                        @elseif(is_null($student->currently))
                                            Never Work
                                        @elseif($student->currently == 0)
                                            Last Work in <b>{{$student->lastDate}}</b>

                                        @endif
                                    </label>
                                </div>

                                <div style="display: flex; justify-content: flex-end;">
                                <label class="text4" style="float: right;">Register Date : {{date_format(date_create($student->registerDate),"d/m/Y")}}</label>
                                </div>
                            </button>
                        </a>

                        <!-- Modal button See Details-->
                        <div id="detail{{$student->studentID}}" class="modal fade">
                            <div class="modal-dialog" style="width: 80%;">
                                <div class="modal-content" style="padding: 20px;">
                                    <div class="panel-heading" style="display: flex;">
                                        <div style="margin-right: 2%;">
                                            <img src="../icon/avatar.png" alt="Avatar" class="avatar">
                                        </div>
                                        <div style="flex-grow: 1;">
                                            <div class="flex-flow">
                                                <a class="text11">{{$student->fullName}}</a>
                                            </div>
                                            <div class="flex-flow">
                                                <p class="text2">Back End Programmer</p>
                                            </div>
                                            <div class="flex-flow" style="margin-bottom: 40px;">
                                                <a class="text7" style="margin-right: 20px">Application in process</a>
                                            </div>

                                            <h2>OCCUPATION</h2>
                                            <div style="margin-bottom: 10px; display: flex;">
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                                    <label class="text2">Employment</label>
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-md-8">
                                                    <label class="text9">Employed</label>
                                                </div>
                                            </div>

                                            <div style="margin-bottom: 10px; display: flex;">
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                                    <label class="text2">Employment<br>Date</label>
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-md-8" style="margin-top: 1%;">
                                                    <label class="text9">02/02/2019</label>
                                                </div>
                                            </div>

                                            <div style="margin-bottom: 10px; display: flex;">
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                                    <label class="text2">Company</label>
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-md-8">
                                                    <label class="text9">Employed</label>
                                                </div>
                                            </div>

                                            <div style="margin-bottom: 10px; display: flex;">
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                                    <label class="text2">Employment</label>
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-md-8">
                                                    <label class="text9">Zen Group</label>
                                                </div>
                                            </div>

                                            <div style="margin-bottom: 10px; display: flex;">
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                                    <label class="text2">Company<br>Type</label>
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-md-8" style="margin-top: 1%;">
                                                    <label class="text9">Private</label>
                                                </div>
                                            </div>

                                            <div style="margin-bottom: 10px; display: flex;">
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                                    <label class="text2">Salary</label>
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-md-8">
                                                    <label class="text9">5.000.000 - 7.000.000</label>
                                                </div>
                                            </div>

                                            <div style="margin-bottom: 10px; display: flex;">
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                                    <label class="text2">Aligned<br>with Study</label>
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-md-8" style="margin-top: 1%;">
                                                    <label class="text9">Yes</label>
                                                </div>
                                            </div>

                                            <div style="display: flex;">
                                                <div style="width: 100%;">
                                                    <hr>
                                                </div>
                                            </div>

                                            {{-- <h2>EDUCATION</h2>
                                            <div style="margin-bottom: 10px; display: flex;">
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                                    <label class="text2">School</label>
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-md-8">
                                                    <label class="text9">{{$student->universityName}}</label>
                                                </div>
                                            </div>

                                            <div style="margin-bottom: 10px; display: flex;">
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                                    <label class="text2">Major</label>
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-md-8">
                                                <label class="text9">{{$student->major}}</label>
                                                </div>
                                            </div>

                                            <div style="margin-bottom: 10px; display: flex;">
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                                    <label class="text2">Enrollment</label>
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-md-8">
                                                    <label class="text9">
														@if($student->start == "0000-00-00 00:00:00")
															No Data
														@else
															{{date_format(date_create($student->start),"Y")}}
														@endif
													</label>
                                                </div>
                                            </div>

                                            <div style="margin-bottom: 10px; display: flex;">
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                                    <label class="text2">Graduation</label>
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-md-8">
                                                    <label class="text9">
														@if($student->end == "0000-00-00 00:00:00")
															No Data
														@else
															{{date_format(date_create($student->end),"Y")}}
														@endif
													</label>
                                                </div>
                                            </div>

                                            <div style="margin-bottom: 10px; display: flex;">
                                                <div style="width: 100%;">
                                                    <hr>
                                                </div>
                                            </div>
                                            END OF EDUCATION --}}

                                            <h2>PROFILE</h2>
                                            <div style="margin-bottom: 10px; display: flex;">
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                                    <label class="text2">Address</label>
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-md-8">
                                                    <label class="text9">{{$student->address}}</label>
                                                </div>
                                            </div>

                                            <div style="margin-bottom: 10px; display: flex;">
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                                    <label class="text2">Phone</label>
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-md-8">
                                                    <label class="text9">{{$student->phone}}</label>
                                                </div>
                                            </div>

                                            <div style="margin-bottom: 10px; display: flex;">
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                                    <label class="text2">Email</label>
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-md-8">
                                                    <label class="text14">{{$student->email}}</label>
                                                </div>
                                            </div>

                                            <div style="margin-bottom: 10px; display: flex;">
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                                    <label class="text2">LinkedIn</label>
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-md-8">
                                                    <label class="text">{{$student->linkedin}}</label>
                                                </div>
                                            </div>

                                            <div style="margin-bottom: 10px; display: flex;">
                                                    <div style="width: 100%;">
                                                        <hr>
                                                    </div>
                                                </div>
                                            {{-- END OF PROFILE --}}

                                            <h2>EDUCATION</h2>
                                            <div style="margin-bottom: 10px; display: flex;">
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                                    <label class="text2">School</label>
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-md-8">
                                                    <label class="text9">{{$student->universityName}}</label>
                                                </div>
                                            </div>

                                            <div style="margin-bottom: 10px; display: flex;">
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                                    <label class="text2">Major</label>
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-md-8">
                                                <label class="text9">{{$student->major}}</label>
                                                </div>
                                            </div>

                                            <div style="margin-bottom: 10px; display: flex;">
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                                    <label class="text2">Enrollment</label>
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-md-8">
                                                    <label class="text9">
														@if($student->start == "0000-00-00 00:00:00")
															No Data
														@else
															{{date_format(date_create($student->start),"Y")}}
														@endif
													</label>
                                                </div>
                                            </div>

                                            <div style="margin-bottom: 10px; display: flex;">
                                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                                    <label class="text2">Graduation</label>
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-md-8">
                                                    <label class="text9">
														@if($student->end == "0000-00-00 00:00:00")
															No Data
														@else
															{{date_format(date_create($student->end),"Y")}}
														@endif
													</label>
                                                </div>
                                            </div>

                                            <div style="margin-bottom: 10px; display: flex;">
                                                <div style="width: 100%;">
                                                    <hr>
                                                </div>
                                            </div>
                                            {{-- END OF EDUCATION --}}
                                        </div>
                                        {{-- /flex-grow:1 --}}
                                    </div>
                                    {{-- end of panel heading --}}

                                    <div style="display: flex; justify-content: flex-end;">
                                        <button type="button" class="btn btn-link btn-cancelpanel text" data-dismiss="modal">Close</button>
                                        {{-- <button class="btn btn-update update1" autofocus>Update</button> --}}
                                    </div>
                                    {{-- end of button --}}

                                </div>
                                {{-- end of modal content --}}

                            </div>
                            {{-- end of modal-dialog --}}
                        </div>
                        {{-- End of Modal Details --}}
                    @endforeach
			        </div>

                {{$data['students']->links()}}
            <div style="display: flex; justify-content: center;">
                <div class="text-center bootpag-prev-next"></div>
            </div>
        </div>
        </div>
    </div>
    <!-- /Page Header -->
@endsection


{{-- <div id="modal-detail-update" style="display: none;">
						<div class="panel-heading" style="display: flex;">
							<div style="margin-right: 2%;">
								<a class="text10" href="" id="upload_link">
                    				<img src="../icon/avatar.png" alt="Avatar" class="avatar" style="margin-left: 40px;" class="attachment">
                    			</a>
	                   			<input id="upload" type="file"/>
							</div>
							<div style="flex-grow: 1;">
								<div style="margin-bottom: 10px; margin-top: 5%; display: flex;">
									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
										<label class="text2">Name</label>
									</div>
									<div class="col-lg-8 col-sm-8 col-md-8" style="margin-top: -1%;">
										<input type="text" class="form-control text7" id="name" placeholder="Name" name="name">
									</div>
								</div>

								<div style="margin-bottom: 10px; display: flex;">
									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
										<label class="text2">Student ID</label>
									</div>
									<div class="col-lg-8 col-sm-8 col-md-8" style="margin-top: -1%;">
										<input type="text" class="form-control text7" id="name" placeholder="Student ID" name="name">
									</div>
								</div>

								<div style="margin-bottom: 10px; display: flex;">
									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3" style="width: 7%;">
										<hr>
									</div>
								</div>

								<div style="margin-bottom: 10px; display: flex;">
									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
										<label class="text2">Employment</label>
									</div>
									<div class="col-lg-8 col-sm-8 col-md-8">
										<select class="form-control text9" id="employment" placeholder="Employment" name="employment" style="width: 40%; margin-top: -2%;">
				                        	<option class="text9">Employed</option>
				                        </select>
									</div>
								</div>

								<div style="margin-bottom: 10px; display: flex;">
									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
										<label class="text2">Employment<br>Date</label>
									</div>
									<div class="col-lg-8 col-sm-8 col-md-8" style="margin-top: -1%;">
										<input type="date" class="form-control text9" id="employmentdate" placeholder="Employment Date" name="employmentdate" style="width: 40%; margin-top: 2%;">
									</div>
								</div>

								<div style="margin-bottom: 10px; display: flex;">
									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
										<label class="text2">Company</label>
									</div>
									<div class="col-lg-8 col-sm-8 col-md-8" style="margin-top: -1%;">
										<input type="text" class="form-control text9" id="company" placeholder="Company" name="company">
									</div>
								</div>

								<div style="margin-bottom: 10px; display: flex;">
									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
										<label class="text2">Company<br>Type</label>
									</div>
									<div class="col-lg-8 col-sm-8 col-md-8">
										<select class="form-control text9" id="employment" placeholder="Employment" name="employment" style="width: 40%;">
				                        	<option class="text9">Private</option>
				                        </select>
									</div>
								</div>

								<div style="margin-bottom: 10px; display: flex;">
									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
										<label class="text2">Salary</label>
									</div>
									<div class="col-lg-8 col-sm-8 col-md-8">
										<select class="form-control text9" id="employment" placeholder="Employment" name="employment" style="width: 40%; margin-top: -2%;">
				                        	<option class="text9">5.000.000 - 7.000.000</option>
				                        </select>
									</div>
								</div>

								<div style="margin-bottom: 10px; display: flex;">
									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
										<label class="text2">Aligned<br>with Study</label>
									</div>
									<div class="col-lg-8 col-sm-8 col-md-8">
										<select class="form-control text9" id="employment" placeholder="Employment" name="employment" style="width: 40%;">
				                        	<option class="text9">Yes</option>
				                        </select>
									</div>
								</div>

								<div style="margin-bottom: 10px; display: flex;">
									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3" style="width: 7%;">
										<hr>
									</div>
								</div>

								<div style="margin-bottom: 10px; display: flex;">
									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
										<label class="text2">School</label>
									</div>
									<div class="col-lg-8 col-sm-8 col-md-8">
										<label class="text9">Bina Nusantara University</label>
									</div>
								</div>

								<div style="margin-bottom: 10px; display: flex;">
									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
										<label class="text2">Major</label>
									</div>
									<div class="col-lg-8 col-sm-8 col-md-8">
										<select class="form-control text9" id="employment" placeholder="Employment" name="employment" style="width: 40%; margin-top: -2%;">
				                        	<option class="text9">hahha</option>
				                        </select>
									</div>
								</div>

								<div style="margin-bottom: 10px; display: flex;">
									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
										<label class="text2">Enrollment</label>
									</div>
									<div class="col-lg-8 col-sm-8 col-md-8">
										<select class="form-control text9" id="employment" placeholder="Employment" name="employment" style="width: 40%; margin-top: -2%;">
				                        	<option class="text9">2015</option>
				                        </select>
									</div>
								</div>

								<div style="margin-bottom: 10px; display: flex;">
									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
										<label class="text2">Graduation</label>
									</div>
									<div class="col-lg-8 col-sm-8 col-md-8">
										<select class="form-control text9" id="employment" placeholder="Employment" name="employment" style="width: 40%; margin-top: -2%;">
				                        	<option class="text9">2019</option>
				                        </select>
									</div>
								</div>

								<div style="margin-bottom: 10px; display: flex;">
									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3" style="width: 7%;">
										<hr>
									</div>
								</div>

								<div style="margin-bottom: 10px; display: flex;">
									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
										<label class="text2">Address</label>
									</div>
									<div class="col-lg-8 col-sm-8 col-md-8">
										<textarea class="text9 textareaAS" style="overflow:auto;height: 40px !important;" onkeyup="textAreaAdjust(this)"placeholder="Address"></textarea>
									</div>
								</div>

								<div style="margin-bottom: 10px; display: flex;">
									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
										<label class="text2">Phone</label>
									</div>
									<div class="col-lg-8 col-sm-8 col-md-8" style="margin-top: -1%;">
										<input type="text" class="form-control text9" id="phone" placeholder="Phone" name="phone" style="width: 40%;">
									</div>
								</div>

								<div style="margin-bottom: 10px; display: flex;">
									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
										<label class="text2">Email</label>
									</div>
									<div class="col-lg-8 col-sm-8 col-md-8" style="margin-top: -1%;">
										<input type="text" class="form-control text9" id="email" placeholder="Email" name="email">
									</div>
								</div>

								<div style="margin-bottom: 10px; display: flex;">
									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
										<label class="text2">LinkedIn</label>
									</div>
									<div class="col-lg-8 col-sm-8 col-md-8" style="margin-top: -1%;">
										<input type="text" class="form-control text" id="linkedin" placeholder="LinkedIn" name="linkedin">
									</div>
								</div>
							</div>
						</div>

						<div style="display: flex; justify-content: flex-end;">
							<a rel="modal:close"><button class="btn btn-link btn-cancelpanel close2 text">Close</button></a>
							<button class="btn btn-update">Update</button>
						</div>
					</div>
				</div> --}}
                <!-- / Modal button See Details-->

                {{-- <a href="#closemodal1" rel="modal:open">
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
                    </button></a> --}}
                    {{-- <br> --}}

