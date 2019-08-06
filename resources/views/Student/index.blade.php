<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Career Center - Manage Student </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    {!!$data['css']!!}
    <link href="{!! url('assets/css/manage-job-post.css') !!}" rel="stylesheet" type="text/css">
</head>
<body class="navbar-top">
    {!!$data['navbar']!!}

    <!-- Page container -->
    <div class="page-container no-padding">
        <!-- Page Content -->
        <div class="page-content bg-main-color">
        {!!$data['sidebar']!!}

            <!-- Main content -->
            <div class="content-wrapper">
                <!-- Content area -->
                <div class="content">
                    <!-- Page header -->
                    <div class="page-header border-bottom border-bottom-grey-50">
                        <div class="page-header-content">
                            <div class="page-title">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="no-margin"> Student Detail </p>
                                        <span class="no-padding" id="total-applicant">
                                            {{ $data['students'] == 'FETCH_FAILED' && $data['students'] == 'ERROR' ? 0 : count($data['students']) }}
                                            {{ count($data['students']) > 1 ? "Students" : "Student" }}
                                        </span>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group col-md-8">
                                            <select class="select" data-placeholder="Type search" id="search-type">
                                                <option value=""></option>
                                                <option value="student"> Student </option>
                                                <option value="university"> University </option>
                                            </select>
                                        </div>
                                        <div class="input-group col-md-12" id="form-search" style="display: none;">
                                            <input type="text" class="form-control" id="search-applicant" placeholder="Search applicants">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default">
                                                    <i class="icon-search4"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-3">
                                        <button class="btn btn-success" id="export-to-excel">
                                            <i class="icon-box-add"></i> Export to EXCEL
                                        </button>
                                    </div>  -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /page header -->

                    <div class="row applicant-table-header text-nusatalent">
                        <div class="col-lg-1">
                            <p>#</p>
                        </div>

                        <div class="col-lg-4">
                            <p> Student's Name</p>
                        </div>

                        <div class="col-lg-4">
                            <p> Student's University </p>
                        </div>

                        <div class="col-lg-3">
                            <p> Student's Register Date</p>
                        </div>
                    </div>

                    @if ($data['students'] != 'FETCH_FAILED' && $data['students'] != 'ERROR')
                        @php
                            $p = 1;
                        @endphp
                        @foreach($data['students'] as $row)

                            <div class="panel panel-white panel-container applicant-detail applicant-container-{{ $row->studentID }}" data-s="{{ $row->studentID }}" style="display: block">
                                <div class="panel-body">
                                    <div class="col-lg-1">
                                        <p class="applicant-name">{{ $p }}</p>
                                    </div>

                                    <div class="col-lg-4">
                                        <p class="applicant-name">{{ $row->fullName }}</p>
                                    </div>

                                    <div class="col-lg-4">
                                        <p class="university-name"> {{ $row->universityName }} </p>
                                    </div>

                                    <div class="col-lg-3">
                                        <p class="text-semibold text-blue-800 applicant-applied-date">
                                            {{ date_format(date_create($row->registerDate), "j F Y") }}</p>
                                    </div>
                                    <!-- <div class="checkbox job-post-checkbox">
                                        <input type="checkbox" class="styled">
                                    </div>						 -->
                                </div>
                            </div>
                            @php
                                $p++;
                            @endphp
						@endforeach
					@endif
                </div>
                <!-- /content area -->
            </div>
            <!-- /main content -->
        </div>
        <!-- /page content -->
    </div>
    <!-- /page container -->

    <!-- Modal Export -->

    <div class="modal fade" id="modal-export">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
                <h5 class="modal-title"> Data type to export </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
          </div>
          <div class="modal-body">
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="nama-type">
                            Nama
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="univ-type">
                            Universitas
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="email-type">
                            Email
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="telepon-type">
                            Telepon
                        </label>
                    </div>
                </div>
                <div id="div-export-data">
                </div>
          </div>
          <div class="modal-footer">
            <a href="#" class="export">
                <button class="btn btn-success">
                    <i class="icon-folder-download2"> </i> Export to EXCEL
                </button>
            </a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- /Modal -->

    <?php echo $data['js']; ?>
    <script type="text/javascript" src="{!! url('assets/js/plugins/tables/datatables/datatables.min.js') !!}"></script>
    <script type="text/javascript" src="{!! url('assets/js/table2csv.js') !!}"></script>
    <script type="text/javascript">
        function exportTableToCSV($table, filename) {

            var $rows = $table.find('tr:has(td)'),

              // Temporary delimiter characters unlikely to be typed by keyboard
              // This is to avoid accidentally splitting the actual contents
              tmpColDelim = String.fromCharCode(11), // vertical tab character
              tmpRowDelim = String.fromCharCode(0), // null character

              // actual delimiter characters for CSV format
              colDelim = '","',
              rowDelim = '"\r\n"',

              // Grab text from table into CSV formatted string
              csv = '"' + $rows.map(function(i, row) {
                var $row = $(row),
                  $cols = $row.find('td');

                return $cols.map(function(j, col) {
                  var $col = $(col),
                    text = $col.text();

                  return text.replace(/"/g, '""'); // escape double quotes

                }).get().join(tmpColDelim);

              }).get().join(tmpRowDelim)
              .split(tmpRowDelim).join(rowDelim)
              .split(tmpColDelim).join(colDelim) + '"';

            // Deliberate 'false', see comment below
            if (window.navigator.msSaveOrOpenBlob) {
              // IE 10+
              var blob = new Blob([decodeURIComponent(encodeURI(csv))], {
                type: 'text/csv;charset=' + document.characterSet
              });
              window.navigator.msSaveBlob(blob, filename);
            } else {
              // actual real browsers
              //Data URI
              let csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

                $(this).attr({
                  'download': filename,
                  'href': csvData,
                  'target': '_blank'
                });

            }
        }

        $(document).ready(function() {
            const total_applicant = $(".applicant-detail").length+ " Students";

            $("span#total-applicant").text(total_applicant);

            $('#search-type').on('change', function(e)
            {
                if($(this).val() != "")
                    $('#form-search').show();
                else
                    $('#form-search').hide();
            });

            $('#export-to-excel').on('click', function(e)
            {
                e.preventDefault();

                $('#modal-export').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            });

            $('.export').on('click', function(e)
            {

                let namaTrue = ($("#nama-type").is(':checked')) ? 'checked' : 'not';
                let univTrue = ($("#univ-type").is(':checked')) ? 'checked' : 'not';
                let emailTrue = ($('#email-type').is(':checked')) ? 'checked' : 'not';
                let teleponTrue = ($('#telepon-type').is(':checked')) ? 'checked' : 'not';

                let data = {
                     _token: $('meta[name="csrf-token"]').attr('content'),
                    nama: namaTrue,
                    univ: univTrue,
                    email: emailTrue,
                    telepon: teleponTrue
                };

                $.ajax(
                {
                    url: '/get-export-data-student',
                    type: 'POST',
                    data: data,
                    dataType: 'json',
                    beforeSend: function()
                    {
                        console.log(data);
                    },
                    success: function(resp)
                    {
                        let table = "<table class='table table-bordered' width='1%'><thead>";
                        let column = "";

                        if(namaTrue == "checked")
                            column = "<th>Full Name</th>";
                        if(univTrue == "checked")
                            column += "<th>Universitas</th>";
                        if(emailTrue == "checked")
                            column += "<th>Email</th>";
                        if(teleponTrue == "checked")
                            column += "<th>Phone Number</th>";

                        table += column;
                        table += "</thead><tbody>";
                        $.each(resp, function(i, val)
                        {
                            let fullName = (namaTrue == "checked") ? val.firstName + " " + val.lastName : "";
                            let univ = (univTrue == "checked") ? val.universityName : "";
                            let email = (emailTrue == "checked") ? val.studentEmail : "";
                            let phoneNum = (teleponTrue == "checked") ? val.phoneNumber : "";
                            table += "<tr>";
                            if(namaTrue == "checked")
                                table += "<td>" + fullName + "</td>";
                            if(univTrue == "checked")
                                table += "<td>" + univ + "</td>";
                            if(emailTrue == "checked")
                                table += "<td>" + email + "</td>";
                            if(teleponTrue == "checked")
                                table += "<td>" + phoneNum + "</td>";
                            table += "</tr>";
                        });
                        table += "</tbody></table>";

                        $('#div-export-data').append(table);

                        $(table).table2csv({
                            separator: ',',
                            newline: '\n',
                            quoteFields: true,
                            filename: 'table.csv'
                        });
                    },
                    error: function(xhr)
                    {
                        console.log(xhr.responseText);
                    }
                })
            });

			$("#search-applicant").on("keyup", function(e) {
                e.preventDefault();
                const value = $(this).val();
                let count = 0;
                let searchType = $('#search-type').val();

                const matcher = new RegExp($(this).val(), 'i');

                if(searchType == 'student')
                {
                    $('.applicant-detail').show().not(function(){
                        //return matcher.test($(this).find('.applicant-name, .applicant-status, .applicant-applied-date').text()) //search based on name, status, and date
                        return matcher.test($(this).find('.applicant-name').text()) // search based on name
                    }).hide();
                }
                else if(searchType == 'university')
                {
                    $('.applicant-detail').show().not(function(){
                        //return matcher.test($(this).find('.applicant-name, .applicant-status, .applicant-applied-date').text()) //search based on name, status, and date
                        return matcher.test($(this).find('.university-name').text()) // search based on name
                    }).hide();
                }

                if (value == "") {
                    count = $(".applicant-detail").length;
                } else {
                    count = $(".applicant-detail:visible").length;
                }

                $("span#total-applicant").text(count);
            });

            // $('.applicant-detail').on('click', '.view-cv-button', function(e) {
            //     const student_id = $(this).data('s');
            //     const status = $('#status-'+student_id).text();

            //     if (status == "New applicant")
            //         $('#status-'+student_id).text("In reviewed");
            // });


            // $('#tblJobVacancy').DataTable();

            // $('#tblJobVacancy').on('click', '.btnDelete', function(e) {
            //     e.preventDefault();
            //     var jobPostID = $(this).data('id');
            //     var jobPostName = $(this).data('name');

            //     swal({
            //         title: "Are you sure to delete <b>" + jobPostName + "</b>?",
            //         text: "You will not be able to recover this job postings!",
            //         type: "warning",
            //         html: true,
            //         showCancelButton: true,
            //         confirmButtonColor: "#EF5350",
            //         confirmButtonText: "Yes",
            //         cancelButtonText: "No",
            //         closeOnConfirm: false,
            //         closeOnCancel: true,
            //         showLoaderOnConfirm: true
            //     }, function(isConfirm){
            //         if(!isConfirm)
            //             return;

            //         var url = "/ManageJobPosts/Delete/jpID="+jobPostID;
            //         $.ajax({
            //             method: "GET",
            //             url: url,
            //             success: function(resp){
            //                 console.log(resp);
            //                 if(resp) {
            //                     swal({
            //                         title: "Job Posting Deleted!",
            //                         confirmButtonColor: "#66BB6A",
            //                         type: "success",
            //                         timer: 2000
            //                     });

            //                     setTimeout(function(){
            //                         location.reload();
            //                     }, 2500);
            //                 } else {
            //                     swal({
            //                         type: "error",
            //                         title: "Delete Failed !",
            //                         confirmButtonColor: "#EF5350",
            //                         timer: 2000
            //                     });
            //                 }
            //             }, error: function(resp){
            //                 swal({
            //                     type: "error",
            //                     title: "Delete Failed !",
            //                     confirmButtonColor: "#EF5350",
            //                     timer: 2000
            //                 });
            //             }
            //         });
            //     });
            // });

            // $("#tblJobVacancy").on("change", '#cbJobFunction', function(e){
            //     e.preventDefault();
            //     var active = $(this).val();
            //     var tempArr = active.split("&");
            //     var jobPostName = tempArr[0];
            //     var jobPostID = tempArr[1];
            //     console.log(jobPostName);

            //     if(tempArr[2] === "active") {
            //         $(this).removeProp("selected");
            //         $(this).val(jobPostName+"&"+jobPostID+"&inactive");
            //         swal({
            //             title: "Are you sure to set " + jobPostName + " <b> Active </b>?",		    	type: "warning",
            //             html: true,
            //             showCancelButton: true,
            //             confirmButtonColor: "#EF5350",
            //             confirmButtonText: "Yes",
            //             cancelButtonText: "No",
            //             closeOnConfirm: false,
            //             closeOnCancel: true,
            //             showLoaderOnConfirm: true,
            //         }, function(isConfirm){
            //             let url = "/SetJobPostActive";
            //             if(!isConfirm)
            //                 return;
            //             else {
            //                 $.ajax({
            //                     url: url,
            //                     method: "POST",
            //                     data: {_token: "<?php echo csrf_token(); ?>", jobPostID: jobPostID},
            //                     success: function(resp)	{
            //                         if(resp) {
            //                             swal({
            //                                 title: "Success!",
            //                                 showConfirmButton: false,
            //                                 type: "success",
            //                                 timer: 2000
            //                             });

            //                             setTimeout(function(){
            //                                 location.reload();
            //                             }, 1500);
            //                         }
            //                     }
            //                 });
            //             }
            //         });
            //     } else {
            //         $(this).removeProp("selected");
            //         $(this).val(jobPostName+"&"+jobPostID+"&active");
            //         swal({
            //             title: "Are you sure to set " + jobPostName + " <b> Not Active </b>?",
            //             type: "warning",
            //             html: true,
            //             showCancelButton: true,
            //             confirmButtonColor: "#EF5350",
            //             confirmButtonText: "Yes",
            //             cancelButtonText: "No",
            //             closeOnConfirm: false,
            //             closeOnCancel: true,
            //             showLoaderOnConfirm: true,
            //         }, function(isConfirm){
            //             let url = "/SetJobPostNonActive";

            //             if(!isConfirm)
            //                 return;
            //             else {
            //                 $.ajax({
            //                     url: url,
            //                     method: "POST",
            //                     data: {_token: "<?php echo csrf_token(); ?>", jobPostID: jobPostID},
            //                     success: function(resp)	{
            //                         if(resp) {
            //                             swal({
            //                                 title: "Success!",
            //                                 showConfirmButton: false,
            //                                 type: "success",
            //                                 timer: 2000
            //                             });
            //                             setTimeout(function(){
            //                                 location.reload();
            //                             }, 1500);
            //                         }
            //                     }
            //                 });
            //             }
            //         });
            //     }
            // });


        });
    </script>
</body>
</html>
