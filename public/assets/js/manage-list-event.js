$(function () {
    $('#searchEventCompany').on('keyup', function (e) {
        e.preventDefault();
        sortFilter();
    });

    $('#sortByEvent').on('change', function (e) {
        e.preventDefault();
        sortFilter();
    });

    $('#btnDescEvent').on('click', function (e) {
        e.preventDefault();
        $('#adesc').val('desc');
        sortFilter();
    });

    $('#btnAscEvent').on('click', function (e) {
        e.preventDefault();
        $('#adesc').val('asc');
        sortFilter();
    })

    $('#statusActive').on('change', function (e) {
        e.preventDefault();
        sortFilter();
    });

    function sortFilter() {
        var searchEventCompany = $('#searchEventCompany').val();
        var sortByEvent = $('#sortByEvent').val();
        var adesc = $('#adesc').val();
        var statusActive = $('#statusActive').val();
        console.log(statusActive);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: "/event/sortEvent",
            method: "POST",
            data: { searchEventCompany: searchEventCompany, sortByEvent: sortByEvent, adesc: adesc, statusActive: statusActive },
            success: function (dataEvent) {
                $('#eventColumn').empty();
                $.each(dataEvent, function (idx, result) {
                    let content = '<a type="button" href="/event/' + result.id + '" ><div class="panel-list"><div style="margin-right: 60px;"><img src="../images/nusatalent.png" class="avatar-listjob"></div><div style="display: flex; flex-direction: column; width: 100%;"><div style="display: flex; justify-content: space-between; width: 95%;"><div><label class="panel-title">' + result.name + '</label></div><div><object><a type="button" href="/company/edit/"><i class="fas fa-edit fa-lg" style="color: #04518D; margin-right:20px;"></i></a><a type="button" data-toggle="modal" data-target="#deleteCompany"><i class="far fa-trash-alt fa-lg" style="color: #04518D;"></i></a></object></div></div><div style="display: flex; width: 57%;"><div><i class="fas fa-map-marker-alt fa-lg icon"></i><object><a class="img-icon panel-subtitle text2" style="margin-top: 10px;">Location (Lokasi diambil dari career_location table, bikin baru)</a></object></div></div><div style="display: flex; justify-content: space-between; width: 80%; margin-top: 20px;"><div><label class="text13">25</label><label class="text13">&nbsp;Company</label></div><div><label class="text13">75</label><label class="text13">&nbsp;Job Post(s)</label></div><div><label class="text13">800</label><label class="text13">&nbsp;Visitor(s)</label></div></div></div></div></a>'
                    $('#eventColumn').append(content);
                });
            }
        });
    }
});
