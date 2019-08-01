$(function() {

    $('.select').select2({
        minimumResultsForSearch: Infinity
    });
	
    // Select with search
    $('.select-search').select2();
	
    // For checkbox
    $(".styled").uniform({
        radioClass: 'choice'
    });


    $("#search-job-post").on("keyup", function() {
        var g = $(this).val().toLowerCase();
        $(".panel-job-post p.job-post-position").each(function() {
                var s = $(this).text().toLowerCase();
                $(this).closest('.panel-job-post')[ s.indexOf(g) !== -1 ? 'show' : 'hide' ]();
        });

        if (g != "")
            countTotalJob("filter");
        else
            countTotalJob("all");
    });
    

    $("#all-job-button").on('click', function(e) {
        $("#all-job-button").removeClass('active');
        $("#active-job-button").removeClass('active');
        $("#inactive-job-button").removeClass('active');
        
        $("#all-job-button").addClass('active');

        $('[data-status="inactive-job"]').show();
        $('[data-status="active-job"]').show();
        $('[data-status="archive-job"]').show();
    });


    $("#active-job-button").on('click', function(e) {
        $("#all-job-button").removeClass('active');
        $("#active-job-button").removeClass('active');
        $("#inactive-job-button").removeClass('active');
        
        $("#active-job-button").addClass('active');

        $('[data-status="inactive-job"]').hide();
        $('[data-status="active-job"]').show();
        $('[data-status="archive-job"]').hide();
    });


    $("#inactive-job-button").on('click', function(e) {
        $("#all-job-button").removeClass('active');
        $("#active-job-button").removeClass('active');
        $("#inactive-job-button").removeClass('active');
        
        $("#inactive-job-button").addClass('active');
        
        $('[data-status="inactive-job"]').show();
        $('[data-status="active-job"]').hide();
        $('[data-status="archive-job"]').hide();
    });

    var alert_status = true;
    
    $('.panel-job-post').on('change', '.job-post-status', function(e){
        e.preventDefault();
        
        if (alert_status) {
            const job_post_id = $(this).data('id');
            const job_position = $(this).data('j');

            const status_code = $(this).val();
            const old_status = $(this).data('s');

            switch(status_code) {
                case "in": 
                    alertChangeJobPostStatus(job_post_id, job_position, "Inactive", status_code, old_status)
                    break;

                case "ac":
                    alertChangeJobPostStatus(job_post_id, job_position, "Active", status_code, old_status)
                    break;

                case "ar": 
                    alertChangeJobPostStatus(job_post_id, job_position, "Archived", status_code, old_status)
                    break;
            }
        } else {
            alert_status = true;
        }
    });


    const alertChangeJobPostStatus = (job_post_id, job_position, status, status_code, old_status) => {
        return (
            swal({
                title: "Are you sure to set " + job_position + " <b> " + status + " </b>?",
                type: "warning",
                html: true,
                showCancelButton: true,
                confirmButtonColor: "#EF5350",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: true,
                showLoaderOnConfirm: true,
            }, function(isConfirm){
                if(isConfirm) {
                    $.ajax({
                        type: "post",
                        url: "/update-job-post-status",
                        data: {"_token": $('meta[name="csrf-token"]').attr('content'), 
                                "job_post_id": job_post_id, 
                                "status": status_code},
                        success: function(resp) {
                            if(resp) {
                                
                                setTimeout(function(){
                                    swal({
                                        title: "Success!",
                                        text: "Job post status has been updated",
                                        showConfirmButton: false,
                                        type: "success",
                                        timer: 2000
                                    });
                                }, 3000);

                                $("#status-select-" + job_post_id).attr('data-s', status_code);
                                $("#status-select-" + job_post_id).data('s', status_code);

                                let old_status_color = new_status_color = "";
                                let status_text = '<i class="icon-primitive-dot position-left"></i> Status: ';
                                switch(old_status) {
                                    case "in":
                                        old_status_color = "ic-grey";
                                        break;

                                    case "ac":
                                        old_status_color = "ic-light-blue";
                                        break;
                                }
                                switch(status_code) {
                                    case "in": 
                                        new_status_color = "ic-grey";
                                        status_text += "Inactive";
                                        break;

                                    case "ac":
                                        new_status_color = "ic-light-blue";
                                        status_text += "Active";
                                        break;
                                }
                                $('#job-post-status-' + job_post_id).removeClass(old_status_color);
                                $('#job-post-status-' + job_post_id).addClass(new_status_color);
                                $('#job-post-status-' + job_post_id).html(status_text);
                                
                                $('#panel-status-' + job_post_id).removeClass(old_status_color);
                                $('#panel-status-' + job_post_id).addClass(new_status_color);
                                
                                $(".panel-job-post").each(function()
                                {
                                    if($(this).data('j') == job_post_id && status_code == "in")
                                    {
                                        $(this).attr('data-status', 'inactive-job');
                                    }
                                    else if($(this).data('j') == job_post_id && status_code == "ac")
                                    {
                                        $(this).attr('data-status','active-job')   
                                    }
                                });
                            
                            } else {
                                swal({
                                    title: "Failed!",
                                    showConfirmButton: false,
                                    type: "error",
                                    timer: 2000
                                });
                                alert_status = false;
                                $("#status-select-" + job_post_id).val(old_status).trigger('change');
                            }
                        }
                    });
                } else {
                    alert_status = false;
                    $("#status-select-" + job_post_id).val(old_status).trigger('change');
                    return;
                }
            })
        );
    }

    const countTotalJob = (search) => {
        let total_job_post = 0;

        switch (search) {
            case "all": 
                total_job_post = $('.panel-job-post').length;
                break;
            case "filter":
                total_job_post = $('.panel-job-post[style="display: block;"]').length;
                break;
        }

                                        
        if (total_job_post > 1) {
            total_job_post += " Jobs";
        } else {
            total_job_post += " Job";
        }
        $('#total-job-post').text(total_job_post);
    }

    // Delete job post dialog
    $('.panel-job-post').on('click', ".delete-job-post", function() {

        const job_post = $(this).data('jp');
        const job_post_id = $(this).data('j');

        swal({
                title: "Are you sure ?",
                text: "You will delete <b>" + job_post + "</b>",
                type: "warning",
                html: true,
                showCancelButton: true,
                confirmButtonColor: "#EF5350",
                confirmButtonText: "Delete",
                showLoaderOnConfirm: true,
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: true
        },
        function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    type: "post",
                    url: "/delete-job-post",
                    data: {"_token": $('meta[name="csrf-token"]').attr('content'),
                            "job_post_id" : job_post_id},
                    success: function(msg) {

                        setTimeout(function(){
                            swal({
                                title: "Successfully delete job post!",
                                showConfirmButton: false,
                                type: "success",
                                timer: 1500
                            });

                            $('.panel-job-post[data-j="'+job_post_id+'"]').fadeOut(
                                300, function(){
                                    $('.panel-job-post[data-j="'+job_post_id+'"]').remove();

                                    countTotalJob("all");
                                }
                            );
                        }, 3000);
                    },
                    error: function(msg) {
                        swal({
                            title: "Failed to delete job post!",
                            showConfirmButton: false,
                            type: "error",
                            timer: 1500
                        });
                    }
                });
            }
        });
    });
});
