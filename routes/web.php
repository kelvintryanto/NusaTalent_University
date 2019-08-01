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

Route::get('/', 
	function()
	{
		return redirect('/Login');
	}
);

/* Main Controller */ 

Route::get("/logout",
	function()
	{
		return redirect('/Login');
	}
);

Route::get('/Login', "MainController@showLoginPage");

Route::get("/Access/change-password", "MainController@ChangePasswordPage");

Route::get('/ManageCompany', 'MainController@CompanyProfile');

Route::get('/JobPost/Edit/jpID={id}', "JobPostController@showEditJobPostPage");

Route::get('/ManageJobPosts/ViewDetails/jpID={id}', "MainController@ViewDetails");

Route::get("/ManageJobPosts/TalentReviewed/sID={id}", "MainController@TalentReviewed");

Route::get('/Student', 'StudentController@showStudentDetailPage');

Route::post('/get-export-data-student', 'MainController@getStudentExportData');

Route::post('UpdateJobPost', 
	['uses' => 'MainController@UpdateJobPost']
);

Route::post("/authorizedAccess", 
	["uses" => "MainController@authorizedAccess"]
);

Route::post("ChangePassword", 
	["uses" => "MainController@ChangePassword"]
);

Route::post("/GetJobPostAnswers", 
	["uses" => "MainController@GetJobPostAnswers"]
);

Route::post("/UploadImage", "MainController@SaveProfilePicture");

Route::post("/SetJobPostActive", "MainController@SetActive");

/* End of Controller */

/* Dashboard Controller */

Route::get('/Dashboard', 'DashboardController@index');

Route::post('/Dashboard/get-chart-area-data', 
	["uses" => "DashboardController@GetChartAreaData"]
);

Route::post('/Dashboard/get-chart-bar-weekly-data', 
	["uses" => "DashboardController@GetChartBarDataWeekly"]
);

Route::post('/Dashboard/get-chart-bar-monthly-data', 
	["uses" => "DashboardController@GetChartBarDataMonthly"]
);

/* End of Dashboard */

/* JobPost Controller */

Route::get('/JobPost/post-job', "JobPostController@ShowCreateJobPostPage");

Route::post("/JobPost/create-job-post", 
	["uses" => "JobPostController@createJobPost"]
);

Route::post("/update-job-post", 
	["uses" => "JobPostController@updateJobPost"]
);

Route::post("/delete-job-post", 
	["uses" => "JobPostController@deleteJobPost"]
);

Route::post("/update-job-post-status", "JobPostController@updateJobPostStatus");

Route::get('/JobPost/list-job-post', "JobPostController@showListJobPostPage");

/* End of Controller */

/* Company Controller */

Route::post('/Company/sort-list-company', "CompanyController@SortListCompany");

Route::get("/Company/add-company-page", "CompanyController@showAddCompanyPage");

Route::post("/Company/add-company", "CompanyController@AddCompany");

Route::get("/Company/list-company", "CompanyController@showListCompanyPage");

Route::post('/Company/delete-company', "CompanyController@DeleteCompany");

Route::get('/profile', "CompanyController@showCompanyProfilePage");

Route::post('/Company/check-email', "CompanyController@CheckEmail");

Route::get('/Company/edit-profile/cID={id}', "CompanyController@showEditCompanyProfilePage");

Route::post("/update-profile", 
	["uses" => "CompanyController@updateProfile"]
);

/* End of Controller */

/* Event Controller */

Route::get("/Event/denah", "EventsController@index");

/* End of Controller */

