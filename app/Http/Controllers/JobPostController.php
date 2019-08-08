<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\JobPost;

class JobPostController extends Controller
{
    private function checkSession()
    {
        $user = new User();

        return $user->checkSession();
    }

    public function showListJobPostPage()
    {
        $user = new User();

        $jp = new JobPost();

        if ($this->checkSession()) {
            $data[] = array();
            $data['css'] = view('css');
            $data['js'] = view('js');
            $data['navbar'] = view('template.navbar')->with('univName', $user->getUnivName());
            $data['sidebar'] = view('template.sidebar');
            $data['footer'] = view('template.footer');
            $data['lstJobPost'] = $jp->GetListJobPost();
            $data['totalJobPost'] = $jp->GetTotalJobPost();
            return view('JobPosts.manage-job-post')->with('data', $data);
        }
        return redirect("/login");
    }

    public function ShowCreateJobPostPage()
    {
        $user = new User();

        $jp = new JobPost();

        if ($this->checkSession()) {
            $data[] = array();
            $data['css'] = view('css');
            $data['js'] = view('js');
            $data['navbar'] = view('template.navbar')->with('univName', $user->getUnivName());
            $data['sidebar'] = view('template.sidebar');
            $data['footer'] = view('template.footer');
            $data['companyPartnership'] = $jp->GetCompanyPartnership();
            $data['lstCategory'] = $jp->GetListCategory();
            $data['lstCompany'] = $jp->GetListCompanyPartnership();
            return view('JobPosts.post-a-job')->with('data', $data);
        }

        return redirect("/login");
    }

    public function showEditJobPostPage($j)
    {
        $user = new User();
        $jp = new JobPost();
        if ($this->checkSession()) {
            $data[] = array();
            $data['css'] = view('css');
            $data['js'] = view('js');
            $data['navbar'] = view('template.navbar')->with('univName', $user->getUnivName());
            $data['sidebar'] = view('template.sidebar');
            $data['footer'] = view('template.footer');

            $data['job_category'] = $jp->GetListCategory();
            $data['job_post'] = $jp->GetSingeJobPost($j);
            $data['job_post_id'] = $j;

            return view('JobPosts.edit-job-post')->with('data', $data);
        }

        return redirect("/login");
    }

    public function ViewDetails($jpID)
    {
        $data[] = array();

        $data['css'] = view('css');
        $data['js'] = view('js');
        $data['navbar'] = view('template.navbar');
        $data['sidebar'] = view('template.sidebar');
        $data['footer'] = view('template.footer');
        $company = new Company;
        $data['jobPosts'] = $company->RetrieveDetailJobPost($jpID);

        return view('JobPosts.view-details')->with('data', $data);
    }

    public function edit($id)
    {
        $data[] = array();

        $data['css'] = view('css');
        $data['js'] = view('js');
        $data['navbar'] = view('template.navbar');
        $data['sidebar'] = view('template.sidebar');
        $data['footer'] = view('template.footer');
        $company = new Company;

        $data['jobPosts'] = $company->RetrieveSingleJobPosting($id);

        return view('JobPosts.edit-job-post')->with('data', $data);
    }

    public function updateJobPostStatus()
    {

        $job_post_id     = htmlspecialchars(Input::get('job_post_id'));
        $status          = htmlspecialchars(Input::get('status'));

        $jp = new JobPost();

        $resp = $jp->updateJobPostStatus($job_post_id, $status);
        $response = '';

        if ($resp) {
            $response = array(
                'status' => 'success',
                'msg' => 'Successfully update job post status'
            );
        } else {
            $response = array(
                'status' => 'error',
                'msg' => 'Failed update job post status',
            );
        }

        return json_encode($response);
    }

    public function createJobPost()
    {
        $jobPosition     = htmlspecialchars(Input::get('job_position'));
        $workLocation    = htmlspecialchars(Input::get('work_location'));
        $jobCategory     = htmlspecialchars(Input::get('job_category'));
        $talentNeeded    = htmlspecialchars(Input::get('talent_needed'));
        $jobDescription  = htmlspecialchars(Input::get('job_description'));
        $jobRequirement  = htmlspecialchars(Input::get('job_requirement'));
        $employeeBenefit = htmlspecialchars(Input::get('employee_benefit'));
        $employeeSkill   = htmlspecialchars(Input::get('special_skill'));
        $careerPath      = htmlspecialchars(Input::get('career_path'));
        $workingHours    = htmlspecialchars(Input::get('work_hours'));
        $probationPeriod = htmlspecialchars(Input::get('probation_period'));
        $salaryMin       = htmlspecialchars(Input::get('salary_min'));
        $salaryMax       = htmlspecialchars(Input::get('salary_max'));
        $endDate         = "24-04-2019";
        $companyID =    htmlspecialchars(Input::get('txtCompanyID'));

        $jp = new JobPost();

        $resp = $jp->createJobPost(
            $jobPosition,
            $workLocation,
            $jobCategory,
            $talentNeeded,
            $jobDescription,
            $jobRequirement,
            $employeeBenefit,
            $employeeSkill,
            $careerPath,
            $workingHours,
            $probationPeriod,
            $salaryMin,
            $salaryMax,
            $endDate,
            $companyID
        );

        $response = '';

        if ($resp) {
            $response = array(
                'status' => 'success',
                'msg' => 'Successfully add new job post',
                'data' => $jobCategory
            );
        } else {
            $response = array(
                'status' => 'error',
                'msg' => 'Failed add new',
            );
        }

        return json_encode($response);
    }

    public function UpdateJobPost()
    {
        $jobPostID       = htmlspecialchars(Input::get('job_post_id'));
        $jobPosition     = htmlspecialchars(Input::get('job_position'));
        $workLocation    = htmlspecialchars(Input::get('work_location'));
        $jobCategory     = htmlspecialchars(Input::get('job_category'));
        $talentNeeded    = htmlspecialchars(Input::get('talent_needed'));
        $jobDescription  = htmlspecialchars(Input::get('job_description'));
        $jobRequirement  = htmlspecialchars(Input::get('job_requirement'));
        $employeeBenefit = htmlspecialchars(Input::get('employee_benefit'));
        $employeeSkill   = htmlspecialchars(Input::get('special_skill'));
        $careerPath      = htmlspecialchars(Input::get('career_path'));
        $workingHours    = htmlspecialchars(Input::get('work_hours'));
        $probationPeriod = htmlspecialchars(Input::get('probation_period'));
        $salaryMin       = htmlspecialchars(Input::get('salary_min'));
        $salaryMax       = htmlspecialchars(Input::get('salary_max'));
        $endDate         = "24-04-2019";

        $jp = new JobPost();

        $resp = $jp->updateJobPost(
            $jobPostID,
            $jobPosition,
            $workLocation,
            $jobCategory,
            $talentNeeded,
            $jobDescription,
            $jobRequirement,
            $employeeBenefit,
            $employeeSkill,
            $careerPath,
            $workingHours,
            $probationPeriod,
            $salaryMin,
            $salaryMax,
            $endDate
        );
        $response = '';

        if ($resp) {
            $response = array(
                'status' => 'success',
                'msg' => 'Successfully update job post',
                'data' => $jobCategory
            );
        } else {
            $response = array(
                'status' => 'error',
                'msg' => 'Failed update',
            );
        }

        return json_encode($response);
    }

    public function deleteJobPost()
    {
        $job_post_id       = htmlspecialchars(Input::get('job_post_id'));

        $jp = new JobPost();

        $resp = $jp->deleteJobPost($job_post_id);
        $response = '';

        if ($resp) {
            $response = array(
                'status' => 'success',
                'msg' => 'Successfully delete job post'
            );
        } else {
            $response = array(
                'status' => 'error',
                'msg' => 'Failed delete',
            );
        }

        return json_encode($response);
    }
}
