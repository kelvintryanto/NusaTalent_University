@extends('layouts.generaltemplate')
@section('content')

<body>
    {!!$data['css']!!}
    {!!$data['navbar']!!}
	<!-- Page container -->

    <div class="page-container no-padding">

        <!-- Page Content -->
        <div class="page-content bg-main-color	">

            <!-- Main content -->
            <div class="content-fluid">

                <!-- Content area -->
                <div class="content">

                    <!-- Page header -->
                    <div class="page-header">
                        <div class="page-header-content">
                            <!-- Alert -->
                            @if(\Session::has('success'))
                            <div class="alert alert-success" id="alert" style="width: 35%;padding-left: 3%;">
                                <a class="close" data-dismiss="alert">×</a>
                                {!!Session::get('success')!!}
                            </div>
                            @elseif(\Session::has('failed'))
                            <div class="alert alert-danger" id="alert" style="width: 35%;padding-left: 3%;">
                                <a class="close" data-dismiss="alert">×</a>
                                {!!Session::get('failed')!!}
                            </div>
                            @endif
                            <!-- /alert -->
                            <div class="page-title">
                                <p class="no-margin">Company Profile</p>
                                <h6> Please fill this form for your company partnership profiling. </h6>
                            </div>
                        </div>
                    </div>
                    <!-- /page header -->


                    <!-- Form for edit company profile -->
                    <div class="panel panel-white border-radius-30">
                        <div class="panel-body">
                            <form method="post" id="add-company-form" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <select class="select" name="cbBooth" id="cbBooth">
                                                <option value=""> Choose booth number: </option>
                                                @if(!empty($data['boothNumber']))
                                                <?php for($i = 1; $i <= 53; $i++){ ?>
                                                @if(!in_array($i, $data['boothNumber']))
                                                <option value="{{$i}}"> {{$i}} </option>
                                                @endif
                                                <?php } ?>
                                                @else
                                                <?php for($i = 1; $i <= 53; $i++){ ?>
                                                    <option value="{{$i}}"> {{$i}} </option>
                                                <?php } ?>
                                                @endif
                                            </select>
                                            <div class="alert alert-danger invalid" style="margin-top: 1%;">
                                                Booth number cannot be empty
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 1%;">
                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label> Company Logo
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="file" name="uploadImage" id="uploadImage" class="hidden">
                                            <img id="companyLogo" src="/images/cover.jpg" alt="Company logo" class="form-control company-logo">
                                            <div class="alert alert-danger invalid" style="margin-top: 1%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 1%">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label>Company Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="txtCompanyName" id="txtCompanyName" class="form-control form-input" placeholder="Ex. PT. Nusa Talenta Indonesia" value="">
                                            <div class="alert alert-danger invalid" style="margin-top: 1%;">
                                                This field is required
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 1%">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label>Company Website
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="txtCompanyWebsite" id="txtCompanyWebsite" class="form-control form-input" placeholder="Ex. https://nusatalent.com" value="">
                                            <div class="alert alert-danger invalid" style="margin-top: 1%;">
                                                This field is required
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 1%">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label>Company Email
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="email" name="txtCompanyEmail" id="txtCompanyEmail" class="form-control form-input" placeholder="Ex. hello@nusatalent.com" value="">
                                            <div class="alert alert-danger invalid" style="margin-top: 1%;">
                                                This field is required
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 1%">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label>Company Contact <span class="text-danger">*</span></label>
                                            <input type="text" name="txtCompanyContact" id="txtCompanyContact" class="form-control contact form-input" placeholder="Ex. 02134567891" value="">
                                            <div class="alert alert-danger invalid" style="margin-top: 1%;">
                                                This field is required
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 1%">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label>Company Location <span class="text-danger">*</span></label>
                                            <input type="text" name="txtCompanyLocation" id="txtCompanyLocation" class="form-control form-input" placeholder="Ex. Jakarta Selatan" value="">
                                            <div class="alert alert-danger invalid" style="margin-top: 1%;">
                                                This field is required
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- HR -->

                                <div class="row" style="margin-top: 1%">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label>HR Name <span class="text-danger">*</span></label>
                                            <input type="text" name="txtCompanyHRName" id="txtCompanyHRName" class="form-control form-input" placeholder="Ex. Steven G" value="">
                                            <div class="alert alert-danger invalid" style="margin-top: 1%;">
                                                This field is required
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 1%">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label>HR Contact <span class="text-danger">*</span></label>
                                            <input type="text" name="txtCompanyHRContact" id="txtCompanyHRContact" class="form-control contact form-input" placeholder="Ex. 02134567891" value="">
                                            <div class="alert alert-danger invalid" style="margin-top: 1%;">
                                                This field is required
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /HR -->
                                <div class="row" style="margin-top: 1%">
                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label>HR Email <span class="text-danger">*</span></label>
                                            <input type="email" name="txtCompanyHREmail" id="txtCompanyHREmail" class="form-control form-input" placeholder="Ex. steven@nusatalent.com" value="">
                                            <div class="alert alert-danger invalid" style="margin-top: 1%;">
                                                This field is required
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Generate Password <span class="text-danger">*</span></label>
                                            <input type="text" name="txtCompanyHRPassword" id="txtCompanyHRPassword" class="form-control" placeholder="********" value="" disabled>
                                            <button class="btn btn-primary" id="btnGeneratePassword" style="position: absolute;top: 34px;right: 10px;"> <i class=" icon-rotate-ccw3"> </i> </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 1%">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label>Industry <span class="text-danger">*</span></label>
                                            <input type="text" name="txtCompanyIndustry" id="txtCompanyIndustry" class="form-control form-input" placeholder="Ex. Human Resources" value="">
                                            <div class="alert alert-danger invalid" style="margin-top: 1%;">
                                                This field is required
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 1%">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label>LinkedIn</label>
                                            <input type="text" name="txtCompanyLinkedln" id="txtCompanyLinkedln" class="form-control" placeholder="LinkedIn URL" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 1%">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label>Total Employee
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="cbTotalEmployee" id="cbTotalEmployee" data-placeholder="Number of employees" class="select text-nusatalent">
                                                <option value=""></option>
                                                <option value="1">Self-employed</option>
                                                <option value="2">1-10 employees</option>
                                                <option value="3">11-50 employees</option>
                                                <option value="4">51-200 employees</option>
                                                <option value="5">201-500 employees</option>
                                                <option value="6">501-1000 employees</option>
                                                <option value="7">1001-5000 employees</option>
                                                <option value="8">5001-10.000 employees</option>
                                                <option value="9">10.001+ employees</option>
                                            </select>
                                            <div class="alert alert-danger invalid" style="margin-top: 1%;">
                                                Please choose total employee of company
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 1%">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label>Headquarters Address <span class="text-danger">*</span></label>
                                            <textarea rows="5" cols="5" name="txtCompanyAddress" id="txtCompanyAddress" class="form-control form-area" placeholder="Ex. Ariobimo Sentral, Jl. H. R. Rasuna Said No.5, RT.9/RW.4, Kuningan Tim., Setia Budi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12950"></textarea>
                                            <div class="alert alert-danger invalid" style="margin-top: 1%;">
                                                This field is required
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 1%">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label>Description <span class="text-danger">*</span></label>
                                            <textarea rows="5" cols="5" name="txtCompanyDescription" id="txtCompanyDescription" class="form-control form-area" placeholder="Company Description"></textarea>
                                            <div class="alert alert-danger invalid" style="margin-top: 1%;">
                                                This field is required
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 1%">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label>Why Talent should join this company? <span class="text-danger">*</span></label>
                                            <textarea rows="5" cols="5" name="txtCompanyReasons" id="txtCompanyReasons" class="form-control form-area" placeholder="Tell talents why they should join your company"></textarea>
                                            <div class="alert alert-danger invalid" style="margin-top: 1%;">
                                                This field is required
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 2%;">
                                    <div class="col-lg-5 col-lg-offset-3">
                                        <button type="submit" id="btnSubmit" class="btn bg-nusatalent btn-rounded max-width text-bold text-white">SUBMIT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form for edit company profile -->
                </div>
                <!-- /content area -->
            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->
    </div>
    <!-- /page container -->


@endsection

