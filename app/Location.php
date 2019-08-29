<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;

class Location extends Model
{
    public function retrieveCity($provinceID)
    {
        $result = DB::table('city as c')
            ->where('province_id', $provinceID)
            ->select("*")
            ->get();

        return $result;
    }

    public function retrieveProvince()
    {
        $result = DB::table('province as p')
            ->select('*')
            ->get();

        return $result;
    }
}
