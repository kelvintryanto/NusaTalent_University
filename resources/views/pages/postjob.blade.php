@extends('layouts.postjobtemplate')
@section('content')

<div class="page-container" style="background-color: white;">
    <div class="panel-content">
        <div class="content">      
            <div class="row row-postjob">
                <!-- Navbar -->
                <div class="nav-home">
                    <div class="nav-menu7 text2 content-nonactive">Dashboard</div>
                    <div class="nav-menu8 text2 content-active" >Job</div>
                    <div class="nav-menu9 text2 content-nonactive">Student</div>
                    <div class="nav-menu9 text2 content-nonactive">Company</div>
                    <div class="nav-menu9 text2 content-nonactive">Event</div>
                    <div class="nav-menu10 text2">
                        <div class="dropdown dropdown-username">
                            <a href="#" class="text1 dropdown-toggle" data-toggle="dropdown" style="margin-top: 10px;"><img src="http://placehold.it/18x18" class="profile-image img-circle"> Username <span class="glyphicon glyphicon-chevron-down glyphicon-c" aria-hidden="true"></span></a>
                            <ul class="dropdown-menu">
                            <a class=" text3 margintitledropdown">Username</a>
                            <a class=" text4 margintitledropdown">hr@zengroup.co.id</a>
                            <a class=" text4 margintitledropdown">Human Resource</a>
                            <br> <br>
                            <a class=" text4 margintitledropdown">Monthly until 03/05/19</a>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                            <a class="text4" href="#"><i class="far fa-building fa-lg" style="margin-right: 10px;"></i>Company</a>
                                <ul class="dropdown-menu dropdown-b">
                                    <li><a class="text4" href="#">Third level</a></li>
                                    <li><a class="text4" href="#">Third level</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                            <a class="text4" href="#"><i class="fas fa-cog fa-lg" style="margin-right: 10px;"></i>My Account </a>
                                <ul class="dropdown-menu dropdown-b">
                                    <li><a class="text4" href="#">Third level</a></li>
                                    <li><a class="text4" href="#">Third level</a></li>
                                    <li><a class="text4" href="#">Third level</a></li>
                                    <li><a class="text4" href="#">Third level</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="text4" href="#"><i class="far fa-credit-card fa-lg" style="margin-right: 10px;"></i>Payment</a>
                                <ul class="dropdown-menu dropdown-b">
                                    <li><a class="text4" href="#">Payment Information</a></li>
                                    <li><a class="text4" href="#">Payment History</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a class="text4" href="#"><i class="fas fa-power-off fa-lg" style="margin-right: 10px;"></i>Logout</a>
                                <ul class="dropdown-menu dropdown-b">
                                    <li><a class="text4" href="#">Third level</a></li>
                                    <li><a class="text4" href="#">Third level</a></li>
                                </ul>
                            </li>
                        </ul>
                        </div>
                    </div>
                </div>
                 <!--/Navbar -->

                <div class="col-sm-10 col-lg-10 col-xs-10">
                    <div class="form-group form-title">
                        <label>Job Information</label>
                        <div class="bottom"></div>
                    </div>

                    <div class="form-group">
                        <label class="content">Job Title</label>
                        <input type="text" class="form-control text content jobtitle" id="jobtitle" placeholder="Job Title" name="jobtitle">
                    </div>

                    <div class="form-group">
                        <label class="content">Job Function</label>    
                        <select class="form-control dropdown content" id="jobfunction" placeholder="Job Function" name="jobfunction">

                        </select>
                    </div>

                    <div class="form-group">
                        <label class="content">Job Industry</label>
                        <select class="form-control dropdown content" id="jobindustry" placeholder="Job Industry" name="jobindustry">
                          </select>
                    </div>

                    <div class="form-group">
                        <label class="content">Employment Status</label>
                         <select class="form-control dropdown content" id="employmentstatus" placeholder="Employment Status" name="employmenstatus">
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="content">Career Path</label>
                        <input type="text" class="form-control text content" id="careerpath" placeholder="Career Path" name="careerpath">
                    </div>

                    <div class="form-group">
                        <label class="content">Talents Needed</label>
                        <input class="form-control number content" type="number" id="talentsneeded" name="number">
                    </div>

                    <div class="form-group form-title">
                        <label class="jd">Job Details</label>
                        <div class="bottom"></div>
                    </div>

                    <div class="form-group">
                        <label class="content">Job Description</label>
                            <div class="lstJobDescription content">
                                
                            </div>
                        <input type="text" class="form-control desc content" maxlength="55" id="jobdescription" placeholder="Job Description" name="jobdescription">
                    </div>

                    <div class="form-group">
                        <label class="content">Job Requirement</label>
                            <div class="lstJobRequirement content">
                                
                            </div>
                        <input type="text" class="form-control text content" maxlength="30" id="jobrequirement" placeholder="Press ENTER to add more" name="jobrequirement">
                    </div>

                    <div class="form-group">
                        <label class="content">Benefits</label>
                            <div class="lstBenefit content">
                                
                            </div>
                        <input type="text" class="form-control text content" maxlength="30" id="benefits" placeholder="Press ENTER to add more" name="benefits">
                    </div>

                    <div class="form-group">
                        <label class="content">Skill Needed</label>
                        <input type="text" class="form-control text content" id="skillneeded" placeholder="Skill Needed" name="skillneeded">
                    </div>

                    <div class="form-group form-title">
                        <label class="jd">Working Days and Hour</label>
                        <div class="bottom"></div>
                    </div>

                    <div class="form-group" id="day">
                        <div class="col-xl-12 col-sm-12 col-md-12 col-lg-12 col-xs-12" id="btnday">
                            <input type="checkbox" id="monday" value="monday" name="day" hidden="" />
                            <label for="monday">
                                <div class="choices">Monday</div>
                            </label>

                            <input type="checkbox" id="tuesday" value="tuesday" name="day" hidden=""/>
                            <label for="tuesday">
                                <div class="choices">Tuesday</div>
                            </label>

                            <input type="checkbox" id="wednesday" value="wednesday" name="day" hidden="" />
                            <label for="wednesday">
                                <div class="choices">Wednesday</div>
                            </label>

                            <input type="checkbox" id="thursday" value="thursday" name="day" hidden=""/>
                            <label for="thursday">
                                <div class="choices">Thursday</div>
                            </label>

                            <input type="checkbox" id="friday" value="friday" name="day" hidden="" />
                            <label for="friday">
                                <div class="choices">Friday</div>
                            </label>

                            <input type="checkbox" id="saturday" value="saturday" name="day" hidden=""/>
                            <label for="saturday">
                                <div class="choices">Saturday</div>
                            </label>

                            <input type="checkbox" id="sunday" value="sunday" name="day" hidden="" />
                            <label for="sunday">
                                <div class="choices">Sunday</div>
                            </label>
                        </div>
                    </div>

                    <div class="form-group form-time">
                        <label class="content">Working Hour</label>
                    </div>

                    <div class="form-group" id="shiftactive">
                        <input type="time" class="time content" id="skillneeded" placeholder="Skill Needed" name="skillneeded">
                        <label class="labeltime">to</label>
                        <input type="time" class="time content" id="skillneeded" placeholder="Skill Needed" name="skillneeded">
                    </div>

                    <div class="row formsc labelinfo" >
                        <input type="checkbox" class="cbShiftsalary" data-target="shiftactive">
                        <label class="labelsc"> Shift Work  </label>
            
                        <button class="btn-link btninfo"><img src="icon/info.png"/></button>
                        <label class="labelscs" id="labelinfoo">This job has irregular working hour and/or days that may change any time</label>
                    </div>
            

                    <div class="form-group form-title">
                        <label class="jd">Location</label>
                        <div class="bottom"></div>
                    </div>

                    <div id="location">

                    <div class="col-sm-4 col-md-4 col-xs-4 form-group">
                        <label class="content">Country</label>
                        <select class="form-control content" placeholder="Country" name="country">
                        </select>

                    </div>

                    <div class="col-sm-4 col-md-4 col-xs-4 form-group">
                        <label class="content">Province</label>
                        <select class="form-control content" placeholder="Province" name="province">
                        </select>
                    </div>

                    <div class="col-sm-4 col-md-4 col-xs-4 form-group">
                        <label class="content">City</label>
                        <select class="form-control content" placeholder="City" name="city">
                        </select>
                    </div>

                    </div>

                    <div class="form-group">
                        <label class="content">Company Address</label>
                        <input type="text" class="form-control desc content" id="companyaddress" placeholder="Company Address" name="companyaddress">
                    </div>

                    <div class="form-group">
                        <span> <img src="icon/location.png"/></span>
                        <a class="content" href="www.google.co.id">Pin location from map</a> or <a class="content" href="www.google.co.id">Use Company Headquarter Address</a>
                    </div>
                
                    <div id="locationpicker">
                      <iframe src="https://maps.google.com/maps?q=t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                       class="stylemaps" allowfullscreen></iframe>
                    </div>

                    <div class="form-group form-title" >
                        <label class="jd">Salary</label>
                        <div class="bottom"></div>
                    </div>
                    <div class="form-group" id="salaryactive">
                        <div class="col-sm-4 col-md-4 col-xs-41">
                            <select class="form-control content" placeholder="" name="Mata Uang">
                                <option>IDR Indonesia</option>
                            </select>
                        </div>
                       
                        <div class="col-sm-4 col-md-4 col-xs-5 form-group f">
                            <input type="text" class="form-control content" id="minimumsalaryamount" placeholder="Minimum Salary Amount" name="minimumsalaryamount">
                        </div>

                        <div class="col-sm-4 col-md-4 col-xs-5 form-group f">
                            <input type="text" class="form-control content" id="maximumsalaryamount" placeholder="Maximum Salary Amount" name="maximumsalaryamount">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" class="cbSalary" data-target="salaryactive">
                        <label class="content g">Don't Show Salary</label>
                    </div>

                    <div class="form-group form-title">
                        <label class="jd">Probation</label>
                        <div class="bottom"></div>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" class="cbProbperiod" data-target="probperiodactive">
                        <label class="content g">Probation Period</label>   
                    </div>

                    <div class="form-group fprobation disabled" id="probperiodactive">
                        <div class="col-sm-4 col-md-4 col-xs-4 nm">
                            <input class="form-control content" type="number" name="numbermonth">
                        </div>

                        <div class="col-sm-8 col-md-8 col-xs-6 form-group f">
                            <select class="form-control dropdown content" placeholder="Months" name="months">
                                <option>coba</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group form-title">
                        <label class="jd">Applicants Filter</label>
                        <div class="bottom"></div>
                    </div>


                    <div class="form-group">
                        <input type="checkbox" class="cbAplicantfilter" data-target="aplicantfilteractive">
                        <label class="content g">Activate Applicant filter</label>   
                    </div>

                    <div id="aplicantfilteractive" class="fappfilter disabled">
                        <div class="form-group education">
                            <label class="content">Education</label>
                            <select class="form-control dropdown content" id="education" placeholder="Education" name="education">
                                <option>coba</option>
                            </select>
                        </div>

                        <div class="form-group experience">
                            <label class="content">Experience</label>
                            <select class="form-control dropdown content" id="experience" placeholder="Experience" name="experience">
                            </select>
                        </div>

                        <div class="form-group experience">
                            <label class="content">Job Category</label>
                            <select class="form-control dropdown content" id="jobcategory" placeholder="Job Category" name="jobcategory">
                            </select>
                        </div>

                        <div class="form-group left">
                            <label class="content">Industry Description</label>
                            <input type="text" class="form-control desc content" id="jdescription" placeholder="Job Description" name="jobdescription">
                        </div>
                    </div>

                    <div class="form-group form-title">
                        <label class="jd">Job Post</label>
                        <div class="bottom"></div>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" class="cbClosejob" data-target="closejobactive">
                        <label class="content g">Auto Close Job Post</label>   
                    </div>

                    <div class="fjobactive disabled" id="closejobactive">
                        <div class="form-group experience">
                            <label class="content">Job Post End In</label>
                        </div>
                        <div class="col-sm-4 col-md-4 col-xs-4 form-group left">
                             <input type="date" class="form-control content" id="datejobend" placeholder="" name="datejobend">
                        </div>

                        <div class="col-sm-4 col-md-4 col-xs-4 form-group ">
                            <input type="time" class="time end content" id="hourjobend" placeholder="" name="hourjobend">
                        </div>
                    </div>

                    <div class="form-group form-title">
                        <label class="space"> </label>
                    </div>
                </div>

                   
               <div class="col-sm-2 col-lg-2 col-xs-2">
                    <div class = "space-jobtitle">
                        hahahaha
                    </div>                              
                    <div class= "space-jobfunction">
                        hahahaha
                    </div>
                    <div class= "space-jobindustry">
                        hahahaha
                    </div>
                    <div class= "space-employmentstatus">
                        hahahaha
                    </div>
                    <div class= "space-careerpath">
                        hahahaha
                    </div>
                    <div class= "space-talentsneeded">
                        hahahaha
                    </div>
                    <div class= "space-jobdescription">
                        hahahaha
                    </div>
                    <div class= "space-jobrequirement">
                        hahahaha
                    </div>
                    <div class= "space-benefits">
                        hahahaha
                    </div>
                    <div class= "space-skillneeded">
                        hahahaha
                    </div>
                    <div class= "space-day">
                        hahahaha
                    </div>
                    <div class= "space-workinghour">
                        hahahaha
                    </div>
                    <div class= "space-location">
                        hahahaha
                    </div>
                    <div class= "space-address">
                        hahahaha
                    </div>
                    <div class= "space-salary">
                        hahahaha
                    </div>
                    <div class= "space-probation">
                        hahahaha
                    </div>
                    <div class= "space-education">
                        hahahaha
                    </div>
                    <div class= "space-experience">
                        hahahaha
                    </div>
                    <div class= "space-jobcategory">
                        hahahaha
                    </div>
                    <div class= "space-jdescription">
                        hahahaha
                    </div>
                    <div class= "space-jobpost">
                        hahahaha
                    </div>
               </div>

                <div class="form-group buttonsubmit" style="margin-bottom: 40px;">
                    <button type="button" class="btn btn-cancel content">Cancel</button>
                    <button type="button" class="btn btn-draft content">Save as Draft</button>
                    <button type="button" class="btn btn-savepost ">Preview & Post</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection