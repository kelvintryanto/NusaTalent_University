<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use DB;
use Session;

class Company extends Model
{
    public $table = 'company_user';
    private $_companyID;
    private $_upID;
    private $_cuID;
    private $_boothID;

    public function __construct()
    {
        date_default_timezone_set("Asia/Bangkok");
        $this->_companyID = $this->GenerateCompanyID();
    }

    public function showListCompany($univID, $sortBy, $adesc, $jobIndustry, $searchCompany)
    {
        if ($jobIndustry == "") $jobIndustry = "%";
        if ($searchCompany == "") $searchCompany = "%";
        else $searchCompany = "%" . strtolower($searchCompany) . "%";
        if ($sortBy == "") $sortBy = "name";

        $result = DB::table('university_partnership as up')
            ->join('company_profile as cp', 'up.company_id', '=', 'cp.id')
            ->leftjoin(DB::raw("(select cp_id, count(cp_id) as amount
                                from job_post
                                where event_id is null
                                group by cp_id) as jp"), "jp.cp_id", "=", "cp.id")
            // company tersebut masih aktif dengan up.status
            ->where([['univ_id', $univID], ['up.status', '1'], ['industry', 'like', $jobIndustry], [strtolower('name'), 'like', $searchCompany]])
            ->select(
                'up.company_id AS company_id',
                'up.univ_id AS univ_id',
                'up.status AS univ_id',
                'up.timestamp AS timestamp',
                'cp.id AS id',
                'cp.name AS name',
                'cp.website AS website',
                'cp.industry AS industry',
                'cp.linkedin AS linkedin',
                'cp.short_desc AS short_desc',
                'cp.employees AS employees',
                'cp.logo_path AS logo_path',
                'cp.created_at AS created_at',
                DB::raw("(CASE WHEN jp.amount is null THEN 0 ELSE jp.amount END) AS amount")
            )
            ->orderBy($sortBy, $adesc)
            ->paginate();

        // dd($result);
        return $result;
    }

    public function retrieveSingleCompany($companyID)
    {
        $result = DB::table("company_profile AS cp")
            ->where("cp.id", $companyID)
            ->leftjoin("cp_location AS cpl", "cpl.cp_id", "=", "cp.id")
            ->select(
                "cp.id AS id",
                "cp.name AS name",
                "cp.website AS website",
                "cp.industry AS industry",
                "cp.linkedin AS linkedin",
                "cp.short_desc AS short_desc",
                "cp.employees AS employees",
                "cp.logo_path AS logo_path",
                "cp.status AS status",
                "cp.created_at AS created_at",
                "cpl.name AS addressName",
                "cpl.address AS address",
                "cpl.country AS country",
                "cpl.subdistrict AS subdistrict",
                "cpl.city_id AS city_id",
                "cpl.province_id AS province_id",
                "cpl.postal_code AS postal_code"
            )
            ->first();

        // dd($result);
        return $result;
    }

    public function retrieveSingleCompanyEvent($companyID)
    {
        $result = $result = DB::table("company_profile_event AS cpe")
            ->where("cpe.id", $companyID)
            ->leftjoin("cp_location_event AS cpl", "cpl.cp_id", "=", "cpe.id")
            ->leftjoin("booth_event as be", "be.cp_id", "=", "cpe.id")
            ->select(
                "cpe.id AS id",
                "cpe.name AS name",
                "cpe.website AS website",
                "cpe.industry AS industry",
                "cpe.linkedin AS linkedin",
                "cpe.short_desc AS short_desc",
                "cpe.employees AS employees",
                "cpe.logo_path AS logo_path",
                "cpe.status AS status",
                "cpe.created_at AS created_at",
                "cpl.name AS addressName",
                "cpl.address AS address",
                "cpl.country AS country",
                "cpl.subdistrict AS subdistrict",
                "cpl.city_id AS city_id",
                "cpl.province_id AS province_id",
                "cpl.postal_code AS postal_code",
                "be.booth_no AS booth_no",
                "be.updated_at AS updated_at"
            )
            ->first();

        return $result;
    }

    public function retrieveIndustry()
    {
        $result = DB::table("m_industry AS industry")
            ->select("id", "description")
            ->orderBy("description")
            ->get();

        return $result;
    }
    public function retrieveTotalEmployees()
    {
        $result = DB::table("total_employees as te")
            ->select("description")
            ->get();

        return $result;
    }

    //jobindustry ini harus dipisah karena adanya paginate
    public function showIndustry($univID)
    {
        $result = DB::table('university_partnership as up')
            ->join('company_profile as cp', 'up.company_id', '=', 'cp.id')
            ->where('univ_id', $univID)
            ->distinct()
            ->select('industry')
            ->get();

        return $result;
    }

    private function GenerateCompanyUserID()
    {
        $cuID = str_random(32);

        $exists = DB::table("company_user")
            ->where("id", $cuID)
            ->first();

        if (!is_null($exists))
            $this->GenerateCompanyUserID();

        return $cuID;
    }

    private function GenerateUnivPartnershipID()
    {
        $partnershipID = str_random(64);
        $exists = DB::table("university_partnership")
            ->where("id", $partnershipID)
            ->first();

        if (!is_null($exists))
            $this->GenerateUnivPartnershipID();

        return $partnershipID;
    }

    private function GenerateCompanyID()
    {
        $companyID = str_random(11);

        $exists = DB::table("company_profile")->where("id", $companyID)->first();
        DB::table("company_profile")->where("id", $companyID)->first();

        if (!is_null($exists))
            $this->GenerateCompanyID();

        return $companyID;
    }

    private function GenerateBoothID()
    {
        $boothID = str_random(11);

        $exists = DB::table("booth_event")
            ->where("id", $boothID)
            ->first();

        if (!is_null($exists))
            $this->GenerateBoothID();

        return $boothID;
    }

    public function GetCompanyID()
    {
        return $this->_companyID;
    }

    public function retrieveDataCompany($univID)
    {
        $result = DB::table("university_partnership AS up")
            ->where("univ_id", $univID)
            ->leftJoin("company_profile AS cp", "cp.id", "=", "up.company_id")
            ->select(
                "cp.name as name",
                "cp.website as website",
                "cp.industry as industry",
                "cp.linkedin as linkedin",
            )
            ->get()
            ->toArray();
        return $result;
    }

    public function AddCompanyEvent(
        $univID,
        $cp_id,
        $companyName,
        $companyWebsite,
        $companyIndustry,
        $companyLinkedin,
        $companyShortdesc,
        $companyEmployees
    ) {
        $createdAt = date('Y-m-d H:i:s');

        $data = array(
            "id"            => $cp_id,
            "name"          => $companyName,
            "website"       => $companyWebsite,
            "industry"      => $companyIndustry,
            "linkedIn"      => $companyLinkedin,
            "short_desc"    => $companyShortdesc,
            "employees"     => $companyEmployees,
            "logo_path"     => null,
            "status"        => 1,
            "created_at"    => $createdAt
        );

        $resp = DB::table('company_profile_event')->insert($data);

        if ($resp) {
            unset($resp);
            $resp = $this->AddUniversityPartnership($cp_id, $univID);

            return $resp;
        }
        return false;
    }

    public function AddUniversityPartnership($companyID, $univID)
    {
        $createdAt = date('Y-m-d H:i:s');

        $data = array(
            'company_id' => $companyID,
            'univ_id' => $univID,
            'status' => 1,
            'timestamp' => $createdAt
        );

        $resp = DB::table('university_partnership')->insert($data);
        return $resp;
    }

    public function AddCompany(
        $companyName,
        $companyWebsite,
        $companyEmail,
        $companyContact,
        $hrName,
        $hrContact,
        $hrEmail,
        $companyAddress,
        $companyLocation,
        $companyIndustry,
        $companyLinkedln,
        $totalEmployee,
        $companyOverview,
        $companyReasons,
        $imagePath
    ) {
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

        $resp = DB::table("career_fair")
            ->insert($data);

        if ($resp) {
            //hapus $resp dan ganti dengan add univ partnership yang baru
            unset($resp);
            $resp = $this->AddUnivPartnership($this->_companyID, $univID);

            return $resp;
        }

        return false;
    }

    public function UpdateCompany(
        $companyName,
        $companyWebsite,
        $companyEmail,
        $companyContact,
        $companyHRName,
        $companyHRContact,
        $companyHREmail,
        $companyAddress,
        $companyLocation,
        $companyIndustry,
        $companyLinkedin,
        $totalEmployee,
        $companyOverview,
        $companyReasons,
        $imagePath,
        $companyID
    ) {
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

        $resp = DB::table("career_fair")
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
    { }

    // rebuild CompanyController@showListCompanyPage 05/08/2019 16:40 table status_job_post_event berubah
    // menjadi 5 table : job_post_applied, job_post_reviewed, job_post_viewed, job_post_favorited, job_post_approval
    public function GetListCompany($sortBy)
    {
        $user = new User();
        $univID = $user->getUnivID();
        if ($sortBy == "") {
            $results =
                DB::table('university_partnership AS up')
                ->join('career_fair AS cf', 'cf.id', '=', 'up.company_id')
                ->leftJoin(DB::raw("(SELECT SUM(CASE WHEN sjpe.viewed = 1 THEN 1 ELSE 0 END) AS totalViewed,
                                        SUM(CASE WHEN sjpe.applied = 1 THEN 1 ELSE 0 END) AS totalApplied,
                                        SUM(CASE WHEN sjpe.favorite = 1 THEN 1 ELSE 0 END) AS totalFavorite,
                                        SUM(CASE WHEN jpe.id IS NOT NULL THEN 1 ELSE 0 END) AS totalJobPost,
                                        jpe.cf_id
                                    FROM jp_event AS jpe
                                    GROUP BY jpe.cf_id) AS jpe"), "jpe.cf_id", "=", "cf.id")
                ->leftJoin("booth_event AS be", "be.event_id", "=", "cf.id")
                // ->leftJoin("company_user AS cu", "cu.cf_id", "=", "cf.id")
                ->select(
                    // "cf.id AS companyID",
                    // "cf.name AS companyName",
                    // "cf.location AS companyLocation",
                    // "cf.industry AS companyIndustry",
                    // "jpe.totalViewed",
                    // "jpe.totalApplied",
                    // "jpe.totalFavorite",
                    // "jpe.totalJobPost",
                    "be.booth_no AS boothNumber"
                )
                ->where('up.univ_id', $univID)
                // ->where("cf.status_active", 1)
                ->groupBy("cf.id")
                // ->orderBy("jpe.totalApplied", "asc")
                ->get()
                ->toArray();
            // $results =
            // DB::table("career_fair AS cf")
            // ->leftJoin(DB::raw("(SELECT SUM(CASE WHEN sjpe.viewed = 1 THEN 1 ELSE 0 END) AS totalViewed,
            //                             SUM(CASE WHEN sjpe.applied = 1 THEN 1 ELSE 0 END) AS totalApplied,
            //                             SUM(CASE WHEN sjpe.favorite = 1 THEN 1 ELSE 0 END) AS totalFavorite,
            //                             SUM(CASE WHEN jpe.id IS NOT NULL THEN 1 ELSE 0 END) AS totalJobPost,
            //                             jpe.cf_id
            //                         FROM jp_event AS jpe

            //                         GROUP BY jpe.cf_id) AS jpe"), "jpe.cf_id", "=", "cf.id")
            // ->leftJoin("booth_event AS be", "be.cf_id", "=", "cf.id")
            // ->leftJoin("company_user AS cu", "cu.cf_id", "=", "cf.id")
            // ->select("cf.id AS companyID",
            //             "cf.name AS companyName",
            // "cf.location AS companyLocation",
            //             "cf.industry AS companyIndustry",
            //
            //             "jpe.totalViewed",
            //             "jpe.totalApplied",
            //             "jpe.totalFavorite",
            //             "jpe.totalJobPost",
            //             "be.booth_no AS boothNumber")
            // ->where("cf.status_active", 1)
            // ->groupBy("cf.id")
            // ->orderBy("jpe.totalApplied", "asc")
            // ->get()
            // ->toArray();
        } else {
            $results =
                DB::table('university_partnership AS up')
                ->join('career_fair AS cf', 'cf.id', '=', 'up.company_id')
                // ->leftJoin(DB::raw("(SELECT SUM(CASE WHEN sjpe.viewed = 1 THEN 1 ELSE 0 END) AS totalViewed,
                //                         SUM(CASE WHEN sjpe.applied = 1 THEN 1 ELSE 0 END) AS totalApplied,
                //                         SUM(CASE WHEN sjpe.favorite = 1 THEN 1 ELSE 0 END) AS totalFavorite,
                //                         SUM(CASE WHEN jpe.id IS NOT NULL THEN 1 ELSE 0 END) AS totalJobPost,
                //                         jpe.cf_id
                //                     FROM jp_event AS jpe
                //                     GROUP BY jpe.cf_id) AS jpe"), "jpe.cf_id", "=", "cf.id")
                ->leftJoin("booth_event AS be", "be.cf_id", "=", "cf.id")
                ->leftJoin("company_user AS cu", "cu.cf_id", "=", "cf.id")
                ->select(
                    "cf.id AS companyID",
                    "cf.name AS companyName",
                    // "cf.location AS companyLocation",
                    // "cf.industry AS companyIndustry",
                    "jpe.totalViewed",
                    "jpe.totalApplied",
                    "jpe.totalFavorite",
                    "jpe.totalJobPost",
                    "be.booth_no AS boothNumber"
                )
                ->where('up.univ_id', $univID)
                // ->where("cf.status_active", 1)
                ->groupBy("cf.id")
                ->orderBy("jpe." . $sortBy, "desc")
                ->get()
                ->toArray();
            // $results =
            // DB::table("career_fair AS cf")
            // ->leftJoin(DB::raw("(SELECT SUM(CASE WHEN sjpe.viewed = 1 THEN 1 ELSE 0 END) AS totalViewed,
            //                             SUM(CASE WHEN sjpe.applied = 1 THEN 1 ELSE 0 END) AS totalApplied,
            //                             SUM(CASE WHEN sjpe.favorite = 1 THEN 1 ELSE 0 END) AS totalFavorite,
            //                             SUM(CASE WHEN jpe.id IS NOT NULL THEN 1 ELSE 0 END) AS totalJobPost,
            //                             jpe.cf_id
            //                         FROM jp_event AS jpe

            //                         GROUP BY jpe.cf_id) AS jpe"), "jpe.cf_id", "=", "cf.id")
            // ->leftJoin("booth_event AS be", "be.cf_id", "=", "cf.id")
            // ->leftJoin("company_user AS cu", "cu.cf_id", "=", "cf.id")
            // ->select("cf.id AS companyID",
            //             "cf.name AS companyName",
            // "cf.location AS companyLocation",
            //             "cf.industry AS companyIndustry",
            //
            //             "jpe.totalViewed",
            //             "jpe.totalApplied",
            //             "jpe.totalFavorite",
            //             "jpe.totalJobPost",
            //             "be.booth_no AS boothNumber")
            // ->where("cf.status_active", 1)
            // ->groupBy("cf.id")
            // ->orderBy("jpe.".$sortBy, "desc")
            // ->get()
            // ->toArray();
        }

        if (!empty($results))
            return $results;

        return false;
    }

    public function DeleteCompany($companyID)
    {
        $data = array(
            "status" => 0
        );

        $resp = DB::table("university_partnership")
            ->where("company_id", $companyID)
            ->update($data);

        return $resp;
    }

    // rechecked this method on 05/08/2019 16:50
    public function GetTotalCompany()
    {
        $user = new User();

        $univID = $user->getUnivID();

        $results =
            DB::table("university_partnership AS up")
            ->join("career_fair AS cf", "cf.id", "=", "up.company_id")
            ->select(DB::raw("SUM(CASE WHEN cf.id IS NOT NULL THEN 1 ELSE 0 END) AS totalCompany"))
            ->where("up.univ_id", $univID)
            // ->where("cf.status_active", 1)
            ->value("totalCompany");

        if (!is_null($results))
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

    // checked 02/08/2019 17:15
    public function GetBoothNumber()
    {
        $user = new User();

        $univID = $user->getUnivID();

        // mengganti table university_event menjadi career_fair beserta kolomnya
        $eventID = DB::table("career_fair")
            ->where("univ_id", $univID)
            ->value("id");


        //jika universitas mempunyai event
        if (!is_null($eventID) && $eventID !== "") {
            $resp = DB::table("booth_event AS be")
                ->join("career_fair AS cf", "cf.id", "=", "be.cf_id")
                ->where("be.event_id", $eventID)
                ->where("cf.status_active", 1)
                ->orderBy("booth_no", "asc")
                ->pluck("booth_no")
                ->toArray();

            if (!empty($resp))
                return $resp;

            return false;
        }

        return false;
    }

    public function GetSingleBoothNumber($companyID)
    {
        $resp =
            DB::table("career_fair AS cf")
            ->join("booth_event AS be", "be.cf_id", "=", "cf.id")
            ->select('be.booth_no AS boothNumber', 'be.id AS boothID')
            ->where("cf.id", "=", $companyID)
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

        if (!is_null($eventID) && $eventID != "") {
            $resp =
                DB::table("booth_event AS be")
                ->join("career_fair AS cf", "cf.id", "=", "be.cf_id")
                ->select("cf.name AS companyName", "cf.image_path AS imagePath", "be.booth_no")
                ->where("event_id", $eventID)
                ->where("cf.status_active", 1)
                ->orderBy("booth_no", "asc")
                ->get()
                ->toArray();

            if (!empty($resp))
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

        if (!is_null($eventID)) {

            $data =
                array(
                    "id" => $this->boothID,
                    "event_id" => $eventID,
                    "cf_id" => $companyID,
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
            ->where('cf_id', '=', $companyID)
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
            DB::table('career_fair AS cf')
            ->join('company_user_event AS cu', 'cu.cf_id', '=', 'cf.id')
            ->where('email', $email)
            ->orWhere('hr_email', $email)
            ->select('cf.name', 'cu.username')
            ->get()
            ->toArray();

        if (empty($results))
            return true;

        return false;
    }
}
