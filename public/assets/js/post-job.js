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

    $(".txtSalaryMin").mask('0.000.000.000', {
        reverse: true
    });

    $(".txtSalaryMax").mask('0.000.000.000', {
        reverse: true
    });

    $("#cbCompanyPartnership").on("change", function(e)
    {
        if($(this).val() != ""){
            $("#txtCompanyID").val($(this).val());
            $("#create-job-post-form").fadeIn("slow");
        }
        else{
            $("#txtCompanyID").val("");
            $("#create-job-post-form").fadeOut("slow");
        }
    });
    
    $('#circle').circleProgress({       
        value: 0.8,         
        size: 75, //in px           
        fill: {             
            color: "#7FC4E2"            
        },          
        emptyFill: "#fff"       
    });

    $("#txtJobDesc").on("keydown", function(e) {
        if(e.which == 13) {
            e.preventDefault();
            insertToList($(this), "list_job_desc", $("#job_description"));
        }
    });

    $("#txtJobReq").on("keydown", function(e) {
        if(e.which == 13) {
            e.preventDefault();
            insertToList($(this), "list_job_req", $("#job_requirement"));
        }
    });

    $("#txtEmployeeBenefit").on("keydown", function(e) {
        if(e.which == 13) {
            e.preventDefault();
            insertToList($(this), "list_benefits", $("#employee_benefit"));
        }
    });

    $("#txtSpecialSkill").on("keydown", function(e) {
        if(e.which == 13) {
            e.preventDefault();
            insertToList($(this), "list_skills", $("#special_skill"));
        }
    });

    
    $("#list_job_desc").on("click", ".delete-list", function(){
        deleteList($(this), "list_job_desc",  $("#job_description"));
    });
    
    $("#list_job_req").on("click", ".delete-list", function(){
        deleteList($(this), "list_job_req",  $("#job_requirement"));
    });
    
    $("#list_benefits").on("click", ".delete-list", function(){
        deleteList($(this), "list_benefits",  $("#employee_benefit"));
    });
    
    $("#list_skills").on("click", ".delete-list", function(){
        deleteList($(this), "list_skills",  $("#special_skill"));
    });

    const insertToList = (dom, list_container, data_container) => {
        const value = dom.val();

        let data = data_container.val();

        if(value !== "") {
            var array = value.split("\n");

            for (var i = 0; i < array.length; i++) {

                var text = "<li class='list-group-item'><i class='icon-primitive-dot'></i> " + array[i] + "<span style='float: right;color: red;cursor: pointer;' class='delete-list'><i class='icon-cross2'></i></span></li>";
                $('#'+list_container).append(text);
                data += array[i]+";";
            }   

            data_container.val(data);
            dom.val("");

            console.log($("ul#"+list_container+" li").children().length);
            $("#"+list_container).show();
        }
    }

    const deleteList = (dom, list_container, data_container) => {
        var value = dom.parent().contents().filter(function(){
            return this.nodeType == 3;
        })[0].nodeValue;

        value = value.replace(/[^a-zA-Z]/, "");
        value = value.trim();

        let data = data_container.val();

        if(data.startsWith(";"))
            data = data.substring(1, data.length);

            data = data.replace(" ;", ";");

        if(data.indexOf(value+";") !== -1)
            data = data.replace(value+";", "");
        else
            data = data.replace(value, "");

            data_container.val(data);
        dom.parent().remove();
        
        if ($("ul#"+list_container+" li").children().length < 1) {
            $("#"+list_container).hide();
        } else {
            $("#"+list_container).show();
        }
    }

    $("#review-job-post-button").on("click", function(e){
        e.preventDefault();
        
        let job_position_valid = work_location_valid = job_category_valid = talent_needed_valid = 
            job_description_valid = job_requirement_valid = employee_benefit_valid = special_skill_valid = 
            work_hours_valid = probation_period_valid = false;
                    
        const job_position = $('input[name="job_position"]').val().trim();
        const work_location = $('input[name="work_location"]').val().trim();
        const job_category = $('select[name="job_category"] option:selected').val().trim();
        const talent_needed = $('input[name="talent_needed"]').val().trim();
        const job_description = $('input[name="job_description"]').val().trim();
        const job_requirement = $('input[name="job_requirement"]').val().trim();
        const employee_benefit = $('input[name="employee_benefit"]').val().trim();
        const special_skill = $('input[name="special_skill"]').val().trim();
        const career_path = $('input[name="career_path"]').val();
        const work_hours = $('input[name="work_hours"]').val().trim();
        const probation_period = $('input[name="probation_period"]').val().trim();
        const salary_min = $('input[name="salary_min"]').val();
        const salary_max = $('input[name="salary_max"]').val();
        const job_post_ends = $('input[name="job_post_ends"]').val();
        
        if (job_position != "") {
            job_position_valid = true;
            $('input[name="job_position"]').parent().find('.invalid').css('display', 'none');
            $('input[name="job_position"]').removeClass('border-red');
        } else {
            job_position_valid = false;
            $('input[name="job_position"]').parent().find('.invalid').css('display', 'block');
            $('input[name="job_position"]').addClass('border-red');
        }

        if (work_location != "") {
            work_location_valid = true;
            $('input[name="work_location"]').parent().find('.invalid').css('display', 'none');
            $('input[name="work_location"]').removeClass('border-red');
        } else {
            work_location_valid = false;
            $('input[name="work_location"]').parent().find('.invalid').css('display', 'block');
            $('input[name="work_location"]').addClass('border-red');
        }

        if (job_category != "") {
            job_category_valid = true;
            $('select[name="job_category"]').parent().find('.invalid').css('display', 'none');
            $('select[name="job_category"]').next('span').children().children().removeClass('border-red');
            $('select[name="job_category"]').next('span').children().children().children().next('span').removeClass('text-danger');
        } else {
            job_category_valid = false;
            $('select[name="job_category"]').parent().find('.invalid').css('display', 'block');
            $('select[name="job_category"]').next('span').children().children().addClass('border-red');
            $('select[name="job_category"]').next('span').children().children().children().next('span').addClass('text-danger');
        }

        if (talent_needed != "") {
            talent_needed_valid = true;
            $('input[name="talent_needed"]').parent().find('.invalid').css('display', 'none');
            $('input[name="talent_needed"]').removeClass('border-red');
        } else {
            talent_needed_valid = false;
            $('input[name="talent_needed"]').parent().find('.invalid').css('display', 'block');
            $('input[name="talent_needed"]').addClass('border-red');
        }

        if (job_description != "") {
            job_description_valid = true;
            $('textarea[name="txtJobDesc"]').parent().find('.invalid').css('display', 'none');
            $('textarea[name="txtJobDesc"]').removeClass('border-red');
        } else {
            job_description_valid = false;
            $('textarea[name="txtJobDesc"]').parent().find('.invalid').css('display', 'block');
            $('textarea[name="txtJobDesc"]').addClass('border-red');
        }

        if (job_requirement != "") {
            job_requirement_valid = true;
            $('textarea[name="txtJobReq"]').removeClass('border-red');
            $('textarea[name="txtJobReq"]').parent().find('.invalid').css('display', 'none');
        } else {
            job_requirement_valid = false;
            $('textarea[name="txtJobReq"]').parent().find('.invalid').css('display', 'block');
            $('textarea[name="txtJobReq"]').addClass('border-red');
        }

        if (employee_benefit != "") {
            employee_benefit_valid = true;
            $('textarea[name="txtEmployeeBenefit"]').removeClass('border-red');
            $('textarea[name="txtEmployeeBenefit"]').parent().find('.invalid').css('display', 'none');
        } else {
            employee_benefit_valid = false;
            $('textarea[name="txtEmployeeBenefit"]').parent().find('.invalid').css('display', 'block');
            $('textarea[name="txtEmployeeBenefit"]').addClass('border-red');
        }

        if (special_skill != "") {
            special_skill_valid = true;
            $('textarea[name="txtSpecialSkill"]').parent().find('.invalid').css('display', 'none');
            $('textarea[name="txtSpecialSkill"]').removeClass('border-red');
        } else {
            special_skill_valid = false;
            $('textarea[name="txtSpecialSkill"]').parent().find('.invalid').css('display', 'block');
            $('textarea[name="txtSpecialSkill"]').addClass('border-red');
        }

        if (work_hours != "") {
            work_hours_valid = true;
            $('input[name="work_hours"]').parent().find('.invalid').css('display', 'none');
            $('input[name="work_hours"]').removeClass('border-red');
        } else {
            work_hours_valid = false;
            $('input[name="work_hours"]').parent().find('.invalid').css('display', 'block');
            $('input[name="work_hours"]').addClass('border-red');
        }

        if (probation_period != "") {
            probation_period_valid = true;
            $('input[name="probation_period"]').removeClass('border-red');
            $('input[name="probation_period"]').parent().find('.invalid').css('display', 'none');
        } else {
            probation_period_valid = false;
            $('input[name="probation_period"]').parent().find('.invalid').css('display', 'block');
            $('input[name="probation_period"]').addClass('border-red');
        }

        if (job_position_valid && work_location_valid && job_category_valid && talent_needed_valid && 
            job_description_valid && job_requirement_valid && employee_benefit_valid && special_skill_valid && work_hours_valid) 
        {

            $('#review_job_post_modal').modal('show');
        }
    });

    $('#submit-job-post-button').on('click', function(e) {
        const alert = `
            <div class="row" id="alert-dialog">
                <div class="col-lg-12"> 
                    <div class="alert alert-success alert-bordered">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                        Successfully post a job!
                    </div>
                </div>
            </div>`;
        
        const panel_body = $(this).parent().parent();
        const light_2 = $(this).parent();
        $(this).addClass('disabled');

        $(panel_body).block({
            overlayCSS: {
                backgroundColor: '#fff',
                opacity: 0.8,
                cursor: 'wait'
            },
            css: {
                border: 0,
                padding: 0,
                backgroundColor: 'none'
            }
        });

        $(light_2).block({
            message: '<i class="icon-spinner2 spinner" style="font-size: 2rem;"></i>',
            overlayCSS: {
                backgroundColor: '#fff',
                opacity: 0.8,
                cursor: 'wait'
            },
            css: {
                border: 0,
                padding: 0,
                backgroundColor: 'none'
            }
        });

        const job_position = $('input[name="job_position"]').val().trim();
        const work_location = $('input[name="work_location"]').val().trim();
        const job_category = $('select[name="job_category"] option:selected').val().trim();
        const talent_needed = $('input[name="talent_needed"]').val().trim();
        const job_description = $('input[name="job_description"]').val().trim();
        const job_requirement = $('input[name="job_requirement"]').val().trim();
        const employee_benefit = $('input[name="employee_benefit"]').val().trim();
        const special_skill = $('input[name="special_skill"]').val().trim();
        const career_path = $('input[name="career_path"]').val();
        const work_hours = $('input[name="work_hours"]').val().trim();
        const probation_period = $('input[name="probation_period"]').val().trim();
        const salary_min = $('input[name="salary_min"]').val();
        const salary_max = $('input[name="salary_max"]').val();
        const job_post_ends = $('input[name="job_post_ends"]').val();
        const txtCompanyID = $("#txtCompanyID").val().trim();
        const data = "_token: {{csrf_token()}}&job_position="+job_position + "&work_location="+work_location + "&job_category="+job_category +  "&talent_needed="+talent_needed + "&job_description="+job_description + "&job_requirement="+job_requirement + "&employee_benefit="+employee_benefit + "&special_skill="+special_skill + "&career_path="+career_path + "&work_hours="+work_hours + "&probation_period="+probation_period + "&salary_min="+salary_min + "&salary_max="+salary_max + "&job_post_ends="+job_post_ends;
            
        $.ajax({
            type: "post",
            url: '/JobPost/create-job-post',
            data: {"_token": $('meta[name="csrf-token"]').attr('content'), 
                    "job_position" : job_position,
                    "work_location": work_location,
                    "job_category" : job_category,
                    "talent_needed" : talent_needed,
                    "job_description": job_description,
                    "job_requirement" : job_requirement, 
                    "employee_benefit" : employee_benefit,
                    "special_skill" : special_skill,
                    "career_path" : career_path,
                    "work_hours" : work_hours,
                    "probation_period" : probation_period,
                    "salary_min" : salary_min,
                    "salary_max" : salary_max,
                    "job_post_ends" : job_post_ends,
                    "txtCompanyID" : txtCompanyID},
            success: function(msg) {
                $('#submit-job-post-button').removeClass('disabled');
                $(panel_body).unblock();
                $(light_2).unblock();
                $('#review_job_post_modal').modal('hide');

                $('#create-job-post-form').append(alert);

                setTimeout(() => {
                    $('#alert-dialog').remove();
                    location.reload();
                }, 5000);
            },
            error: function(msg) {
                $(this).removeClass('disabled');
                console.log(msg)
            }
        });
    });

    $('#review_job_post_modal').on('show.bs.modal', function (e) {
        let job_desc = job_req = benefit = skill = "";

        const job_position = $('input[name="job_position"]').val().trim();
        const work_location = $('input[name="work_location"]').val().trim();
        const job_category = $('select[name="job_category"] option:selected').text().trim();
        const talent_needed = $('input[name="talent_needed"]').val().trim();
        const job_description = $('input[name="job_description"]').val().trim();
        const job_requirement = $('input[name="job_requirement"]').val().trim();
        const employee_benefit = $('input[name="employee_benefit"]').val().trim();
        const special_skill = $('input[name="special_skill"]').val().trim();
        const career_path = $('input[name="career_path"]').val();
        const work_hours = $('input[name="work_hours"]').val().trim();
        const probation_period = $('input[name="probation_period"]').val().trim();
        const salary_min = $('input[name="salary_min"]').val();
        const salary_max = $('input[name="salary_max"]').val();
        const job_post_ends = $('input[name="job_post_ends"]').val();

        const salary = "Rp"+salary_min + " - " + "Rp"+salary_max;
        const list_skills = $('#list_skills').html();

        const job_desc_array = job_description.split(";");
        const job_req_array = job_requirement.split(";");
        const benefit_array = employee_benefit.split(";");
        const skill_array = special_skill.split(";");
        

        for (var i = 0; i < job_desc_array.length; i++) {
            if (job_desc_array[i] != "")
                job_desc += '<li class="list-group-item"><i class="icon-primitive-dot" style="font-size:12px;"></i>' + job_desc_array[i] + '</li>';
        }
        for (var i = 0; i < job_req_array.length; i++) {
            if (job_req_array[i] != "")
                job_req += '<li class="list-group-item"><i class="icon-primitive-dot" style="font-size:12px;"></i>' + job_req_array[i] + '</li>';
        }
        for (var i = 0; i < benefit_array.length; i++) {
            if (benefit_array[i] != "")
                benefit += '<li class="list-group-item"><i class="icon-primitive-dot" style="font-size:12px;"></i>' + benefit_array[i] + '</li>';
        }
        for (var i = 0; i < skill_array.length; i++) {
            if (skill_array[i] != "")
                skill += '<li class="list-group-item"><i class="icon-primitive-dot" style="font-size:12px;"></i>' + skill_array[i] + '</li>';
        }


        // var m_names = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

        // var d = new Date(job_post_ends);
        // var date = d.getDate();
        // var month = d.getMonth();
        // var year = d.getFullYear();

        // const ends_in = date + "-" + m_names[month] + "-" + year;


        $('#modal_review_job_position').text(job_position);
        $('#modal_review_work_location').text(work_location);
        $('#modal_review_job_category').text(job_category);
        $('#modal_review_talent_needed').text(talent_needed + " talents");
        $('#modal_review_list_job_desc').html(job_desc);
        $('#modal_review_list_job_req').html(job_req);
        $('#modal_review_list_benefits').html(benefit);
        $('#modal_review_list_skils').html(skill);
        $('#modal_review_career_path').text(career_path);
        $('#modal_review_work_hour').text(work_hours);
        $('#modal_review_probation').text(probation_period);
        $('#modal_review_salary').text(salary);
        $('#modal_review_ends_in').text(job_post_ends);
    });
});
