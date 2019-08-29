$(function () {
    $("#search-job-post").on("keyup", function () {
        var g = $(this).val().toLowerCase();
        console.log(g)
        $(".panel-list-company p.text-company-name").each(function (index) {
            var s = $(this).text().toLowerCase();
            $(this).closest('.panel-list-company')[s.indexOf(g) !== -1 ? 'show' : 'hide']();
        });

        if (g != "")
            countTotalJob("filter");
        else
            countTotalJob("all");
    });

    const countTotalJob = (search) => {
        let totalCompany = 0;

        switch (search) {
            case "all":
                totalCompany = $('.panel-list-company').length;
                break;
            case "filter":
                totalCompany = $('.panel-list-company[style="display: block"]').length;
                break;
        }

        $('#total-job-post').text(totalCompany);
    }

    $('#btnDesc').on('click', function (e) {
        e.preventDefault();
        $('#adesc').val('desc');
        sortFilter()
    });

    $('#btnAsc').on('click', function (e) {
        e.preventDefault();
        $('#adesc').val('asc');
        sortFilter();
    });

    $('#searchCompany').on('keyup', function (e) {
        e.preventDefault();
        sortFilter();
    });

    $('#jobIndustry').on('change', function (e) {
        e.preventDefault();
        sortFilter()
    });

    $("#cbSortBy").on('change', function (e) {
        e.preventDefault();
        var sort = $(this).val();
        switch (sort) {
            case 'name':
                $('#adesc').val("asc");
                var sortFinal = "name";
                break;
            case 'amount':
                $('#adesc').val("desc");
                var sortFinal = "amount";
                break;
            default:
                $('#adesc').val("desc");
                var sortFinal = $('#sortBy').val();
        }
        var adesc = $('#adesc').val();
        var jobIndustry = $('#jobIndustry').val();
        var searchCompany = $('#searchCompany').val();
        // console.log(jobIndustry)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: "/company/sortList",
            method: "POST",
            data: { sortBy: sortFinal, ordered: adesc, jobIndustry: jobIndustry, searchCompany: searchCompany },
            success: function (dataCompany) {
                var data = dataCompany.data;
                // console.log(data)
                $('#companyColumn').empty();
                $.each(data, function (idx, result) {
                    if (result.amount == 0) {
                        result.amount = "No";
                    }
                    // console.log(company.company_id);
                    let content = '<a type="button" href="/company/detail/' + result.company_id + '"><div class="panel-list"><div style="margin-right: 60px;"><img src="../images/nusatalent.png" class="avatar-listjob"></div><div style="display: flex; flex-direction: column; width: 100%;"><div style="display: flex; justify-content: space-between; width: 95%;"><div><label class="panel-title">' + result.name + '</label></div><div><object><a type="button" href="/company/edit/' + result.id + '"><i class="fas fa-edit fa-lg" style="color: #04518D; margin-right:20px;"></i></a><a type="button" data-toggle="modal" data-target="#deleteCompany' + result.id + '"><i class="far fa-trash-alt fa-lg" style="color: #04518D;"></i></a></object></div></div><div style="display: flex; width: 57%;"><div><i class="fas fa-map-marker-alt fa-lg icon"></i><object><a class="img-icon panel-subtitle text2" style="margin-top: 10px;">Location (lokasi tidak ada di column table company_profile, ngambil yang mana?)</a></object></div></div><div style="display: flex; justify-content: space-between; width: 80%; margin-top: 20px;"><div><label class="text13">' + result.amount + '</label><label class="text13">&nbsp;Job&nbsp;Post(s)</label></div></div></div></div></a>'
                    $('#companyColumn').append(content);
                });
            }
        })


        // $('.loader-container').fadeIn('slow');
        // $('.page-container').addClass('blur');
        // if (sort != "") {
        //     $.ajax(
        //         {
        //             url: '/company/sort-list-company',
        //             type: 'POST',
        //                         data: {
        //                             _token: $('meta[name="csrf-token"]').attr('content'),
        //                             sortBy: val
        //                         },
        //                         success: function (e) {
        //                             $('.loader-container').fadeOut('slow');
        //                             $('.page-container').removeClass('blur');
        //                             $(".panel-list-company").remove();
        //                             $.each(e, function (idx, el) {
        //                                 var totalViewed = (el.totalViewed == null) ? 0 : el.totalViewed;
        //                                 var totalApplied = (el.totalApplied == null) ? 0 : el.totalApplied;
        //                                 var totalFavorite = (el.totalFavorite == null) ? 0 : el.totalFavorite;
        //                                 var boothNumber = (el.boothNumber == null) ? "has'nt assigned yet" : el.boothNumber;
        //                                 var totalJobPost = (el.totalJobPost == null) ? 0 : el.totalJobPost;
        //                                 var updatedAt = (el.updated_at != "0000-00-00 00:00:00") ? moment(el.created_at).format('LLLL') : "no signing yet";

        // let append = '<div class="panel panel-white panel-container panel-list-company"><div class="panel-body" id="company-' + el.companyID + '"><div class="row"><div class="col-lg-12"><div class="row"><div class="col-lg-2"><p class="text-company-name">' + el.companyName + '</p></div><div class="col-lg-offset-7 col-lg-3"><p> Booth number: <span class="job-post-work-location"> <b> #' + boothNumber + ' </b> </span> </p></div></div><div class="row"><div class="col-lg-2"><p class="job-post-work-location" style="color: #00BFFF;opacity: 0.5;"> ' + el.companyLocation + ' </p></div><div class="col-lg-offset-7 col-lg-3"><p> Total job post: <span class="job-post-work-location"> <b> ' + totalJobPost + '</b> </span> </p></div></div><div class="row"><div class="col-lg-2"><p class="job-post-work-location"> ' + el.companyIndustry + '</p></div><div class="col-lg-offset-7 col-lg-3"><p> Last Login: <span style="color: #C7C7C7;"> <b> ' + updatedAt + ' </b> </span> </p></div></div><div class="row"><div class="col-lg-2 text-grey"><i class="icon-eye position-left"></i> ' + totalViewed + '</div><div class="col-lg-2 text-grey"><i class="icon-star-full2 position-left"></i> ' + totalFavorite + '</div><div class="col-lg-2 text-grey"><i class="icon-profile position-left"></i> ' + totalApplied + '</div><div class="col-lg-2"><a href="/Company/edit-profile/cID=' + el.companyID + '"><button type="button" class="btn job-post-action-button"><i class="material-icons">edit</i></button></a><button type="button" class="btn job-post-action-button delete-job-post" data-name="' + el.companyName + '" data-id="' + el.companyID + '" style="background-color: red;"><i class="material-icons">delete</i></button></div></div></div></div></div></div>';

        //                                 $(".content").append(append);
        //                             });
        //                         },
        //             error: function (e) {
        //                 console.log(e);
        //             }
        //         });
        // }
        // else {
        //     $('.loader-container').fadeOut('slow');
        //     $('.page-container').removeClass('blur');
        // }
    });

    $(".content ").on("click", ".delete-job-post", function (e) {
        e.preventDefault();

        var companyID = $(this).data('id');
        var companyName = $(this).data('name');

        swal(
            {
                title: "Are you sure to delete <br><b class='bold-red'>" + companyName + "</b> ? ",
                type: "warning",
                showCancelButton: true,
                html: true,
                confirmButtonColor: "#F44336",
                confirmButtonText: "Submit !",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            },
            function (isConfirm) {
                if (!isConfirm) return;
                $.ajax(
                    {
                        url: '/Company/delete-company',
                        type: 'POST',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            companyID: companyID
                        },
                        success: function (e) {
                            if (e) {
                                setTimeout(function () {
                                    swal({
                                        title: "Successfully delete company",
                                        showCancelButton: false,
                                        type: "success",
                                        html: true,
                                        confirmButtonColor: "#66BB6A"
                                    });
                                    $("#company-" + companyID).remove();
                                }, 1000);
                            }
                        },
                        error: function (e) {

                        }
                    });
            }
        );
    });

    $('#resetCompany').on('click', function (e) {
        e.preventDefault();
        $('#jobIndustry').prop('selectedIndex', 0);
        $('#cbSortBy').prop('selectedIndex', 0);
        $('#searchCompany').val('');

        sortFilter();
    })

    function sortFilter() {
        var sort = $('#cbSortBy').val();
        var adesc = $('#adesc').val();
        var jobIndustry = $('#jobIndustry').val();
        var searchCompany = $('#searchCompany').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: "/company/sortList",
            method: "POST",
            data: { sortBy: sort, ordered: adesc, jobIndustry: jobIndustry, searchCompany: searchCompany },
            success: function (dataCompany) {
                var data = dataCompany.data;
                // console.log(data)
                $('#companyColumn').empty();
                $.each(data, function (idx, result) {
                    if (result.amount == 0) {
                        result.amount = "No";
                    }
                    // console.log(company.company_id);
                    let content = '<a type="button" href="/company/detail/' + result.company_id + '"><div class="panel-list"><div style="margin-right: 60px;"><img src="../images/nusatalent.png" class="avatar-listjob"></div><div style="display: flex; flex-direction: column; width: 100%;"><div style="display: flex; justify-content: space-between; width: 95%;"><div><label class="panel-title">' + result.name + '</label></div><div><object><a type="button" href="/company/edit/' + result.id + '"><i class="fas fa-edit fa-lg" style="color: #04518D; margin-right:20px;"></i></a><a type="button" data-toggle="modal" data-target="#deleteCompany' + result.id + '"><i class="far fa-trash-alt fa-lg" style="color: #04518D;"></i></a></object></div></div><div style="display: flex; width: 57%;"><div><i class="fas fa-map-marker-alt fa-lg icon"></i><object><a class="img-icon panel-subtitle text2" style="margin-top: 10px;">Location (lokasi tidak ada di column table company_profile, ngambil yang mana?)</a></object></div></div><div style="display: flex; justify-content: space-between; width: 80%; margin-top: 20px;"><div><label class="text13">' + result.amount + '</label><label class="text13">&nbsp;Job&nbsp;Post(s)</label></div></div></div></div></a>'
                    $('#companyColumn').append(content);
                });
            }
        })
    }
});
