$(function () {
    $('#companyFilter').on('change', function (e) {
        e.preventDefault();
        var companyFilter = $('#companyFilter').val();
        var jobStatus = $('#jobStatus').val();
        var searchJob = $('#searchJobPost').val();
        var adesc = $('#adesc').val();
        var sortBy = $('#sortBy').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: "/job/sortList",
            method: "POST",
            data: { companyFilter: companyFilter, jobStatus: jobStatus, searchJob: searchJob, adesc: adesc, sortBy: sortBy },
            success: function (dataJob) {
                $('#jobColumn').empty();
                $.each(dataJob, function (idx, result) {
                    let content = '<div class="panel-list"><div style="margin-right: 60px;"><img src="../icon/haha.png" class="avatar-listjob"></div><div style="display: flex; flex-direction: column; width: 100%;"><div style="display: flex; justify-content: space-between; width: 95%;"><div><label class="panel-title">' + result.jpName + '</label><br><label style="color: #04518D">' + result.cpName + '</label></div><div><i class="fas fa-edit fa-lg" style="color: #04518D; margin-right:20px;"></i><i class="far fa-trash-alt fa-lg" style="color: #04518D"></i></div></div><div><i class="fas fa-briefcase fa-lg icon"></i><a class="img-icon panel-subtitle text2" style="margin-top: 10px;">' + result.industry + '</a><div><i class="fas fa-user-alt fa-lg icon"></i><a class="panel-subtitle text2">' + result.workhour + '</a></div></div><div style="display: flex; justify-content: space-between; width: 80%; margin-top: 20px;"><div><label class="text13">' + result.viewed + '</label><label class="text13">&nbsp;Viewed</label></div><div><label class="text13">' + result.favorited + '</label><label class="text13">&nbsp;Favorited</label></div><div><label class="text13">' + result.applied + '</label><label class="text13">&nbsp;Applied</label></div></div></div></div>'
                    $('#jobColumn').append(content);
                });
            }
        })
    });

    $('#jobStatus').on('change', function (e) {
        e.preventDefault();
        var companyFilter = $('#companyFilter').val();
        var jobStatus = $('#jobStatus').val();
        var searchJob = $('#searchJobPost').val();
        var adesc = $('#adesc').val();
        var sortBy = $('#sortBy').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: "/job/sortList",
            method: "POST",
            data: { companyFilter: companyFilter, jobStatus: jobStatus, searchJob: searchJob, adesc: adesc, sortBy: sortBy },
            success: function (dataJob) {
                $('#jobColumn').empty();
                $.each(dataJob, function (idx, result) {
                    let content = '<div class="panel-list"><div style="margin-right: 60px;"><img src="../icon/haha.png" class="avatar-listjob"></div><div style="display: flex; flex-direction: column; width: 100%;"><div style="display: flex; justify-content: space-between; width: 95%;"><div><label class="panel-title">' + result.jpName + '</label><br><label style="color: #04518D">' + result.cpName + '</label></div><div><i class="fas fa-edit fa-lg" style="color: #04518D; margin-right:20px;"></i><i class="far fa-trash-alt fa-lg" style="color: #04518D"></i></div></div><div><i class="fas fa-briefcase fa-lg icon"></i><a class="img-icon panel-subtitle text2" style="margin-top: 10px;">' + result.industry + '</a><div><i class="fas fa-user-alt fa-lg icon"></i><a class="panel-subtitle text2">' + result.workhour + '</a></div></div><div style="display: flex; justify-content: space-between; width: 80%; margin-top: 20px;"><div><label class="text13">' + result.viewed + '</label><label class="text13">&nbsp;Viewed</label></div><div><label class="text13">' + result.favorited + '</label><label class="text13">&nbsp;Favorited</label></div><div><label class="text13">' + result.applied + '</label><label class="text13">&nbsp;Applied</label></div></div></div></div>'
                    $('#jobColumn').append(content);
                });
            }
        })
    });

    $('#searchJobPost').on("keyup", function (e) {
        e.preventDefault();
        var companyFilter = $('#companyFilter').val();
        var jobStatus = $('#jobStatus').val();
        var searchJob = $('#searchJobPost').val();
        var adesc = $('#adesc').val();
        var sortBy = $('#sortBy').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: "/job/sortList",
            method: "POST",
            data: { companyFilter: companyFilter, jobStatus: jobStatus, searchJob: searchJob, adesc: adesc, sortBy: sortBy },
            success: function (dataJob) {
                $('#jobColumn').empty();
                $.each(dataJob, function (idx, result) {
                    let content = '<div class="panel-list"><div style="margin-right: 60px;"><img src="../icon/haha.png" class="avatar-listjob"></div><div style="display: flex; flex-direction: column; width: 100%;"><div style="display: flex; justify-content: space-between; width: 95%;"><div><label class="panel-title">' + result.jpName + '</label><br><label style="color: #04518D">' + result.cpName + '</label></div><div><i class="fas fa-edit fa-lg" style="color: #04518D; margin-right:20px;"></i><i class="far fa-trash-alt fa-lg" style="color: #04518D"></i></div></div><div><i class="fas fa-briefcase fa-lg icon"></i><a class="img-icon panel-subtitle text2" style="margin-top: 10px;">' + result.industry + '</a><div><i class="fas fa-user-alt fa-lg icon"></i><a class="panel-subtitle text2">' + result.workhour + '</a></div></div><div style="display: flex; justify-content: space-between; width: 80%; margin-top: 20px;"><div><label class="text13">' + result.viewed + '</label><label class="text13">&nbsp;Viewed</label></div><div><label class="text13">' + result.favorited + '</label><label class="text13">&nbsp;Favorited</label></div><div><label class="text13">' + result.applied + '</label><label class="text13">&nbsp;Applied</label></div></div></div></div>'
                    $('#jobColumn').append(content);
                });
            }
        })
    });

    $('#btnDescJob').on('click', function (e) {
        e.preventDefault();
        $('#adesc').val('desc');
        var companyFilter = $('#companyFilter').val();
        var jobStatus = $('#jobStatus').val();
        var searchJob = $('#searchJobPost').val();
        var adesc = $('#adesc').val();
        var sortBy = $('#sortBy').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: "/job/sortList",
            method: "POST",
            data: { companyFilter: companyFilter, jobStatus: jobStatus, searchJob: searchJob, adesc: adesc, sortBy: sortBy },
            success: function (dataJob) {
                $('#jobColumn').empty();
                $.each(dataJob, function (idx, result) {
                    let content = '<div class="panel-list"><div style="margin-right: 60px;"><img src="../icon/haha.png" class="avatar-listjob"></div><div style="display: flex; flex-direction: column; width: 100%;"><div style="display: flex; justify-content: space-between; width: 95%;"><div><label class="panel-title">' + result.jpName + '</label><br><label style="color: #04518D">' + result.cpName + '</label></div><div><i class="fas fa-edit fa-lg" style="color: #04518D; margin-right:20px;"></i><i class="far fa-trash-alt fa-lg" style="color: #04518D"></i></div></div><div><i class="fas fa-briefcase fa-lg icon"></i><a class="img-icon panel-subtitle text2" style="margin-top: 10px;">' + result.industry + '</a><div><i class="fas fa-user-alt fa-lg icon"></i><a class="panel-subtitle text2">' + result.workhour + '</a></div></div><div style="display: flex; justify-content: space-between; width: 80%; margin-top: 20px;"><div><label class="text13">' + result.viewed + '</label><label class="text13">&nbsp;Viewed</label></div><div><label class="text13">' + result.favorited + '</label><label class="text13">&nbsp;Favorited</label></div><div><label class="text13">' + result.applied + '</label><label class="text13">&nbsp;Applied</label></div></div></div></div>'
                    $('#jobColumn').append(content);
                });
            }
        })
    });

    $('#btnAscJob').on('click', function (e) {
        e.preventDefault();
        $('#adesc').val('asc');

        var companyFilter = $('#companyFilter').val();
        var jobStatus = $('#jobStatus').val();
        var searchJob = $('#searchJobPost').val();
        var adesc = $('#adesc').val();
        var sortBy = $('#sortBy').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: "/job/sortList",
            method: "POST",
            data: { companyFilter: companyFilter, jobStatus: jobStatus, searchJob: searchJob, adesc: adesc, sortBy: sortBy },
            success: function (dataJob) {
                $('#jobColumn').empty();
                $.each(dataJob, function (idx, result) {
                    let content = '<div class="panel-list"><div style="margin-right: 60px;"><img src="../icon/haha.png" class="avatar-listjob"></div><div style="display: flex; flex-direction: column; width: 100%;"><div style="display: flex; justify-content: space-between; width: 95%;"><div><label class="panel-title">' + result.jpName + '</label><br><label style="color: #04518D">' + result.cpName + '</label></div><div><i class="fas fa-edit fa-lg" style="color: #04518D; margin-right:20px;"></i><i class="far fa-trash-alt fa-lg" style="color: #04518D"></i></div></div><div><i class="fas fa-briefcase fa-lg icon"></i><a class="img-icon panel-subtitle text2" style="margin-top: 10px;">' + result.industry + '</a><div><i class="fas fa-user-alt fa-lg icon"></i><a class="panel-subtitle text2">' + result.workhour + '</a></div></div><div style="display: flex; justify-content: space-between; width: 80%; margin-top: 20px;"><div><label class="text13">' + result.viewed + '</label><label class="text13">&nbsp;Viewed</label></div><div><label class="text13">' + result.favorited + '</label><label class="text13">&nbsp;Favorited</label></div><div><label class="text13">' + result.applied + '</label><label class="text13">&nbsp;Applied</label></div></div></div></div>'
                    $('#jobColumn').append(content);
                });
            }
        })
    })

    $('#sortBy').on('change', function (e) {
        e.preventDefault();
        var sortBy = $('#sortBy').val();
        // alert('halo manusia')
        switch (sortBy) {
            case 'latest':
                $('#adesc').val("desc");
                var sortFinal = "date";
                break;
            case 'oldest':
                $('#adesc').val("asc");
                var sortFinal = "date";
                break;
            case 'viewed':
                $('#adesc').val("desc");
                var sortFinal = $('#sortBy').val();
                break;
            case 'favorited':
                $('#adesc').val("desc");
                var sortFinal = $('#sortBy').val();
                break;
            case 'applied':
                $('#adesc').val("desc");
                var sortFinal = $('#sortBy').val();
                break;
            default:
                $('#adesc').val("desc");
                var sortFinal = $('#sortBy').val();
        }
        var companyFilter = $('#companyFilter').val();
        var jobStatus = $('#jobStatus').val();
        var searchJob = $('#searchJobPost').val();
        var adesc = $('#adesc').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: "/job/sortList",
            method: "POST",
            data: { companyFilter: companyFilter, jobStatus: jobStatus, searchJob: searchJob, adesc: adesc, sortBy: sortFinal },
            success: function (dataJob) {
                $('#jobColumn').empty();
                $.each(dataJob, function (idx, result) {
                    let content = '<div class="panel-list"><div style="margin-right: 60px;"><img src="../icon/haha.png" class="avatar-listjob"></div><div style="display: flex; flex-direction: column; width: 100%;"><div style="display: flex; justify-content: space-between; width: 95%;"><div><label class="panel-title">' + result.jpName + '</label><br><label style="color: #04518D">' + result.cpName + '</label></div><div><i class="fas fa-edit fa-lg" style="color: #04518D; margin-right:20px;"></i><i class="far fa-trash-alt fa-lg" style="color: #04518D"></i></div></div><div><i class="fas fa-briefcase fa-lg icon"></i><a class="img-icon panel-subtitle text2" style="margin-top: 10px;">' + result.industry + '</a><div><i class="fas fa-user-alt fa-lg icon"></i><a class="panel-subtitle text2">' + result.workhour + '</a></div></div><div style="display: flex; justify-content: space-between; width: 80%; margin-top: 20px;"><div><label class="text13">' + result.viewed + '</label><label class="text13">&nbsp;Viewed</label></div><div><label class="text13">' + result.favorited + '</label><label class="text13">&nbsp;Favorited</label></div><div><label class="text13">' + result.applied + '</label><label class="text13">&nbsp;Applied</label></div></div></div></div>'
                    $('#jobColumn').append(content);
                });
            }
        })
    });

    $('#resetJob').on('click', function (e) {
        e.preventDefault();
        $('#companyFilter').prop('selectedIndex', 0);
        $('#cbSortBy').prop('selectedIndex', 0);
        $('#searchJobPost').val(' ');
        $('#jobStatus').prop('selectedIndex', 0);

        var companyFilter = $('#companyFilter').val();
        var jobStatus = $('#jobStatus').val();
        var searchJob = $('#searchJobPost').val();
        var adesc = $('#adesc').val();
        var sortBy = $('#sortBy').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: "/job/sortList",
            method: "POST",
            data: { companyFilter: companyFilter, jobStatus: jobStatus, searchJob: searchJob, adesc: adesc, sortBy: sortBy },
            success: function (dataJob) {
                $('#jobColumn').empty();
                $.each(dataJob, function (idx, result) {
                    let content = '<div class="panel-list"><div style="margin-right: 60px;"><img src="../icon/haha.png" class="avatar-listjob"></div><div style="display: flex; flex-direction: column; width: 100%;"><div style="display: flex; justify-content: space-between; width: 95%;"><div><label class="panel-title">' + result.jpName + '</label><br><label style="color: #04518D">' + result.cpName + '</label></div><div><i class="fas fa-edit fa-lg" style="color: #04518D; margin-right:20px;"></i><i class="far fa-trash-alt fa-lg" style="color: #04518D"></i></div></div><div><i class="fas fa-briefcase fa-lg icon"></i><a class="img-icon panel-subtitle text2" style="margin-top: 10px;">' + result.industry + '</a><div><i class="fas fa-user-alt fa-lg icon"></i><a class="panel-subtitle text2">' + result.workhour + '</a></div></div><div style="display: flex; justify-content: space-between; width: 80%; margin-top: 20px;"><div><label class="text13">' + result.viewed + '</label><label class="text13">&nbsp;Viewed</label></div><div><label class="text13">' + result.favorited + '</label><label class="text13">&nbsp;Favorited</label></div><div><label class="text13">' + result.applied + '</label><label class="text13">&nbsp;Applied</label></div></div></div></div>'
                    $('#jobColumn').append(content);
                });
            }
        })
    })
});
