<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use DB;
use Session;

class BoothEvent extends Model
{
    private $_boothEventID;

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

    private function GenerateBoothEventID()
    {
        $_boothEventID = str_random(11);

        $exists = DB::table("booth_event")->where("id", $_boothEventID)->first();

        if (!is_null($exists))
            $this->GenerateBoothEventID();

        return $_boothEventID;
    }
}
