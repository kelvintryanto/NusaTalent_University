function delay(callback, ms) {
    var timer = 0;
    return function () {
        var context = this, args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
            callback.apply(context, args);
        }, ms || 0);
    };
}

$(function () {

    let validImage = false;
    let invalidEmail = true;

    $("#companyLogo").on("click",
        function (e) {
            $("#uploadImage").trigger("click");
        }
    );

    $("#uploadImage").on("change", function (e) {
        var allowedExtensions = ["jpg", "jpeg", "png"];

        var extension = $(this).val().substring($(this).val().lastIndexOf('.') + 1);

        if ($.inArray(extension, allowedExtensions) == -1) {
            $(this).parent().find('.invalid').text('Not allowed file extension').css('display', 'block');
            $(this).val(null);
        }
        else {
            if ($(this).get(0).files[0].size > 8388608) {
                $(this).parent().find('.invalid').text('Allowed file size exceeded. (Max 8 MB)').css('display', 'block');
                $(this).val(null);
            }
            else {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $("#companyLogo")
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL($(this).get(0).files[0]);
                $(this).parent().find('.invalid').css('display', 'none');
                validImage = true;
            }
        }
    });

    $("#btnGeneratePassword").on('click', function (e)
    {
            
        e.preventDefault();

        var password = Math.random().toString(36).substring(2, 10);

        $("#txtCompanyHRPassword").val(password);
    });

    $("#txtCompanyHREmail").on('keyup', delay(function (e) {

        var val = $(this).val();

        $.ajax({
            url: '/Company/check-email',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                email: val
            },
            success: function (resp) {
                if (resp && !invalidEmail) {
                    $("#txtCompanyEmail").removeClass("border-red");
                    $("#txtCompanyEmail").addClass("border-green");
                    $("#txtCompanyEmail").parent().find('.invalid').css('display', 'none');
                    dismissAlert();
                }
                else if (!resp && !invalidEmail) {
                    $("#txtCompanyEmail").removeClass("border-green");
                    $("#txtCompanyEmail").addClass("border-red");
                    $("#txtCompanyEmail").parent().find('.invalid').text('Email has been used, please use another email').css('display', 'block');
                    dismissAlert();
                }
            },
            error: function (textStatus) {
                console.log(textStatus);
            }
        });

    }, 3000));

    $("#btnSubmit").on("click", function (e) {
        e.preventDefault();
        let name_valid = email_valid = contact_valid = website_valid = industry_valid = image_valid =
            address_valid = desc_valid = reasons_valid = booth_valid = total_employee_valid = hr_name_valid = hr_contact_valid = hr_email_valid = hr_password_valid = location_valid = website_valid = false;

        const booth = $("#cbBooth").val();
        const totalEmployee = $("#cbTotalEmployee").val();
        const name = $('#txtCompanyName').val();
        const location = $("#txtCompanyLocation").val()
        const email = $('#txtCompanyEmail').val();
        const contact = $('#txtCompanyContact').val();
        const website = $('#txtCompanyWebsite').val();
        const industry = $('#txtCompanyIndustry').val();
        const linkedin = $('#txtCompanyLinkedln').val();
        const total_employee = $('#cbTotalEmployee option:selected').val();
        const address = $('#txtCompanyAddress').val();
        const desc = $('#txtCompanyDescription').val();
        const reasons = $('#txtCompanyReasons').val();
        const hrName = $("#txtCompanyHRName").val();
        const hrContact = $("#txtCompanyHRContact").val();
        const hrEmail = $("#txtCompanyHREmail").val();
        const hrPassword = $("#txtCompanyHRPassword").val();
        const imageFile = $("#uploadImage").val();

        if (imageFile) {
            image_valid = true;
            $("#uploadImage").parent().find('.invalid').css('display', 'none');
        } else {
            $("#uploadImage").parent().find('.invalid').text('Logo company required').css('display', 'block');
        }

        if (booth != "") {
            booth_valid = true;
            $('#cbBooth').next("span").children().children().removeClass("border-red");
            $("#cbBooth").parent().find('.invalid').css('display', 'none');
        } else {
            booth_valid = false;
            $('#cbBooth').next("span").children().children().addClass("border-red");
            $("#cbBooth").parent().find('.invalid').css('display', 'block');
        }

        if (location != "") {
            location_valid = true;
            $('#txtCompanyLocation').removeClass('border-red');
            $("#txtCompanyLocation").parent().find('.invalid').css('display', 'none');
        } else {
            location_valid = false;
            $('#txtCompanyLocation').addClass('border-red');
            $("#txtCompanyLocation").parent().find('.invalid').css('display', 'block');
        }

        if (totalEmployee != "") {
            total_employee_valid = true;
            $('#cbTotalEmployee').next("span").children().children().removeClass("border-red");
            $("#cbTotalEmployee").parent().find('.invalid').css('display', 'none');
        } else {
            total_employee_valid = false;
            $('#cbTotalEmployee').next("span").children().children().addClass("border-red");
            $("#cbTotalEmployee").parent().find('.invalid').css('display', 'block');
        }

        if (name != "" && name != undefined) {
            name_valid = true;
            $('#txtCompanyName').removeClass('border-red');
            $("#txtCompanyName").parent().find('.invalid').css('display', 'none');
        } else {
            name_valid = false;
            $('#txtCompanyName').addClass('border-red');
            $("#txtCompanyName").parent().find('.invalid').css('display', 'block');
        }

        if (email != "") {
            email_valid = true;
            $('#txtCompanyEmail').removeClass('border-red');
            $("#txtCompanyEmail").parent().find('.invalid').css('display', 'none');
        } else {
            email_valid = false;
            $('#txtCompanyEmail').addClass('border-red');
            $("#txtCompanyEmail").parent().find('.invalid').css('display', 'block');
        }

        if (contact != "") {
            contact_valid = true;
            $('#txtCompanyContact').removeClass('border-red');
            $("#txtCompanyContact").parent().find('.invalid').css('display', 'none');
        } else {
            contact_valid = false;
            $('#txtCompanyContact').addClass('border-red');
            $("#txtCompanyContact").parent().find('.invalid').css('display', 'block');
        }

        if (website != "") {
            website_valid = true;
            $('#txtCompanyWebsite').removeClass('border-red');
            $("#txtCompanyWebsite").parent().find('.invalid').css('display', 'none');
        } else {
            website_valid = false;
            $('#txtCompanyWebsite').addClass('border-red');
            $("#txtCompanyWebsite").parent().find('.invalid').css('display', 'block');
        }

        if (industry != "") {
            industry_valid = true;
            $('#txtCompanyIndustry').removeClass('border-red');
            $("#txtCompanyIndustry").parent().find('.invalid').css('display', 'none');
        } else {
            industry_valid = false;
            $('#txtCompanyIndustry').addClass('border-red');
            $("#txtCompanyIndustry").parent().find('.invalid').css('display', 'block');
        }

        if (address != "") {
            address_valid = true;
            $('#txtCompanyAddress').removeClass('border-red');
            $("#txtCompanyAddress").parent().find('.invalid').css('display', 'none');
        } else {
            address_valid = false;
            $('#txtCompanyAddress').addClass('border-red');
            $("#txtCompanyAddress").parent().find('.invalid').css('display', 'block');
        }

        if (desc != "") {
            desc_valid = true;
            $('#txtCompanyDescription').removeClass('border-red');
            $("#txtCompanyDescription").parent().find('.invalid').css('display', 'none');
        } else {
            desc_valid = false;
            $('#txtCompanyDescription').addClass('border-red');
            $("#txtCompanyDescription").parent().find('.invalid').css('display', 'block');
        }

        if (reasons != "") {
            reasons_valid = true;
            $('#txtCompanyReasons').removeClass('border-red');
            $("#txtCompanyReasons").parent().find('.invalid').css('display', 'none');
        } else {
            reasons_valid = false;
            $('#txtCompanyReasons').addClass('border-red');
            $("#txtCompanyReasons").parent().find('.invalid').css('display', 'block');
        }

        if (hrName != "") {
            hr_name_valid = true;
            $('#txtCompanyHRName').removeClass('border-red');
            $("#txtCompanyHRName").parent().find('.invalid').css('display', 'none');
        } else {
            hr_name_valid = false;
            $('#txtCompanyHRName').addClass('border-red');
            $("#txtCompanyHRName").parent().find('.invalid').css('display', 'block');
        }

        if (hrContact != "") {
            hr_contact_valid = true;
            $('#txtCompanyHRContact').removeClass('border-red');
            $("#txtCompanyHRContact").parent().find('.invalid').css('display', 'none');
        } else {
            hr_contact_valid = false;
            $('#txtCompanyHRContact').addClass('border-red');
            $("#txtCompanyHRContact").parent().find('.invalid').css('display', 'block');
        }

        if (hrEmail != "") {
            hr_email_valid = true;
            $('#txtCompanyHREmail').removeClass('border-red');
            $("#txtCompanyHREmail").parent().find('.invalid').css('display', 'none');
        } else {
            hr_email_valid = false;
            $('#txtCompanyHREmail').addClass('border-red');
            $("#txtCompanyHREmail").parent().find('.invalid').css('display', 'block');
        }

        if (hrPassword != "") {
            hr_password_valid = true;
            $('#txtCompanyHRPassword').removeClass('border-red');
        } else {
            hr_password_valid = false;
            $('#txtCompanyHRPassword').addClass('border-red');
        }

        if (name_valid && email_valid && contact_valid && website_valid && industry_valid &&
            address_valid && desc_valid && reasons_valid && booth_valid && total_employee_valid && validImage && hr_name_valid && hr_password_valid && hr_email_valid && hr_contact_valid) {
            $("#txtCompanyHRPassword").prop("disabled", false);
            swal(
                {
                    title: "Are you sure to add <br><b class='bold-red'>" + name + "</b> ? ",
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
                    $.ajax({
                        method: "POST",
                        url: "/Company/add-company",
                        data: new FormData($("#add-company-form")[0]),
                        dataType: "json",
                        processData: false,
                        contentType: false,
                        success: function (resp) {
                            console.log(resp);
                            if (resp) {
                                $("#txtCompanyHRPassword").prop("disabled", true);

                                swal({
                                    title: "Successfully Add Company!",
                                    text: "Please save information below: <br> <b> Email: " + hrEmail + " </b> <br> <b> Password: " + hrPassword + "<b/>",
                                    html: true,
                                    confirmButtonColor: "#FF0000",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: false,
                                    closeOnCancel: false,
                                    type: "success"
                                },
                                    function (isConfirm) {
                                        if (isConfirm)
                                            window.location.reload();
                                    }
                                );
                            }
                            else {
                                setTimeout(function () {
                                    swal({
                                        title: "Failed to add company partnership!",
                                        type: "error",
                                        confirmButtonColor: "#EF5350",
                                        timer: 2000
                                    });
                                }, 2000);
                            }
                        },
                        error: function (textStatus) {
                            console.log(textStatus.responseText);
                            setTimeout(function () {
                                swal({
                                    title: "Whoops, Something happened!",
                                    type: "error",
                                    title: "Error !",
                                    confirmButtonColor: "#EF5350",
                                    timer: 2000
                                });
                            }, 2000);
                        }
                    });
                }
            );
        }
    });
});
