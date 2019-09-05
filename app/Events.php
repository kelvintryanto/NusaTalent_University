<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Company;
use Session;

class Events extends Model
{
    private $_eventID;
    private $_boothEventID;

    public function __construct()
    {
        date_default_timezone_set("Asia/Bangkok");
        $this->_eventID = $this->GenerateEventID();
        $this->_boothEventID = $this->GenerateBoothEventID();
    }

    public function RetrieveCareerFair($univID, $searchEventCompany, $sortBy, $adesc, $statusActive)
    {
        if ($searchEventCompany == "") $searchEventCompany = "%";
        else $searchEventCompany = "%" . strtolower($searchEventCompany) . "%";

        if ($statusActive == "") {
            $results = DB::table("career_fair as cf")
                ->leftJoin(DB::raw('(SELECT event_id,count(*) as company FROM `booth_event`
                        group by event_id) as be'), 'cf.id', '=', 'be.event_id')
                ->where([["univ_id", $univID], [strtolower("name"), "like", $searchEventCompany]])
                ->select("*")
                ->orderBy($sortBy, $adesc)
                ->get();
        } else {
            $results = DB::table("career_fair")
                ->leftJoin(DB::raw('(SELECT event_id,count(*) as company FROM `booth_event`
                        group by event_id) as be'), 'cf.id', '=', 'be.event_id')
                ->where([["univ_id", $univID], [strtolower("name"), "like", $searchEventCompany], ['endDate', $statusActive, date('Y-m-d H:i:s')]])
                ->select("*")
                ->orderBy($sortBy, $adesc)
                ->get();
        }


        if ($results) {
            return $results;
        }

        return false;
    }

    public function RetrieveSingleEvent($eventID)
    {
        $result = DB::table("career_fair")
            ->where('id', $eventID)
            ->select("*")
            ->first();

        return $result;
    }

    private function GenerateEventID()
    {
        $eventID = str_random(11);

        $exists = DB::table("career_fair")->where("id", $eventID)->first();

        if (!is_null($exists))
            $this->GenerateEventID();

        return $eventID;
    }

    private function GenerateBoothEventID()
    {
        $_boothEventID = str_random(11);

        $exists = DB::table("booth_event")->where("id", $_boothEventID)->first();

        if (!is_null($exists))
            $this->GenerateBoothEventID();

        return $_boothEventID;
    }

    public function addEvent(
        $eventName,
        $description,
        $startDate,
        $endDate,
        $capacity,
        $place,
        $univID
    ) {
        $createdAt = date('Y-m-d H:i:s');

        $data = array(
            "id"            => $this->_eventID,
            "name"          => $eventName,
            "startDate"     => $startDate,
            "endDate"       => $endDate,
            "capacity"      => $capacity,
            "place"         => $place,
            "description"   => $description,
            "univ_id"        => $univID,
            "created_at"    => $createdAt
        );

        DB::table('career_fair')
            ->insert($data);
    }

    public function AddCompanyEvent(
        $univID,
        $eventID,
        $cp_id,
        $companyName,
        $boothNum,
        $description,
        $website,
        $numberofEmployees,
        $industry,
        $linkedIn,
        $updatedAt
    ) {
        $createdAt = date('Y-m-d H:i:s');
        $company = new Company();
        $company->AddCompanyEvent(
            $univID,
            $cp_id,
            $companyName,
            $website,
            $industry,
            $linkedIn,
            $description,
            $numberofEmployees
        );

        $this->addBoothEvent(
            $eventID,
            $cp_id,
            $boothNum,
            $createdAt,
            $updatedAt
        );
    }

    public function addBoothEvent(
        $eventID,
        $companyID,
        $boothNo,
        $createdAt,
        $updatedAt
    ) {
        $data = array(
            "id"            => $this->_boothEventID,
            "event_id"      => $eventID,
            "cp_id"         => $companyID,
            "booth_no"      => $boothNo,
            "created_at"    => $createdAt,
            "updated_at"    => $updatedAt
        );

        DB::table('booth_event')
            ->insert($data);
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
