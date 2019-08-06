<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Career Center - Dashboard </title>
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

    <!-- Navbar -->
    {!!$data['navbar']!!}
	<!-- /navbar -->

    <!-- Page container -->
    <div class="page-container no-padding">
        <div class="page-content bg-main-color">

            {!!$data['sidebar']!!}

            <div class="container-fluid" style="margin-top: 40px;margin-bottom: 3%;">
                <div class="row">
                    <div class="col-md-3">
                        <select class="select text-right" id="cbType">
                            <option value="company" selected> Company </option>
                            <option value="job_post"> Job post </option>
                            <option value="student"> Student </option>
                        </select>
                    </div>
                    <div class="col-md-offset-1"></div>
                    <div class="col-md-3">
                        <h4 id="total">
                        </h4>
                        <h4 id="total-university">
                        </h4>
                    </div>
                    <div class="col-md-offset-2"></div>
                    <div class="col-md-3">
                        <select class="select text-right" id="cbMonth">
                            <option value="1"> January '19 </option>
                            <option value="2"> February '19 </option>
                            <option value="3"> March '19 </option>
                            <option value="4"> April '19 </option>
                            <option value="5"> Mei '19 </option>
                            <option value="6"> June '19 </option>
                            <option value="7"> July '19 </option>
                            <option value="8"> August '19 </option>
                            <option value="9"> September '19 </option>
                            <option value="10"> October '19 </option>
                            <option value="11"> November '19 </option>
                            <option value="12"> December '19 </option>
                        </select>
                    </div>
                </div>

                <div class="panel panel-flat" style="margin-top: 2%;">
                    <div class="panel-body">
                        <div class="progress" style="display: none;">
                            <div class="progress-bar progress-bar-info progress-bar-striped active" style="width: 0%;">
                                <span class="sr-only">95% Complete </span>
                            </div>
                        </div>
                        <div class="chart-container">
                            <div class="chart has-fixed-height" id="basic_area"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page container -->
    {!!$data['js']!!}
    <script type="text/javascript" src="{{ url('assets/js/plugins/visualization/echarts/echarts.js') }}"></script>
    {{--    <script type="text/javascript" src="{{ url('assets/js/dashboard.js') }}"></script> --}}
</body>
</html>
