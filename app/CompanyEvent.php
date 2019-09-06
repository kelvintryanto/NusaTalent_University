<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use DB;
use Session;

class CompanyEvent extends Model
{
    public function EditCompanyEvent(
        $companyID,
        $companyName,
        $boothNum,
        $description,
        $website,
        $numberofEmployees,
        $industry,
        $linkedIn,
        $updatedAt
    ) {
        $data = array(
            "name"          => $companyName,
            "website"       => $website,
            "industry"      => $industry,
            "linkedin"      => $linkedIn,
            "short_desc"    => $description,
            "employees"     => $numberofEmployees,
            "logo_path"     => null,
            "status"        => 1
        );

        DB::table('company_profile_event as cpe')
            ->where('id', $companyID)
            ->update($data);

        $dataBE = array(
            "booth_no"   => $boothNum,
            "updated_at" => $updatedAt
        );

        DB::table('booth_event')
            ->where('cp_id', $companyID)
            ->update($dataBE);
    }

    public function showListCompanyEvent($eventID)
    {
        $result = DB::table("booth_event AS be")
            ->leftJoin('company_profile_event AS cp', 'cp.id', '=', 'be.cp_id')
            ->leftjoin(DB::raw("(select cp_id, count(cp_id) as amount
                                from job_post_event
                                where event_id is null
                                group by cp_id) as jp"), "jp.cp_id", "=", "cp.id")
            ->where("event_id", $eventID)
            ->select("*")
            ->get();

        // dd($result);

        return $result;
    }
}
