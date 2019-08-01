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

Route::get('/', function(){
	return redirect('/login');
});

Route::get('/login', "MainController@LoginPage");

Route::get("/logout", function(){
	return redirect('/login');
});

//Route::get("/UpdateTalent", "MainController@UpdateTalent");

Route::get("/resetpassword", "MainController@ChangePasswordPage");

//Route::get('/Events', 'EventsController@index');

Route::get('/Dashboard', 'DashboardController@index');

Route::get('/ManageCompany', 'MainController@CompanyProfile');

Route::get('/JobPost', "MainController@JobPost");

Route::get('/ManageJobPosts', "MainController@ManageJobPost");
Route::get('/ManageJobPosts/Edit/jpID={id}', "MainController@edit");
Route::get('/ManageJobPosts/ViewDetails/jpID={id}', "MainController@ViewDetails");
//Route::get('/ManageStudent/JobPostApplied/sID={id}', "TalentsController@DetailJobPost");
//Route::get("/ManageStudent/ViewCV/sID={id}", "TalentsController@ViewCV");
Route::get("/ManageJobPosts/TalentReviewed/sID={id}", "MainController@TalentReviewed");
Route::get('/ManageJobPosts/Delete/jpID={id}', "MainCOntroller@DeleteJobPost");

//Route::get('/Talents', "TalentsController@index");
//Route::get('/Talents/ViewCV/sID={id}', "TalentsController@ViewCV");
//Route::post("/Talents/Delete/sID={id}",  "TalentsController@DeleteTalent");
Route::post('PostingJob', [
	'uses' => 'MainController@PostingJob'
]);

Route::post('UpdateJobPost', [
	'uses' => 'MainController@UpdateJobPost'
]);

Route::post("EditProfile", [
	"uses" => "MainController@EditProfile"
]);

Route::post("/ApproveTalent", [
	"uses" => "TalentsController@ApproveTalent"
]);

Route::post("/DisapproveTalent", [
	"uses" => "TalentsController@DisapproveTalent"
]);

Route::post("/Login", [
	"uses" => "MainController@Login"
]);

Route::post("ChangePassword", [
	"uses" => "MainController@ChangePassword"
]);

Route::post("/UploadImage", "MainController@SaveProfilePicture");

Route::post("/SetJobPostNonActive", "MainController@SetNonActive");
Route::post("/SetJobPostActive", "MainController@SetActive");

Route::post("/GetCareerFairSchedule", "EventsController@GetCareerFairSchedule");

Route::post("/GetJobPostAnswers", [
	"uses" => "MainController@GetJobPostAnswers"
]);