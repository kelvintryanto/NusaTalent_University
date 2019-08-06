<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class JobPost extends Model
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Bangkok");
    }

    private function generateJobPostID()
    {
        $jobPostID = str_random(64);
        $exists = DB::table('jp_event')->where('id', $jobPostID)->first();

        if (!is_null($exists))
            $this->generateJobPostID();

        return $jobPostID;
    }

    public function GetCompanyPartnership()
    {
        $user = new User();

        $univID = $user->getUnivID();

        $resp =
            DB::table("university_partnership AS up")
            ->join("career_fair AS cf", "cf.id", "=", "up.company_id")
            ->select("cf.name AS companyName", "cf.id AS companyID")
            ->where("up.univ_id", $univID)
            ->get()
            ->toArray();

        if (!empty($resp))
            return "Hello";
        else
            return false;
    }

    public function GetTotalJobPost()
    {
        $user = new User();

        $univID = $user->getUnivID();

        $resp =
            DB::table("university_partnership AS up")
            ->join("jp_event AS jpe", "jpe.cp_id", "=", "up.company_id")
            ->select(DB::raw("SUM(CASE WHEN jpe.id IS NOT NULL THEN 1 ELSE 0 END) AS totalJobPost"))
            ->where("jpe.status", "<>", 2)
            ->value("totalJobPost");

        if (!is_null($resp) || $resp !== "")
            return $resp;

        return false;
    }

    public function GetListJobPost()
    {
        $user = new User();

        $univID = $user->getUnivID();

        $resp =
            DB::table("university_partnership AS up")
            ->join("career_fair AS cf", "cf.id", "=", "up.company_id")
            ->join(DB::raw("(SELECT jpe.id AS jobPostID,
                                    jpe.job_position AS jobPosition,
                                    jpe.created_at AS jobPostCreatedDate,
                                    jpe.status AS jobPostStatus,
                                    SUM(CASE WHEN sjpe.viewed = 1 THEN 1 ELSE 0 END) AS totalViewed,
                                    SUM(CASE WHEN sjpe.applied = 1 THEN 1 ELSE 0 END) AS totalApplied,
                                    SUM(CASE WHEN sjpe.favorite = 1 THEN 1 ELSE 0 END) AS totalFavorite,
                                    jpe.cp_id AS companyID,
                                    jpe.work_location AS workLocation
                                FROM jp_event AS jpe
                                LEFT JOIN status_job_post_event AS sjpe ON sjpe.job_post_id = jpe.id
                                GROUP BY jpe.id) AS jpe"), "jpe.companyID", "=", "up.company_id")
            ->select("jpe.jobPostID", "jpe.jobPosition", "jpe.jobPostCreatedDate", "jpe.totalViewed", "jpe.totalFavorite", "jpe.totalApplied", "jpe.jobPostStatus", "jpe.workLocation", "jpe.jobPostStatus", "cf.name AS companyName")
            ->where("jpe.jobPostStatus", "<>", 2)
            ->get()
            ->toArray();

        if (!empty($resp))
            return $resp;

        return false;
    }

    public function GetListCompanyPartnership()
    {
        $user = new User();

        $univID = $user->getUnivID();

        $results =
            DB::table("university_partnership AS up")
            ->join("career_fair AS cf", "cf.id", "=", "up.company_id")
            ->select("cf.name AS companyName", "cf.id AS companyID")
            ->where("up.univ_id", $univID)
            ->get()
            ->toArray();

        if (!empty($results))
            return $results;

        return false;
    }

    public function GetEmploymentCategory()
    {
        $data = DB::table("employment")
            ->select("description", "id")
            ->get()
            ->toArray();

        return $data;
    }

    public function GetListCategory()
    {
        $results =
            DB::table("jp_category")
            ->select("id AS categoryID", "name AS categoryName")
            ->get()
            ->toArray();

        if (!empty($results))
            return $results;
        else
            return false;
    }

    public function GetSingeJobPost($job_post_id)
    {

        $result =
            DB::table("jp_event")
            ->select(
                "job_position",
                "work_location",
                "salary_min",
                "salary_max",
                "end_date",
                "job_description",
                "job_requirement",
                "special_skill",
                "employee_benefit",
                "career_path",
                "working_hour",
                "probation",
                "talent_needed",
                "category_id"
            )
            ->where("id", $job_post_id)
            ->first();

        return $result;
    }

    public function createJobPost(
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
    ) {

        $jobPostID = $this->generateJobPostID();
        $created_at = date('Y-m-d H:i:s');

        $data = array(
            "id" => $jobPostID,
            "cp_id" => $companyID,
            "job_position" => $jobPosition,
            "work_location" => $workLocation,
            "salary_min" => $salaryMin,
            "salary_max" => $salaryMax,
            "end_date" => $endDate,
            "job_description" => $jobDescription,
            "job_requirement" => $jobRequirement,
            "special_skill" => $employeeSkill,
            "employee_benefit" => $employeeBenefit,
            "career_path" => $careerPath,
            "working_hour" => $workingHours,
            "probation" => $probationPeriod,
            "talent_needed" => $talentNeeded,
            "category_id" => $jobCategory,
            "created_at" => $created_at,
            "status" => 1
        );

        $resp = DB::table("jp_event")
            ->insert($data);

        if ($resp)
            return true;
        else
            return false;
    }

    public function updateJobPost(
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
    ) {
        $timestamp = date('Y-m-d H:i:s');

        $data = array(
            "job_position" => $jobPosition,
            "work_location" => $workLocation,
            "salary_min" => $salaryMin,
            "salary_max" => $salaryMax,
            "end_date" => $endDate,
            "job_description" => $jobDescription,
            "job_requirement" => $jobRequirement,
            "special_skill" => $employeeSkill,
            "employee_benefit" => $employeeBenefit,
            "career_path" => $careerPath,
            "working_hour" => $workingHours,
            "probation" => $probationPeriod,
            "talent_needed" => $talentNeeded,
            "category_id" => $jobCategory,
            "last_modify" => $timestamp,
            "status" => 1
        );

        $resp = DB::table("jp_event")
            ->where("id", $jobPostID)
            ->update($data);

        return $resp;
    }

    public function deleteJobPost($job_post_id)
    {
        $data = array(
            "status" => 2
        );
        $updated_at = date('Y-m-d H:i:s');
        $resp = DB::table("jp_event")
            ->where("id", $job_post_id)
            ->update($data);

        return $resp;
    }

    public function updateJobPostStatus($jobPostID, $status)
    {
        $status_code = 0;

        switch ($status) {
            case "in":
                $status_code = 0;
                break;
            case "ac":
                $status_code = 1;
                break;
            case "ar":
                $status_code = 2;
                break;
        }
        $data = array(
            "status" => $status_code
        );
        $resp = DB::table("jp_event")
            ->where("id", $jobPostID)
            ->update($data);

        return $resp;
    }
}
