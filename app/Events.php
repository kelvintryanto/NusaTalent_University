<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class Events extends Model
{
 	public function RetrieveCareerFair()
    {
        $results = DB::table("career_fair")
                        ->select("FairID", "FairName", "FairStartDate", "FairEndDate", "FairDetails")
                        ->get()
                        ->toArray();

        $data = array();

        foreach($results as $row)
        {
            $arr = array(
                "id" => $row->FairID."&".$row->FairDetails,
                "title" => $row->FairName,
                "start" => $row->FairStartDate,
                "end" => $row->FairEndDate
            );

            array_push($data, $arr);
        }

        return json_encode($data);
    }
}
