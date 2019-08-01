<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Filesystem\Factory;
use DB;
use Storage;
use Session;
use App\User;

class Dashboard extends Model
{

    /* 
        * Get chart area data per based on giving month
    */

    public function GetChartAreaData($month, $type)
    {
        $results = array();

        $user = new User();
        $select = array();
        $univID = $user->getUnivID();

        switch($type)
        {
            case 'company':
                $query = "(SELECT SUM(CASE WHEN id IS NOT NULL THEN 1 ELSE 0 END) AS totalCompany,
                                        created_at,
                                        id AS companyID
                                FROM cp_event
                                WHERE MONTH(created_at) = ".$month." 
                                    AND status_active = 1
                                GROUP BY CAST(created_at AS DATE)) AS cpe";
                array_push($select, "cpe.totalCompany");
                array_push($select, "cpe.created_at");
                $results['data'] = 
                    DB::table('university_partnership AS up')
                    ->join(DB::raw($query), "cpe.companyID", "=", "up.company_id")
                    ->select($select)
                    ->where("up.univ_id", $univID)
                    ->orderBy("cpe.created_at", "asc")
                    ->get()
                    ->toArray();
                $results['total'] =
                    DB::table('university_partnership AS up')
                    ->join("cp_event AS cpe", "cpe.id", "=", "up.company_id")
                    ->select(DB::raw("SUM(CASE WHEN cpe.id IS NOT NULL THEN 1 ELSE 0 END) AS totalCompany"))
                    ->where('up.univ_id', $univID)
                    ->where('cpe.status_active', 1)
                    ->get()
                    ->toArray();
                break;
            case 'student':
                $query = "(SELECT SUM(CASE WHEN s.id IS NOT NULL THEN 1 ELSE 0 END) AS totalStudent,
                            s.register_date
                            FROM students AS s
                            WHERE s.funnel = 'umn01' AND MONTH(s.register_date) = ".$month."
                            GROUP BY CAST(s.register_date AS DATE)) AS std";
                array_push($select, "std.totalStudent");
                array_push($select, "std.register_date");
                $results['data'] = 
                    DB::table(DB::raw($query))
                    ->select($select)
                    ->orderBy("std.register_date", "asc")
                    ->get()
                    ->toArray();
                $results['total'] = 
                    DB::table('students')
                    ->select(DB::raw('SUM(CASE WHEN id IS NOT NULL THEN 1 ELSE 0 END) AS totalStudent'))
                    ->where(DB::raw('MONTH(register_date)'), $month)
                    ->where('funnel', 'umn01')
                    ->get()
                    ->toArray();
                $results['totalUmn'] = 
                    DB::table('students AS s')
                    ->join("education AS e", "e.student_id", "=", "s.id")
                    ->select(DB::raw('SUM(CASE WHEN s.id IS NOT NULL THEN 1 ELSE 0 END) AS totalStudent'))
                    ->where(DB::raw('MONTH(s.register_date)'), $month)
                    ->where('e.name','Universitas Multimedia Nusantara')
                    ->where('funnel', 'umn01')
                    ->get()
                    ->toArray();
                break;
            default:
                $query = "(SELECT SUM(CASE WHEN jp.id IS NOT NULL THEN 1 ELSE 0 END) AS totalJobPost,
                                    jp.created_at,
                                    cp.id AS companyID
                            FROM cp_event AS cp
                            INNER JOIN jp_event AS jp ON jp.cp_id = cp.id
                            WHERE MONTH(jp.created_at) = ".$month." 
                                AND cp.status_active = 1
                                AND jp.status <> 2
                            GROUP BY CAST(jp.created_at AS DATE)) AS cpe";
                array_push($select, "cpe.totalJobPost");
                array_push($select, "cpe.created_at");
                $results['data'] = 
                    DB::table('university_partnership AS up')
                    ->join(DB::raw($query), "cpe.companyID", "=", "up.company_id")
                    ->select($select)
                    ->where("up.univ_id", $univID)
                    ->orderBy("cpe.created_at", "asc")
                    ->get()
                    ->toArray();
                 $results['total'] = 
                    DB::table('university_partnership AS up')
                    ->join('cp_event AS cpe', 'cpe.id', '=', 'up.company_id')
                    ->join('jp_event AS jpe', 'jpe.cp_id', '=', 'cpe.id')
                    ->select(DB::raw('SUM(CASE WHEN jpe.id IS NOT NULL THEN 1 ELSE 0 END) AS totalJobPost'))
                    ->where('up.univ_id', $univID)
                    ->where('cpe.status_active', 1)
                    ->where('jpe.status', '<>', 2)
                    ->get()
                    ->toArray();
                break;
        }

        return $results;
    }

    // public function GetChartData($startDate, $endDate, $type, $graph)
    // {
    //     $user = new User();

    //     $query = "";
    //     $select = array();
    //     $orderBy = "";

    //     $univID = $user->getUnivID();

    //     $resp = "";

    //     if($graph == "cbCompany")
    //     {
    //         switch ($type) {
    //             case 'weekly':
    //                 $query = "(SELECT SUM(CASE WHEN id IS NOT NULL THEN 1 ELSE 0 END) AS totalCompany,
    //                                     CASE
    //                                             WHEN MONTH(created_at) = 2 THEN WEEK(created_at) - 3
    //                                             WHEN MONTH(created_at) = 3 THEN WEEK(created_at) - 7
    //                                             WHEN MONTH(created_at) = 4 THEN WEEK(created_at) - 11
    //                                             WHEN MONTH(created_at) = 5 THEN WEEK(created_at) - 15
    //                                             WHEN MONTH(created_at) = 6 THEN WEEK(created_at) - 19
    //                                             WHEN MONTH(created_at) = 7 THEN WEEK(created_at) - 23
    //                                             WHEN MONTH(created_at) = 8 THEN WEEK(created_at) - 27
    //                                             WHEN MONTH(created_at) = 9 THEN WEEK(created_at) - 31
    //                                             WHEN MONTH(created_at) = 10 THEN WEEK(created_at) - 35
    //                                             WHEN MONTH(created_at) = 11 THEN WEEK(created_at) - 39
    //                                             WHEN MONTH(created_at) = 12 THEN WEEK(created_at) - 43
    //                                     END AS week,
    //                                     cpe.id AS companyID
    //                             FROM cp_event AS cpe
    //                             WHERE created_at BETWEEN '".$startDate."' AND '".$endDate."%'
    //                             GROUP BY week) AS cpe";
    //                 array_push($select, "cpe.totalCompany");
    //                 array_push($select, "cpe.week");
    //                 $orderBy = "cpe.week";
    //                 break;
    //             case 'monthly':
    //                 $query = "(SELECT SUM(CASE WHEN id IS NOT NULL THEN 1 ELSE 0 END) AS totalCompany,
    //                                     MONTH(created_at) AS month,
    //                                     cpe.id AS companyID
    //                             FROM cp_event AS cpe
    //                             WHERE created_at IS NOT NULL AND created_at BETWEEN '".$startDate."' AND '".$endDate."%'
    //                             GROUP BY month) AS cpe";
    //                 array_push($select, "cpe.totalCompany");
    //                 array_push($select, "cpe.month");
    //                 $orderBy = "cpe.month";
    //                 break;
    //             default:
    //                 $query = "(SELECT cpe.created_at,
    //                                     SUM(CASE WHEN cpe.id IS NOT NULL THEN 1 ELSE 0 END) AS totalCompany,
    //                                     cpe.id AS companyID
    //                                 FROM cp_event AS cpe
    //                                 WHERE cpe.created_at IS NOT NULL AND created_at BETWEEN '".$startDate."' AND '".$endDate."%'
    //                                 GROUP BY CAST(created_at AS DATE)) AS cpe";
    //                 array_push($select, "cpe.created_at");
    //                 array_push($select, "cpe.totalCompany");
    //                 $orderBy = "cpe.created_at";
    //                 break;
    //         }

    //         $resp = DB::table('university_partnership AS up')
    //                 ->join(DB::raw($query), "cpe.companyID", "=", "up.company_id")
    //                 ->select($select)
    //                 ->where("up.univ_id", $univID)
    //                 ->orderBy($orderBy, "asc")
    //                 ->get()
    //                 ->toArray();
    //     }
    //     else
    //     {
    //         switch ($type) {
    //             case 'weekly':
    //                 $query = "(SELECT SUM(CASE WHEN jpe.id IS NOT NULL THEN 1 ELSE 0 END) AS totalJobPost,
    //                             CASE
    //                                 WHEN MONTH(jpe.created_at) = 2 THEN WEEK(jpe.created_at) - 4
    //                                 WHEN MONTH(jpe.created_at) = 3 THEN WEEK(jpe.created_at) - 8
    //                                 WHEN MONTH(jpe.created_at) = 4 THEN WEEK(jpe.created_at) - 12
    //                                 WHEN MONTH(jpe.created_at) = 5 THEN WEEK(jpe.created_at) - 16
    //                                 WHEN MONTH(jpe.created_at) = 6 THEN WEEK(jpe.created_at) - 20
    //                                 WHEN MONTH(jpe.created_at) = 7 THEN WEEK(jpe.created_at) - 24
    //                                 WHEN MONTH(jpe.created_at) = 8 THEN WEEK(jpe.created_at) - 28
    //                                 WHEN MONTH(jpe.created_at) = 9 THEN WEEK(jpe.created_at) - 32
    //                                 WHEN MONTH(jpe.created_at) = 10 THEN WEEK(jpe.created_at) - 36
    //                                 WHEN MONTH(jpe.created_at) = 11 THEN WEEK(jpe.created_at) - 40
    //                                 WHEN MONTH(jpe.created_at) = 12 THEN WEEK(jpe.created_at) - 44
    //                             END as week,
    //                             cpe.id AS companyID
    //                             FROM cp_event AS cpe
    //                             INNER JOIN jp_event AS jpe ON jpe.cp_id = cpe.id
    //                             WHERE jpe.created_at IS NOT NULL AND jpe.created_at BETWEEN '".$startDate."' AND '".$endDate."%'
    //                             GROUP BY week) AS cpe";
    //                 array_push($select, "cpe.totalJobPost");
    //                 array_push($select, "cpe.week");
    //                 $orderBy = "cpe.week";
    //                 break;
    //             case 'monthly':
    //                 $query = "(SELECT SUM(CASE WHEN jpe.id IS NOT NULL THEN 1 ELSE 0 END) AS totalJobPost,
    //                             MONTH(jpe.created_at) AS month, cpe.id AS companyID
    //                             FROM cp_event AS cpe
    //                             INNER JOIN jp_event AS jpe ON jpe.cp_id = cpe.id
    //                             WHERE jpe.created_at IS NOT NULL AND jpe.created_at BETWEEN '".$startDate."' AND '".$endDate."%'
    //                             GROUP BY month) AS cpe";
    //                 array_push($select, "cpe.totalJobPost");
    //                 array_push($select, "cpe.month");
    //                 $orderBy = "cpe.month";
    //                 break;
    //             default:
    //                 $query = "(SELECT jpe.created_at,
    //                                 SUM(CASE WHEN jpe.id IS NOT NULL THEN 1 ELSE 0 END) AS totalJobPost,
    //                                 cpe.id AS companyID
    //                                 FROM cp_event AS cpe
    //                                 INNER JOIN jp_event AS jpe ON jpe.cp_id = cpe.id
    //                                 WHERE jpe.created_at IS NOT NULL AND jpe.created_at BETWEEN '".$startDate."' AND '".$endDate."%'
    //                                 GROUP BY CAST(jpe.created_at AS DATE)) AS cpe";
    //                 array_push($select, "cpe.created_at");
    //                 array_push($select, "cpe.totalJobPost");
    //                 $orderBy = "cpe.created_at";
    //                 break;
    //         }

    //         $resp = DB::table("university_partnership AS up")
    //                 ->join(DB::raw($query), "cpe.companyID", "=", "up.company_id")
    //                 ->select($select)
    //                 ->where("up.univ_id", $univID)
    //                 ->orderBy($orderBy, "asc")
    //                 ->get()
    //                 ->toArray();
    //     }
        

    //     return $resp;
    // }

    public function GetViewedAndApplied()
    {
        $companyID = Session::get("cID");

        $results = DB::table("status_job_post AS sjp")
                    ->join("students AS s", "s.id", "=", "sjp.student_id")
                    ->join("student_profile AS sp", "sp.student_id", "=", "sjp.student_id")
                    ->join("job_postings AS jp", "jp.jp_id", "=", "sjp.job_post_id")
                    ->select(DB::raw("SUM(CASE WHEN sjp.applied = 1 THEN 1 ELSE 0 END) AS totalApplied"),
                                DB::raw("SUM(CASE WHEN sjp.viewed = 1 THEN 1 ELSE 0 END) AS totalViewed"))
                    ->where("s.role", "NOT LIKE", "nusatalent")
                    ->where("jp.company_id", $companyID)
                    ->where("sp.approved", 1)
                    ->get()
                    ->toArray();

        return $results;
    }

    public function GetTopJobPost()
    {
        $companyID = Session::get("cID");

        $results = DB::table("status_job_post AS sjp")
                    ->join("students AS s", "s.id", "=", "sjp.student_id")
                    ->join("student_profile AS sp", "sp.student_id", "=", "sjp.student_id")
                    ->join("job_postings AS jp", "jp.jp_id", "=", "sjp.job_post_id")
                    ->select("jp.jp_job_position AS jobPosition",
                                DB::raw("SUM(CASE WHEN sjp.applied = 1 THEN 1 ELSE 0 END) AS totalApplied"))
                    ->where("s.role", "NOT LIKE", "nusatalent")
                    ->where("sp.approved", 1)
                    ->where("jp.status", 1)
                    ->where("jp.company_id", $companyID)
                    ->groupBy("sjp.job_post_id")
                    ->orderBy("totalApplied", "DESC")
                    ->limit(5)
                    ->get()
                    ->toArray();

        return $results;
    }

    public function GetTopStudents()
    {
        $companyID = Session::get("cID");

        $results = DB::table("status_job_post AS sjp")
                    ->join("students AS s", "s.id", "=", "sjp.student_id")
                    ->join("student_profile AS sp", "sp.student_id", "=", "sjp.student_id")
                    ->join("education AS e", "e.student_id", "=", "sjp.student_id")
                    ->join("job_postings AS jp", "jp.jp_id", "=", "sjp.job_post_id")
                    ->select("e.name AS universityName",
                                DB::raw("SUM(CASE WHEN sjp.applied = 1 THEN 1 ELSE 0 END) AS totalApplied"))
                    ->where("jp.company_id", $companyID)
                    ->where("jp.status", 1)
                    ->where("s.role", "NOT LIKE", "nusatalent")
                    ->where("sjp.applied", 1)
                    ->groupBy("universityName")
                    ->orderBy("totalApplied", "DESC")
                    ->limit(5)
                    ->get()
                    ->toArray();

        return $results;
    }

    public function LoadTalent()
    {
        $companyID = Session::get('cID');
        $results = DB::table("job_postings AS jp")
                    ->join("status_job_post AS sjp", "sjp.job_post_id", "=", "jp.jp_id")
                    ->join("student_profile AS sp", "sp.student_id", "=", "sjp.student_id")
                    ->select("sjp.student_id", "sjp.reviewed", "sjp.hired", "sjp.rejected")
                    ->where("sjp.applied", 1)
                    ->where("sp.approved", 1)
                    ->where("jp.company_id", $companyID)
                    ->orderBy("student_id", "asc")
                    ->get()
                    ->toArray();

        return $results;
    }

    public function UpdateTalentStatus($studentID, $status)
    {
        $id = str_random(64);
        $companyID = Session::get('cID');
        $studentID = $studentID;
        $status = $status;
        $timestamp = date('Y-m-d H:i:s');

        $data = array(
            "id" => $id,
            "company_id" => $companyID,
            "student_id" => $studentID,
            "status" => $status,
            "timestamp" => $timestamp
        );

        $resp = DB::table("talent_status")
                    ->insert($data);

        return $resp;
    }

    public function RetrieveDataAWS()
    {
        $disk = Storage::disk('s3');

        $exists = Storage::disk('s3')->url("students/answer/7ef0f01e95eba239ba3d8399a89090b0c442b76a508c3605b920f76a883eadb9.3gp");
        return $exists;
        // if($exists)
        // {
        //     return $disk->url("7ef0f01e95eba239ba3d8399a89090b0c442b76a508c3605b920f76a883eadb9.3gp")->getUri();
        // }
    }

    public function GetJobPostAnswer($jobPostID, $studentID)
    {
        $disk = Storage::disk('s3');

        $results = DB::table("interview_answer")
                    ->select("question_id as questionID", "answer_file as answerFile")
                    ->where("job_post_id", $jobPostID)
                    ->where("student_id", $studentID)
                    ->get()
                    ->toArray();

        $data = array();

        foreach($results as $row)
        {
            $resp = DB::table("interview_question")
                    ->select("question")
                    ->where("id", $row->questionID)
                    ->value("question");
            if(!is_null($resp) && !empty($resp))
            {
                $arr = array(
                    "questionName" => $resp,
                    "questionAnswer" => $disk->url("students/answer/".$row->answerFile)
                );
                array_push($data, $arr);
            }
        }

        return $data;
    }

    
}
