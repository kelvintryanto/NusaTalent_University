<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use DB;

class Company extends Model {

    private $_companyID;
    private $_upID;
    private $_cuID;
    private $_boothID;

    public function __construct()
    {
        date_default_timezone_set("Asia/Bangkok");
        $this->_companyID = $this->GenerateCompanyID();
    }

    private function GenerateCompanyUserID()
    {
        $cuID = str_random(32);

        $exists = DB::table("company_user")
                    ->where("id", $cuID)
                    ->first();

        if(!is_null($exists))
            $this->GenerateCompanyUserID();

        return $cuID;
    }

    private function GenerateUnivPartnershipID()
    {
        $partnershipID = str_random(64);
        $exists = DB::table("university_partnership")
                    ->where("id", $partnershipID)
                    ->first();

        if(!is_null($exists))
            $this->GenerateUnivPartnershipID();

        return $partnershipID;
    }

    private function GenerateCompanyID()
    {
        $companyID = str_random(64);

        $exists = DB::table("cp_event")->where("id", $companyID)->first();

        if(!is_null($exists))
            $this->GenerateCompanyID();

        return $companyID;
    }

    private function GenerateBoothID()
    {
        $boothID = str_random(64);

        $exists = DB::table("booth_event")
                    ->where("id", $boothID)
                    ->first();

        if(!is_null($exists))
            $this->GenerateBoothID();

        return $boothID;
    }

    public function GetCompanyID()
    {
        return $this->_companyID;
    }

    public function retrieveDataCompany($companyID)
    {
        $result = DB::table("cp_event AS cp")
                        ->where("cp.id", $companyID)
                        ->leftJoin("total_employees AS te", "te.id", "=", "cp.employees")
                        ->select("cp.name", "cp.website", "cp.email", "cp.contact", "cp.address", "cp.location",
                            "cp.pic_hr", "cp.hr_contact", "cp.hr_email", "cp.industry", "cp.linkedin", "cp.employees", "cp.overview", "cp.reason",
                            "cp.image_path", "te.total")
                        ->get()
                        ->first();
        return $result;
    }

    public function AddCompany($companyName, $companyWebsite, $companyEmail, $companyContact, $hrName, $hrContact,
                                    $hrEmail, $companyAddress, $companyLocation, $companyIndustry, $companyLinkedln,
                                            $totalEmployee, $companyOverview, $companyReasons, $imagePath)
    {
        $user = new User();
        $univID = $user->getUnivID();

        $createdAt = date('Y-m-d H:i:s');

        $data =
        array(
            "id"        => $this->_companyID,
            "name"      => $companyName,
            "website"   => $companyWebsite,
            "email"     => $companyEmail,
            "contact"   => $companyContact,
            "pic_hr"    => $hrName,
            "hr_contact" => $hrContact,
            "hr_email" => $hrEmail,
            "address"   => $companyAddress,
            "location"  =>  $companyLocation,
            "industry"  => $companyIndustry,
            "linkedin"  => $companyLinkedln,
            "employees" => $totalEmployee,
            "overview"  => $companyOverview,
            "reason"   => $companyReasons,
            "image_path" => $imagePath,
            "status_active" => 1,
            "created_at" => $createdAt
        );

        $resp = DB::table("cp_event")
                ->insert($data);

        if($resp)
        {
            unset($resp);
            $resp = $this->AddUnivPartnership($this->_companyID, $univID);

            return $resp;
        }

        return false;
    }

    public function UpdateCompany($companyName, $companyWebsite, $companyEmail, $companyContact, $companyHRName, $companyHRContact, $companyHREmail, $companyAddress, $companyLocation, $companyIndustry, $companyLinkedin,
                                            $totalEmployee, $companyOverview, $companyReasons, $imagePath, $companyID)
    {
        $timestamp = date('Y-m-d H:i:s');

        $data = array(
            "name" => $companyName,
            "website" => $companyWebsite,
            "email" => $companyEmail,
            "contact" => $companyContact,
            "location" => $companyLocation,
            "pic_hr" => $companyHRName,
            "hr_contact" => $companyHRContact,
            "hr_email" => $companyHREmail,
            "industry" => $companyIndustry,
            "linkedin" => $companyLinkedin,
            "employees" => $totalEmployee,
            "address" => $companyAddress,
            "overview" => $companyOverview,
            "reason" => $companyReasons,
            "image_path" => $imagePath,
            "updated_at" => $timestamp
        );

        $resp = DB::table("cp_event")
                ->where("id", $companyID)
                ->update($data);

        return $resp;
    }

    public function ChangeEmailAccess($companyID, $email, $oldEmail)
    {
        $data = array(
            "username" => $email
        );

        $resp =
            DB::table("company_user")
            ->where("company_id", $companyID)
            ->where("username", $oldEmail)
            ->update($data);

        return $resp;
    }

    public function UploadImage($imagePath)
    {

    }

    public function GetListCompany($sortBy)
    {
        $user = new User();
        $univID = $user->getUnivID();
        if($sortBy == "")
        {
            $results =
                DB::table('university_partnership AS up')
                ->join('cp_event AS cpe', 'cpe.id', '=', 'up.company_id')
                ->leftJoin(DB::raw("(SELECT SUM(CASE WHEN sjpe.viewed = 1 THEN 1 ELSE 0 END) AS totalViewed,
                                        SUM(CASE WHEN sjpe.applied = 1 THEN 1 ELSE 0 END) AS totalApplied,
                                        SUM(CASE WHEN sjpe.favorite = 1 THEN 1 ELSE 0 END) AS totalFavorite,
                                        SUM(CASE WHEN jpe.id IS NOT NULL THEN 1 ELSE 0 END) AS totalJobPost,
                                        jpe.cp_id
                                    FROM jp_event AS jpe
                                    LEFT JOIN status_job_post_event AS sjpe ON sjpe.job_post_id = jpe.id
                                    GROUP BY jpe.cp_id) AS jpe"), "jpe.cp_id", "=", "cpe.id")
                ->leftJoin("booth_event AS be", "be.cp_id", "=", "cpe.id")
                ->leftJoin("company_user AS cu", "cu.company_id", "=", "cpe.id")
                ->select("cpe.id AS companyID",
                            "cpe.name AS companyName",
                            "cpe.location AS companyLocation",
                            "cpe.industry AS companyIndustry",
                            "cu.last_active AS updated_at",
                            "jpe.totalViewed",
                            "jpe.totalApplied",
                            "jpe.totalFavorite",
                            "jpe.totalJobPost",
                            "be.booth_no AS boothNumber")
                ->where('up.univ_id', $univID)
                ->where("cpe.status_active", 1)
                ->groupBy("cpe.id")
                ->orderBy("jpe.totalApplied", "asc")
                ->get()
                ->toArray();
            // $results =
            // DB::table("cp_event AS cpe")
            // ->leftJoin(DB::raw("(SELECT SUM(CASE WHEN sjpe.viewed = 1 THEN 1 ELSE 0 END) AS totalViewed,
            //                             SUM(CASE WHEN sjpe.applied = 1 THEN 1 ELSE 0 END) AS totalApplied,
            //                             SUM(CASE WHEN sjpe.favorite = 1 THEN 1 ELSE 0 END) AS totalFavorite,
            //                             SUM(CASE WHEN jpe.id IS NOT NULL THEN 1 ELSE 0 END) AS totalJobPost,
            //                             jpe.cp_id
            //                         FROM jp_event AS jpe
            //                         LEFT JOIN status_job_post_event AS sjpe ON sjpe.job_post_id = jpe.id
            //                         GROUP BY jpe.cp_id) AS jpe"), "jpe.cp_id", "=", "cpe.id")
            // ->leftJoin("booth_event AS be", "be.cp_id", "=", "cpe.id")
            // ->leftJoin("company_user AS cu", "cu.company_id", "=", "cpe.id")
            // ->select("cpe.id AS companyID",
            //             "cpe.name AS companyName",
            //             "cpe.location AS companyLocation",
            //             "cpe.industry AS companyIndustry",
            //             "cu.last_active AS updated_at",
            //             "jpe.totalViewed",
            //             "jpe.totalApplied",
            //             "jpe.totalFavorite",
            //             "jpe.totalJobPost",
            //             "be.booth_no AS boothNumber")
            // ->where("cpe.status_active", 1)
            // ->groupBy("cpe.id")
            // ->orderBy("jpe.totalApplied", "asc")
            // ->get()
            // ->toArray();
        }
        else
        {
            $results =
                DB::table('university_partnership AS up')
                ->join('cp_event AS cpe', 'cpe.id', '=', 'up.company_id')
                ->leftJoin(DB::raw("(SELECT SUM(CASE WHEN sjpe.viewed = 1 THEN 1 ELSE 0 END) AS totalViewed,
                                        SUM(CASE WHEN sjpe.applied = 1 THEN 1 ELSE 0 END) AS totalApplied,
                                        SUM(CASE WHEN sjpe.favorite = 1 THEN 1 ELSE 0 END) AS totalFavorite,
                                        SUM(CASE WHEN jpe.id IS NOT NULL THEN 1 ELSE 0 END) AS totalJobPost,
                                        jpe.cp_id
                                    FROM jp_event AS jpe
                                    LEFT JOIN status_job_post_event AS sjpe ON sjpe.job_post_id = jpe.id
                                    GROUP BY jpe.cp_id) AS jpe"), "jpe.cp_id", "=", "cpe.id")
                ->leftJoin("booth_event AS be", "be.cp_id", "=", "cpe.id")
                ->leftJoin("company_user AS cu", "cu.company_id", "=", "cpe.id")
                ->select("cpe.id AS companyID",
                            "cpe.name AS companyName",
                            "cpe.location AS companyLocation",
                            "cpe.industry AS companyIndustry",
                            "cu.last_active AS updated_at",
                            "jpe.totalViewed",
                            "jpe.totalApplied",
                            "jpe.totalFavorite",
                            "jpe.totalJobPost",
                            "be.booth_no AS boothNumber")
                ->where('up.univ_id', $univID)
                ->where("cpe.status_active", 1)
                ->groupBy("cpe.id")
                ->orderBy("jpe.".$sortBy, "desc")
                ->get()
                ->toArray();
            // $results =
            // DB::table("cp_event AS cpe")
            // ->leftJoin(DB::raw("(SELECT SUM(CASE WHEN sjpe.viewed = 1 THEN 1 ELSE 0 END) AS totalViewed,
            //                             SUM(CASE WHEN sjpe.applied = 1 THEN 1 ELSE 0 END) AS totalApplied,
            //                             SUM(CASE WHEN sjpe.favorite = 1 THEN 1 ELSE 0 END) AS totalFavorite,
            //                             SUM(CASE WHEN jpe.id IS NOT NULL THEN 1 ELSE 0 END) AS totalJobPost,
            //                             jpe.cp_id
            //                         FROM jp_event AS jpe
            //                         LEFT JOIN status_job_post_event AS sjpe ON sjpe.job_post_id = jpe.id
            //                         GROUP BY jpe.cp_id) AS jpe"), "jpe.cp_id", "=", "cpe.id")
            // ->leftJoin("booth_event AS be", "be.cp_id", "=", "cpe.id")
            // ->leftJoin("company_user AS cu", "cu.company_id", "=", "cpe.id")
            // ->select("cpe.id AS companyID",
            //             "cpe.name AS companyName",
            //             "cpe.location AS companyLocation",
            //             "cpe.industry AS companyIndustry",
            //             "cu.last_active AS updated_at",
            //             "jpe.totalViewed",
            //             "jpe.totalApplied",
            //             "jpe.totalFavorite",
            //             "jpe.totalJobPost",
            //             "be.booth_no AS boothNumber")
            // ->where("cpe.status_active", 1)
            // ->groupBy("cpe.id")
            // ->orderBy("jpe.".$sortBy, "desc")
            // ->get()
            // ->toArray();
        }

        if(!empty($results))
            return $results;

        return false;
    }

    public function DeleteCompany($companyID)
    {
        $data = array(
            "status_active" => 2
        );

        $resp = DB::table("cp_event")
                ->where("id", $companyID)
                ->update($data);

        return $resp;
    }

    public function GetTotalCompany()
    {
        $user = new User();

        $univID = $user->getUnivID();

        $results =
            DB::table("university_partnership AS up")
            ->join("cp_event AS cpe", "cpe.id", "=", "up.company_id")
            ->select(DB::raw("SUM(CASE WHEN cpe.id IS NOT NULL THEN 1 ELSE 0 END) AS totalCompany"))
            ->where("up.univ_id", $univID)
            ->where("cpe.status_active", 1)
            ->value("totalCompany");

        if(!is_null($results))
            return $results;

        return false;
    }

    private function AddUnivPartnership($companyID, $univID)
    {
        $this->_upID = $this->GenerateUnivPartnershipID();

        $timestamp = date('Y-m-d H:i:s');

        $data =
            array(
                "id" => $this->_upID,
                "company_id" => $companyID,
                "univ_id" => $univID,
                "timestamp" => $timestamp
            );

        $resp =
            DB::table("university_partnership")
            ->insert($data);

        return $resp;
    }

    public function GetBoothNumber()
    {
        $user = new User();

        $univID = $user->getUnivID();

        $eventID = DB::table("university_event")
                ->where("university_id", $univID)
                ->value("id");

        if(!is_null($eventID) && $eventID !== "")
        {
            $resp = DB::table("booth_event AS be")
                    ->join("cp_event AS cpe", "cpe.id", "=", "be.cp_id")
                    ->where("be.event_id", $eventID)
                    ->where("cpe.status_active", 1)
                    ->orderBy("booth_no", "asc")
                    ->pluck("booth_no")
                    ->toArray();

            if(!empty($resp))
                return $resp;

            return false;
        }

        return false;
    }

    public function GetSingleBoothNumber($companyID)
    {
        $resp =
            DB::table("cp_event AS cpe")
            ->join("booth_event AS be", "be.cp_id", "=", "cpe.id")
            ->select('be.booth_no AS boothNumber', 'be.id AS boothID')
            ->where("cpe.id", "=", $companyID)
            ->get()
            ->toArray();

        return $resp;
    }

    public function GetListCompanyBooth()
    {
        $user = new User();

        $univID = $user->getUnivID();

        $eventID =
            DB::table("university_event")
            ->where("university_id", $univID)
            ->value("id");

        if(!is_null($eventID) && $eventID != "")
        {
            $resp =
                DB::table("booth_event AS be")
                ->join("cp_event AS cpe", "cpe.id", "=", "be.cp_id")
                ->select("cpe.name AS companyName", "cpe.image_path AS imagePath", "be.booth_no")
                ->where("event_id", $eventID)
                ->where("cpe.status_active", 1)
                ->orderBy("booth_no", "asc")
                ->get()
                ->toArray();

            if(!empty($resp))
                return $resp;

            return false;
        }

        return false;
    }

    public function AddBoothEvent($companyID, $boothNumber)
    {
        $this->boothID = $this->GenerateBoothID();

        $user = new User();

        $univID = $user->getUnivID();

        $eventID = DB::table("university_event")
                    ->where("university_id", "=", $univID)
                    ->where("status", 1)
                    ->value("id");

        if(!is_null($eventID))
        {

            $data =
                array(
                    "id" => $this->boothID,
                    "event_id" => $eventID,
                    "cp_id" => $companyID,
                    "booth_no" => $boothNumber,
                    "created_at" => date("Y-m-d H:i:s")
                );

            $resp = DB::table("booth_event")
                    ->insert($data);

            return $resp;
        }
        return false;
    }

    public function UpdateBoothEvent($companyID, $boothID, $boothNumber)
    {
        $timestamp = date("Y-m-d H:i:s");

        $data = array(
            "booth_no" => $boothNumber,
            "updated_at" => $timestamp
        );

        $resp = DB::table('booth_event')
                ->where('id', '=', $boothID)
                ->where('cp_id', '=', $companyID)
                ->update($data);

        return $resp;
    }

    public function RegisterAccessCompany($companyID, $username, $password)
    {
        $user = new User();

        $salt = $user->GetSalt();

        $password = $user->hash($password, $salt);

        $registerDate = date("Y-m-d H:i:s");

        $this->_cuID = $this->GenerateCompanyUserID();

        $data = array(
            "id" => $this->_cuID,
            "company_id" => $companyID,
            "username" => $username,
            "password" => $password,
            "salt" => $salt,
            "register_date" => $registerDate,
            "last_active" => "0000-00-00 00:00:00"
        );

        $resp = DB::table("company_user")->insert($data);

        return $resp;
    }

    public function CheckEmail($email)
    {
        $results =
            DB::table('cp_event AS cpe')
            ->join('company_user AS cu', 'cu.company_id', '=', 'cpe.id')
            ->where('email', $email)
            ->orWhere('hr_email', $email)
            ->select('cpe.name', 'cu.username')
            ->get()
            ->toArray();

        if(empty($results))
            return true;

        return false;
    }
}
