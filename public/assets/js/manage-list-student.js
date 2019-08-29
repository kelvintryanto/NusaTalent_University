$(function () {
    $('#searchStudent').on('keyup', function (e) {
        e.preventDefault();
        sortFilter();
    });

    $('#enrollmentbatch').on('change', function (e) {
        e.preventDefault();
        sortFilter();
    });

    $('#btnDescStudent').on('click', function (e) {
        e.preventDefault();
        $('#adesc').val('desc');
        sortFilter();
    });

    $('#btnAscStudent').on('click', function (e) {
        e.preventDefault();
        $('#adesc').val('asc');
        sortFilter();
    });

    $('#filterStudent').on('change', function (e) {
        e.preventDefault();
        sortFilter();
    });

    $('#status').on('change', function (e) {
        e.preventDefault();
        sortFilter();
    });

    $('#resetStudent').on('click', function (e) {
        e.preventDefault();
        $('#enrollmentbatch').prop('selectedIndex', 0);
        $('#filterStudent').prop('selectedIndex', 0);
        $('#status').prop('selectedIndex', 0)
        $('#searchStudent').val('');
        $('#status').prop('selectedIndex', 0);

        sortFilter();
    })

    function sortFilter() {
        var searchStudent = $('#searchStudent').val();
        var enrollment = $('#enrollmentbatch').val();
        var adesc = $('#adesc').val();
        var filterStudent = $('#filterStudent').val();
        var status = $('#status').val();
        // console.log(status);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: "/student/sortList",
            method: "POST",
            data: { searchStudent: searchStudent, enrollment: enrollment, adesc: adesc, filterStudent: filterStudent, status: status },
            success: function (dataJob) {
                var data = dataJob.data;
                $('#studentColumn').empty();
                $.each(data, function (idx, result) {
                    switch (result.currently) {
                        case 1: result.currently = "Currently Working"; break;
                        case 0: result.currently = "Last Work in <b>" + result.lastDate + "</b>"; break;
                        case null: result.currently = "Never Work"; break;
                        default: result.currently;
                    }
                    if (result.start == "0000-00-00 00:00:00") result.start = "No Data";
                    if (result.end == "0000-00-00 00:00:00") result.end = "No Data";
                    let content = '<a data-target="#detail' + result.studentID + '" data-toggle="modal" type="button"><button class="btn btninformasi column-c"><div class="row"><div class="col-lg-3"><img src="../icon/avatar.png" alt="Avatar" class="avatar-mini"></div><div class="col-lg-9" style="overflow:hidden"><div><label class="text5">' + result.fullName + '</label></div><div style="margin-top: -10px"><label class="text4">Summary</label></div></div></div><div style="display: flex; justify-content: flex-end; margin-top: 20px; margin-bottom: 15px;"><label class="text4"><i class="fas fa-briefcase" style="margin-right: 5px; "></i>' + result.currently + '</label></div><div style="display: flex; justify-content: flex-end;"><label class="text4" style="float: right;">Register Date : ' + result.registerDate + '</label></div></button></a><div id="detail' + result.studentID + '" class="modal fade"><div class="modal-dialog" style="width: 80%;"><div class="modal-content" style="padding: 20px;"><div class="panel-heading" style="display: flex;"><div style="margin-right: 2%;"><img src="../icon/avatar.png" alt="Avatar" class="avatar"></div><div style="flex-grow: 1;"><div class="flex-flow"><a class="text11">' + result.fullName + '</a></div><div class="flex-flow"><p class="text2">Back End Programmer</p></div><div class="flex-flow" style="margin-bottom: 40px;"><a class="text7" style="margin-right: 20px">Application in process</a></div><div style="margin-bottom: 10px; display: flex;"><div class="col-lg-3 col-sm-3 col-md-3 col-xs-3"><label class="text2">Employment</label></div><div class="col-lg-8 col-sm-8 col-md-8"><label class="text9">Employed</label></div></div><div style="margin-bottom: 10px; display: flex;"><div class="col-lg-3 col-sm-3 col-md-3 col-xs-3"><label class="text2">Employment<br>Date</label></div><div class="col-lg-8 col-sm-8 col-md-8" style="margin-top: 1%;"><label class="text9">02/02/2019</label></div></div><div style="margin-bottom: 10px; display: flex;"><div class="col-lg-3 col-sm-3 col-md-3 col-xs-3"><label class="text2">Company</label></div><div class="col-lg-8 col-sm-8 col-md-8"><label class="text9">Employed</label></div></div><div style="margin-bottom: 10px; display: flex;"><div class="col-lg-3 col-sm-3 col-md-3 col-xs-3"><label class="text2">Employment</label></div><div class="col-lg-8 col-sm-8 col-md-8"><label class="text9">Zen Group</label></div></div><div style="margin-bottom: 10px; display: flex;"><div class="col-lg-3 col-sm-3 col-md-3 col-xs-3"><label class="text2">Company<br>Type</label></div><div class="col-lg-8 col-sm-8 col-md-8" style="margin-top: 1%;"><label class="text9">Private</label></div></div><div style="margin-bottom: 10px; display: flex;"><div class="col-lg-3 col-sm-3 col-md-3 col-xs-3"><label class="text2">Salary</label></div><div class="col-lg-8 col-sm-8 col-md-8"><label class="text9">5.000.000 - 7.000.000</label></div></div><div style="margin-bottom: 10px; display: flex;"><div class="col-lg-3 col-sm-3 col-md-3 col-xs-3"><label class="text2">Aligned<br>with Study</label></div><div class="col-lg-8 col-sm-8 col-md-8" style="margin-top: 1%;"><label class="text9">Yes</label></div></div><div style="margin-bottom: 10px; display: flex;"><div style="width: 100%;"><hr></div></div><div style="margin-bottom: 10px; display: flex;"><div class="col-lg-3 col-sm-3 col-md-3 col-xs-3"><label class="text2">School</label></div><div class="col-lg-8 col-sm-8 col-md-8"><label class="text9">' + result.universityName + '</label></div></div><div style="margin-bottom: 10px; display: flex;"><div class="col-lg-3 col-sm-3 col-md-3 col-xs-3"><label class="text2">Major</label></div><div class="col-lg-8 col-sm-8 col-md-8"><label class="text9">' + result.major + '</label></div></div><div style="margin-bottom: 10px; display: flex;"><div class="col-lg-3 col-sm-3 col-md-3 col-xs-3"><label class="text2">Enrollment</label></div><div class="col-lg-8 col-sm-8 col-md-8"><label class="text9">' + result.start + '</label></div></div><div style="margin-bottom: 10px; display: flex;"><div class="col-lg-3 col-sm-3 col-md-3 col-xs-3"><label class="text2">Graduation</label></div><div class="col-lg-8 col-sm-8 col-md-8"><label class="text9">' + result.end + '</label></div></div><div style="margin-bottom: 10px; display: flex;"><div class="col-lg-3 col-sm-3 col-md-3 col-xs-3" style="width: 7%;"><hr></div></div><div style="margin-bottom: 10px; display: flex;"><div class="col-lg-3 col-sm-3 col-md-3 col-xs-3"><label class="text2">Address</label></div><div class="col-lg-8 col-sm-8 col-md-8"><label class="text9">' + result.address + '</label></div></div><div style="margin-bottom: 10px; display: flex;"><div class="col-lg-3 col-sm-3 col-md-3 col-xs-3"><label class="text2">Phone</label></div><div class="col-lg-8 col-sm-8 col-md-8"><label class="text9">' + result.phone + '</label></div></div><div style="margin-bottom: 10px; display: flex;"><div class="col-lg-3 col-sm-3 col-md-3 col-xs-3"><label class="text2">Email</label></div><div class="col-lg-8 col-sm-8 col-md-8"><label class="text14">' + result.email + '</label></div></div><div style="margin-bottom: 10px; display: flex;"><div class="col-lg-3 col-sm-3 col-md-3 col-xs-3"><label class="text2">LinkedIn</label></div><div class="col-lg-8 col-sm-8 col-md-8"><label class="text">' + result.linkedin + '</label></div></div></div></div><div style="display: flex; justify-content: flex-end;"><button type="button" class="btn btn-link btn-cancelpanel text" data-dismiss="modal">Close</button></div></div></div></div>'
                    $('#studentColumn').append(content);
                });
            }
        });
    }
});
