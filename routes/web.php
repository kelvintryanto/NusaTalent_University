<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get(
    '/',
    function () {
        return redirect('/login');
    }
);

/* Main Controller */

//checked 06/08/2019 16:24


//checked MainController@showLoginPage 08/08/2019 10:46
Route::get('/login', "MainController@showLoginPage");
Route::get("/Access/change-password", "MainController@ChangePasswordPage");

Route::get(
    "/logout",
    function () {
        Session::flush();
        return redirect('/login');
    }
);

// fokus dulu sama Controller setiap navigasi
// KT rebuild company controller 07/08/2019 15:18
// checked dashboard controller 06/08/2019 15:03
/* Dashboard Controller */
Route::get("/dashboard", "DashboardController@index");

// Company Controller
Route::get("/company", "CompanyController@showListCompanyPage");
Route::get("/company/add-company", "CompanyController@showAddCompanyPage");
Route::get("/company/addCompanyRegular", "CompanyController@AddCompanyRegular");
Route::get("/company/edit/{id}", "CompanyController@showEditCompanyProfilePage");
Route::get("/company/detail/{id}", "CompanyController@showDetailCompanyProfilePage");
Route::get("/company/delete/{id}", "CompanyController@deleteCompany");
Route::post("/company/sortList", "CompanyController@sortListCompany");
// Route::post("/retrieveCity", "CompanyController@retrieveCity");
// Route::post("/company/sort-list-company", "CompanyController@sortListCompany");


// checked StudentController@showStudentDetailPage 08/08/2019 11:27
Route::get("/student", "StudentController@showStudentDetailPage");
Route::get("/student/detail/{id}", "StudentController@studentDetail");
Route::post("/student/sortList", "StudentController@sortListStudent");
// Route::get("/Student", "StudentController@showStudentDetailPage");


// Job Controller
Route::get("/job", "JobPostController@showListJobPostPage");
Route::post("/job/sortList", "JobPostController@sortListJob");

// Event Controller
Route::get("/event", "EventsController@index");

//Controller : EventController, Model : Events
Route::get("/event/addEvent", "EventsController@showAddEvent");
Route::get("/event/addEventData", "EventsController@addEvent");
Route::get("/event/{id}/editEvent", "EventsController@showEditEvent");
Route::get("/event/{id}/editEventData", "EventsController@editEventData");
Route::post("/event/sortEvent", "EventsController@sortEventList");
//done check

//Controller : CompanyEventController, Model : CompanyEvent
Route::get("/event/{id}", "EventsController@detailEvent");
Route::get("/event/{id}/addCompany", "EventsController@showAddCompanyEvent");
Route::get("/event/{id}/addCompanyData", "EventsController@addCompanyData");
Route::get("/event/{eventID}/{companyID}/editCompanyEvent", "EventsController@showEditCompanyEvent");
Route::get("/event/{companyID}/editCompanyData", "EventsController@editCompanyData");

//Event Controller Job Company Event List
Route::get("/event/job", "EventsController@EventJobPage");
Route::get("/event/visitor", "EventsController@EventVisitorPage");


// draft Controller
// Route::get('/JobPost/list-job-post', "JobPostController@showListJobPostPage");
// kemungkinan draftController ga dipake


Route::get('/ManageCompany', 'MainController@CompanyProfile');

Route::get('/JobPost/Edit/jpID={id}', "JobPostController@showEditJobPostPage");

Route::get('/ManageJobPosts/ViewDetails/jpID={id}', "MainController@ViewDetails");

Route::get("/ManageJobPosts/TalentReviewed/sID={id}", "MainController@TalentReviewed");



Route::post('/get-export-data-student', 'MainController@getStudentExportData');

Route::post(
    'UpdateJobPost',
    ['uses' => 'MainController@UpdateJobPost']
);

Route::post(
    "/authorizedAccess",
    ["uses" => "MainController@authorizedAccess"]
);

Route::post(
    "ChangePassword",
    ["uses" => "MainController@ChangePassword"]
);

Route::post(
    "/GetJobPostAnswers",
    ["uses" => "MainController@GetJobPostAnswers"]
);

Route::post("/UploadImage", "MainController@SaveProfilePicture");

Route::post("/SetJobPostActive", "MainController@SetActive");
/* End of Controller */




Route::post(
    '/Dashboard/get-chart-area-data',
    ["uses" => "DashboardController@GetChartAreaData"]
);

Route::post(
    '/Dashboard/get-chart-bar-weekly-data',
    ["uses" => "DashboardController@GetChartBarDataWeekly"]
);

Route::post(
    '/Dashboard/get-chart-bar-monthly-data',
    ["uses" => "DashboardController@GetChartBarDataMonthly"]
);

/* End of Dashboard */

/* JobPost Controller */
Route::get('/JobPost/post-job', "JobPostController@ShowCreateJobPostPage");

Route::post(
    "/JobPost/create-job-post",
    ["uses" => "JobPostController@createJobPost"]
);

Route::post(
    "/update-job-post",
    ["uses" => "JobPostController@updateJobPost"]
);

Route::post(
    "/delete-job-post",
    ["uses" => "JobPostController@deleteJobPost"]
);

Route::post("/update-job-post-status", "JobPostController@updateJobPostStatus");



/* End of Controller */





// FOKUS SAMA KEDUA FUNGSI INI DULU
// rebuild CompanyController@addCompany 05/08/2019 16:40 table berubah
Route::post("/Company/add-company", "CompanyController@AddCompany");

// checked CompanyController@showListCompanyPage 02/08/2019 16:23
// rebuild CompanyController@showListCompanyPage 05/08/2019 16:40 table berubah
Route::get("/Company/list-company", "CompanyController@showListCompanyPage");




Route::get('/profile', "CompanyController@showCompanyProfilePage");
Route::post('/Company/check-email', "CompanyController@CheckEmail");
Route::post(
    "/update-profile",
    ["uses" => "CompanyController@updateProfile"]
);
/* End of Company Controller */

/* Event Controller */

Route::get("/Event/denah", "EventsController@index");

/* End of Controller */

Route::get("/pages/login", "PagesController@login");
