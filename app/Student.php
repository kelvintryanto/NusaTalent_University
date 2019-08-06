<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use DB;
use Session;

class Student extends Model
{
    private $_user;

    public function __construct()
    {
        $this->_user = new User();
    }

    // checked 02/08/2019 16:35
    // table student diganti menjadi student_user
    // menampilkan student berdasarkan nama univ
    public function getAllStudent()
    {
        // dd(Session::get("univName"));
        try {
            $results =
                DB::table('student_user AS s')
                ->join('student_profile AS sp', 'sp.su_id', '=', 's.id')
                ->leftJoin('education AS e', 'e.su_id', '=', 's.id')
                ->select(
                    'sp.su_id AS studentID',
                    DB::raw('sp.full_name AS fullName'),
                    's.created_at AS registerDate',
                    'e.name AS universityName'
                )
                ->where('e.name', 'like', Session::get("univName"))
                ->groupBy('s.id')
                ->orderBy('e.degree', 'desc')
                ->orderBy('s.created_at', 'desc')
                ->get()
                ->toArray();

            if (!empty($results))
                return $results;

            return 'FETCH_FAILED';
        } catch (Exception $ex) {
            return 'ERROR';
        }
    }

    public function getExportDataStudent($name, $univ, $email, $telepon)
    {
        $selectArr = array();

        if ($name == 'checked') {
            array_push($selectArr, 'sp.first_name AS firstName');
            array_push($selectArr, 'sp.last_name AS lastName');
        }
        if ($univ == 'checked') {
            array_push($selectArr, 'e.name AS universityName');
        }
        if ($email == 'checked') {
            array_push($selectArr, 's.email AS studentEmail');
        }
        if ($telepon == 'checked') {
            array_push($selectArr, 'sp.phone_num AS phoneNumber');
        }

        $resp =
            DB::table('student_user AS s')
            ->join('student_profile AS sp', 'sp.su_id', '=', 's.id')
            ->leftJoin('education AS e', 'e.su_id', '=', 'sp.su_id')
            ->select($selectArr)
            ->where('s.funnel', 'umn01')
            ->groupBy('s.id')
            ->orderBy('e.degree_id', 'desc')
            ->get()
            ->toArray();

        if (!empty($resp))
            return $resp;

        return false;
    }
}
