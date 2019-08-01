$(document).ready(function(e){
    const student_id = $("#student-id").val();
    const dataSent = "student_id="+student_id;

    $.ajax({
        method: 'POST',
        url: 'http://test-api-nusatalent.us-east-2.elasticbeanstalk.com/api/student/select/profile.php',
        data: dataSent,
        beforeSend: function(){
        },
        success: function(html){
            const result         = $.parseJSON(html);

            const profile        = result.profile;
            const educations     = result.education;
            const works          = result.work;
            const organizations  = result.organization;
            const projects       = result.project;
            const certificates   = result.certificate;
            const languages      = result.language;
            const skills         = result.skill;
            
            if (!profile.error) {
                const body = `
                    <div class="row">
                        <div class="col-lg-4 col-sm-3 col-sm-offset-0 col-xs-6 col-xs-offset-3 text-center">
                            ${
                                (() => {
                                    if(profile.result.photo == "") {
                                        return `<i class="material-icons font-rem-12 text-color-blue-nusatalent profile-picture-border padding-3">face</i>`;
                                    } else {
                                        return `<img src="https://s3.us-east-2.amazonaws.com/nusatalent-userfiles-mobilehub-1695658767/students/profile_picture/${profile.result.photo}" class="profile-picture-border padding-10" />`;
                                    }
                                })()
                            }
                        </div>

                        <div class="col-lg-8 col-sm-9 col-xs-12">
                            <p class="full-name">${profile.result.first_name} ${profile.result.last_name}</p>

                            <div class="row">
                                <div class="col-lg-2 col-sm-1 col-xs-2 text-center">
                                    <i class="material-icons basic-info-icon">email</i>
                                </div>
                                <div class="col-lg-10 col-sm-11 col-xs-10">
                                    <p class="basic-info-name">Email</p>
                                    <p>${profile.result.email}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2 col-sm-1 col-xs-2 text-center">
                                    <i class="material-icons basic-info-icon">phone</i>
                                </div>
                                <div class="col-lg-10 col-sm-11 col-xs-10">
                                    <p class="basic-info-name">No. Handphone</p>
                                    <p>${profile.result.phone_num}</p>
                                </div>
                            </div>

                            ${
                                (() => {
                                    if (profile.result.address == "") {
                                        return ``;
                                    } else {
                                        return `
                                            <div class="row">
                                                <div class="col-lg-2 col-sm-1 col-xs-2 text-center">
                                                    <i class="material-icons basic-info-icon">location_on</i>
                                                </div>
                                                <div class="col-lg-10 col-sm-11 col-xs-10">
                                                    <p class="basic-info-name">Alamat</p>
                                                    <p>${profile.result.address}</p>
                                                </div>
                                            </div>`;
                                    }
                                })()
                            }
                        </div>
                    </div>`;

                
                $("#profile-section").html(
                    body
                );
            }

            
            if (!educations.error && educations.result.length > 0) {
                const head = `
                    <div class="row row-section">
                        <div class="col-lg-1 col-sm-1 col-xs-2">
                            <i class="material-icons section-icon">school</i>
                        </div>

                        <div class="col-lg-11 col-xs-10 section-title-container">
                            <span class="section-title">
                                Pendidikan
                            </span>
                        </div>
                    </div>`;
                    
                let counter = 0;
                let body = "";
                educations.result.map(section => {
                    counter++;
                    let { field_of_study } = section;
                    let { start_date } = section;
                    let { end_date } = section;
                    let { degree } = section;
                    let { name } = section;
                    let { show_score } = section;
                    let { score } = section;
                    let { description } = section;

                    body += `
                        ${ 
                            (() => {
                                if(counter == 1) {
                                    return `<div class="row first-form-margin-top">`;
                                } else {
                                    return `<div class="row form-margin-top">`;
                                }
                            })()
                        }
                            <div class="col-lg-1 col-sm-1 col-xs-2 text-align-bullet">
                                <i class="material-icons section-bullet">panorama_fish_eye</i>
                            </div>

                            <div class="col-lg-11 col-xs-10">
                                <p class="no-margin">
                                    <span class="font-size-16 text-bold">${field_of_study} / </span>
                                    <span class="font-size-14 text-medium">${start_date} - ${end_date}</span>
                                </p>
                                <p class="no-margin">
                                    <span class="text-medium">${degree}</span>
                                    <em>di ${name}</em>
                                    ${ 
                                        (() => {
                                            if(show_score == 1) {
                                                return `<span class="text-medium">/ </span>
                                                        <span class="text-bold">IPK ${score}</span>`;
                                            }
                                        })()
                                    }
                                </p>
                                
                                ${ 
                                    (() => {
                                        if(description == '' || description == '-') {
                                            return ``;
                                        } else {
                                            return `<p class="no-margin text-color-grey-300">${description}</p>`;
                                        }
                                    })()
                                }
                            </div>
                        </div>`;
                });

                
                $("#education-section").html(
                    head + body
                );
            }
            

            if (!works.error && works.result.length > 0) {
                const head = `
                    <div class="row row-section">
                        <div class="col-lg-1 col-sm-1 col-xs-2">
                            <i class="material-icons section-icon">work</i>
                        </div>

                        <div class="col-lg-11 col-xs-10 section-title-container">
                            <span class="section-title">
                                Pengalaman Kerja
                            </span>
                        </div>
                    </div>`;
                    
                let counter = 0;
                let body = "";
                works.result.map(section => {
                    counter++;
                    let { job_func_desc } = section;
                    let { start_date_month } = section;
                    let { start_date_year } = section;
                    let { end_date_month } = section;
                    let { end_date_year } = section;
                    let { current_work } = section
                    let { employment_desc } = section;
                    let { name } = section;
                    let { description } = section;

                    body += `
                        ${ 
                            (() => {
                                if(counter == 1) {
                                    return `<div class="row first-form-margin-top">`;
                                } else {
                                    return `<div class="row form-margin-top">`;
                                }
                            })()
                        }
                            <div class="col-lg-1 col-sm-1 col-xs-2 text-align-bullet">
                                <i class="material-icons section-bullet">panorama_fish_eye</i>
                            </div>

                            <div class="col-lg-11 col-xs-10">
                                <p class="no-margin">
                                    <span class="font-size-16 text-bold">${job_func_desc} / </span>
                                
                                    ${ 
                                        (() => {
                                            if(current_work == '0') {
                                                return `<span class="font-size-14 text-medium">${start_date_month} ${start_date_year} - Sekarang</span>`;
                                            } else {
                                                return `<span class="font-size-14 text-medium">${start_date_month} ${start_date_year} - ${end_date_month} ${end_date_year}</span>`;
                                            }
                                        })()
                                    }
                                </p>
                                <p class="no-margin">
                                    <span class="text-medium">${employment_desc}</span>
                                    <em>di ${name}</em>
                                </p>
                                
                                ${ 
                                    (() => {
                                        if(description == '' || description == '-') {
                                            return ``;
                                        } else {
                                            return `<p class="no-margin text-color-grey-300">${description}</p>`;
                                        }
                                    })()
                                }
                            </div>
                        </div>`;
                });

                
                $("#work-section").html(
                    head + body
                );
            }
            

            if (!organizations.error && organizations.result.length > 0) {
                const head = `
                    <div class="row row-section">
                        <div class="col-lg-1 col-sm-1 col-xs-2">
                            <i class="material-icons section-icon">group</i>
                        </div>

                        <div class="col-lg-11 col-sm-11 col-xs-10 section-title-container">
                            <span class="section-title">
                                Organisasi
                            </span>
                        </div>
                    </div>`;
                    
                let counter = 0;
                let body = "";
                organizations.result.map(section => {
                    counter++;
                    let { name } = section;
                    let { start_date_month } = section;
                    let { start_date_year } = section;
                    let { end_date_month } = section;
                    let { end_date_year } = section;
                    let { current_org } = section; 
                    let { job_title } = section;
                    let { description } = section;

                    body += `
                        ${ 
                            (() => {
                                if(counter == 1) {
                                    return `<div class="row first-form-margin-top">`;
                                } else {
                                    return `<div class="row form-margin-top">`;
                                }
                            })()
                        }
                            <div class="col-lg-1 col-sm-1 col-xs-2 text-align-bullet">
                                <i class="material-icons section-bullet">panorama_fish_eye</i>
                            </div>

                            <div class="col-lg-11 col-xs-10">
                                <p class="no-margin">
                                    <span class="font-size-16 text-bold">${name} / </span>
                                
                                    ${ 
                                        (() => {
                                            if(current_org == '0') {
                                                return `<span class="font-size-14 text-medium">${start_date_month} ${start_date_year} - Sekarang</span>`;
                                            } else {
                                                return `<span class="font-size-14 text-medium">${start_date_month} ${start_date_year} - ${end_date_month} ${end_date_year}</span>`;
                                            }
                                        })()
                                    }
                                </p>
                                <p class="no-margin">
                                    <span class="text-medium">${job_title}</span>
                                </p>
                                
                                ${ 
                                    (() => {
                                        if(description == '' || description == '-') {
                                            return ``;
                                        } else {
                                            return `<p class="no-margin text-color-grey-300">${description}</p>`;
                                        }
                                    })()
                                }
                            </div>
                        </div>`;
                });

                
                $("#organization-section").html(
                    head + body
                );
            }
            

            if (!projects.error && projects.result.length > 0) {
                const head = `
                    <div class="row row-section">
                        <div class="col-lg-1 col-sm-1 col-xs-2">
                            <i class="material-icons section-icon">business_center</i>
                        </div>

                        <div class="col-lg-11 col-sm-11 col-xs-10 section-title-container">
                            <span class="section-title">
                                Project
                            </span>
                        </div>
                    </div>`;
                    
                let counter = 0;
                let body = "";
                projects.result.map(section => {
                    counter++;
                    let { name } = section;
                    let { start_date_month } = section;
                    let { start_date_year } = section;
                    let { end_date_month } = section;
                    let { end_date_year } = section;
                    let { current_prj } = section;
                    let { job_title } = section;
                    let { description } = section;

                    body += `
                        ${ 
                            (() => {
                                if(counter == 1) {
                                    return `<div class="row first-form-margin-top">`;
                                } else {
                                    return `<div class="row form-margin-top">`;
                                }
                            })()
                        }
                            <div class="col-lg-1 col-sm-1 col-xs-2 text-align-bullet">
                                <i class="material-icons section-bullet">panorama_fish_eye</i>
                            </div>

                            <div class="col-lg-11 col-xs-10">
                                <p class="no-margin">
                                    <span class="font-size-16 text-bold">${name} / </span>
                                
                                    ${ 
                                        (() => {
                                            if(current_prj == '0') {
                                                return `<span class="font-size-14 text-medium">${start_date_month} ${start_date_year} - Sekarang</span>`;
                                            } else {
                                                return `<span class="font-size-14 text-medium">${start_date_month} ${start_date_year} - ${end_date_month} ${end_date_year}</span>`;
                                            }
                                        })()
                                    }
                                </p>
                                <p class="no-margin">
                                    <span class="text-medium">${job_title}</span>
                                </p>
                                
                                ${ 
                                    (() => {
                                        if(description == '' || description == '-') {
                                            return ``;
                                        } else {
                                            return `<p class="no-margin text-color-grey-300">${description}</p>`;
                                        }
                                    })()
                                }
                            </div>
                        </div>`;
                });

                
                $("#project-section").html(
                    head + body
                );
            }
            

            if (!certificates.error && certificates.result.length > 0) {
                const head = `
                    <div class="row row-section">
                        <div class="col-lg-1 col-sm-1 col-xs-2">
                            <i class="material-icons section-icon">stars</i>
                        </div>

                        <div class="col-lg-11 col-xs-10 section-title-container">
                            <span class="section-title">
                                Sertifikasi dan Penghargaan
                            </span>
                        </div>
                    </div>`;
                    
                let counter = 0;
                let body = "";
                certificates.result.map(section => {
                    counter++;
                    let { title } = section;
                    let { issued_date } = section;
                    let { issued_by } = section;
                    let { description } = section;

                    body += `
                        ${ 
                            (() => {
                                if(counter == 1) {
                                    return `<div class="row first-form-margin-top">`;
                                } else {
                                    return `<div class="row form-margin-top">`;
                                }
                            })()
                        }
                            <div class="col-lg-1 col-sm-1 col-xs-2 text-align-bullet">
                                <i class="material-icons section-bullet">panorama_fish_eye</i>
                            </div>

                            <div class="col-lg-11 col-xs-10">
                                <p class="no-margin">
                                    <span class="font-size-16 text-bold">${title} / </span>
                                    <span class="font-size-14 text-medium">${issued_date}</span>
                                </p>
                                <p class="no-margin">
                                    <span class="text-medium">Diberikan oleh ${issued_by}</span>
                                </p>
                                
                                ${ 
                                    (() => {
                                        if(description == '' || description == '-') {
                                            return ``;
                                        } else {
                                            return `<p class="no-margin text-color-grey-300">${description}</p>`;
                                        }
                                    })()
                                }
                            </div>
                        </div>`;
                });

                
                $("#certificate-section").html(
                    head + body
                );
            }
            

            if (!languages.error && languages.result.length > 0) {
                const head = `
                    <div class="row row-section">
                        <div class="col-lg-1 col-sm-1 col-xs-2">
                            <i class="material-icons section-icon">translate</i>
                        </div>

                        <div class="col-lg-11 col-xs-10 section-title-container">
                            <span class="section-title">Bahasa</span>
                        </div>
                    </div>`;
                    
                let counter = 0;
                let body = "";
                languages.result.forEach(section => {
                    counter++;
                    let { language } = section;
                    let { proficiency } = section;

                    body += `
                        ${ 
                            (() => {
                                if(counter == 1) {
                                    return `<div class="row first-form-margin-top">`;
                                } else {
                                    return `<div class="row form-margin-top">`;
                                }
                            })()
                        }
                            <div class="col-lg-1 col-sm-1 col-xs-2 text-align-bullet">
                                <i class="material-icons section-bullet">panorama_fish_eye</i>
                            </div>

                            <div class="col-lg-11 col-xs-10">
                                <p class="no-margin font-size-16 text-bold">${language}</p>
                                <p class="no-margin text-color-grey-300">${proficiency}</p>
                            </div>
                        </div>`;
                });

                
                $("#language-section").html(
                    head + body
                );
            }
            

            if (!skills.error && skills.result.length > 0) {
                const head = `
                    <div class="row row-section">
                        <div class="col-lg-1 col-sm-1 col-xs-2">
                            <i class="material-icons section-icon">list</i>
                        </div>

                        <div class="col-lg-11 col-xs-10 section-title-container">
                            <span class="section-title">Skill</span>
                        </div>
                    </div>`;
                    
                let counter = 0;
                let body = "";
                skills.result.map(section => {
                    counter++;
                    let { skill } = section;

                    body += `
                        ${ 
                            (() => {
                                if(counter == 1) {
                                    return `<div class="row first-form-margin-top">`;
                                } else {
                                    return `<div class="row">`;
                                }
                            })()
                        }
                            <div class="col-lg-1 col-sm-1 col-xs-2 text-align-bullet">
                                <i class="material-icons section-bullet">panorama_fish_eye</i>
                            </div>

                            <div class="col-lg-11 col-xs-10">
                                <p class="no-margin font-size-16 text-bold">${skill}</p>
                            </div>
                        </div>`;
                });

                
                $("#skill-section").html(
                    head + body
                );
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log(xhr + "###" + textStatus + "###" + errorThrown);
        }
    });
})