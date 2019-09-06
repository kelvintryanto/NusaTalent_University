<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Company;
use Session;

class Events extends Model
{
    private $_eventID;

    public function __construct()
    {
        date_default_timezone_set("Asia/Bangkok");
        $this->_eventID = $this->GenerateEventID();
        // $this->_boothEventID = $this->GenerateBoothEventID();
    }

    public function RetrieveCareerFair($univID, $searchEventCompany, $sortBy, $adesc, $statusActive)
    {
        if ($searchEventCompany == "") $searchEventCompany = "%";
        else $searchEventCompany = "%" . strtolower($searchEventCompany) . "%";
        if ($sortBy == "") $sortBy = "date";

        if ($statusActive == "") {
            $results = DB::table("career_fair as cf")
                ->leftJoin(DB::raw('(SELECT event_id,count(*) as company FROM `booth_event`
                        group by event_id) as be'), 'cf.id', '=', 'be.event_id')
                ->where([["univ_id", $univID], [strtolower("name"), "like", $searchEventCompany]])
                ->select("*")
                ->orderBy($sortBy, $adesc)
                ->get();
        } else {
            $results = DB::table("career_fair as cf")
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

    public function editEvent(
        $eventID,
        $eventName,
        $description,
        $startDate,
        $endDate,
        $capacity,
        $place,
        $univ_id
    ) {
        $data = array(
            "id"            => $eventID,
            "name"          => $eventName,
            "startDate"     => $startDate,
            "endDate"       => $endDate,
            "capacity"      => $capacity,
            "place"         => $place,
            "description"   => $description,
            "univ_id"       => $univ_id
        );

        $resp = DB::table('career_fair')
            ->where('id', $eventID)
            ->update($data);
    }
}
