<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use DB;

class Student extends Model
{
    private $_user;

    public function __construct()
    {
        date_default_timezone_set("Asia/Bangkok");
        $this->_user = new User();
    }

    // checked 02/08/2019 16:35
    // table student diganti menjadi student_user
    // menampilkan student berdasarkan nama univ
    public function getAllStudent($univName, $searchStudent, $enrollment, $adesc, $filterStudent, $status)
    {
        if ($searchStudent == "") $searchStudent = "%";
        else $searchStudent = "%" . strtolower($searchStudent) . "%";

        if ($enrollment == "") {
            if ($status == "") {
                // dd("status=" . $status);
                $result =
                    DB::table('student_user AS s')
                    ->join('student_profile AS sp', 'sp.su_id', '=', 's.id')
                    ->leftJoin('education AS e', 'e.su_id', '=', 's.id')
                    ->leftJoin('work AS w', 'w.su_id', '=', 's.id')
                    ->leftJoin(DB::raw("(select su_id, max(end_period) as lastwork, max(current) as currently  from work
                    group by su_id
                    order by su_id desc) as mp"), "mp.su_id", "=", "s.id")
                    ->where([[strtolower('e.name'), 'like', $univName], [strtolower('full_name'), 'like', $searchStudent]])
                    ->select(
                        'sp.su_id AS studentID',
                        'sp.full_name AS fullName',
                        's.created_at AS registerDate',
                        'e.name AS universityName',
                        'sp.address AS address',
                        'e.major AS major',
                        'e.start_period AS start',
                        'e.end_period AS end',
                        's.phone_number AS phone',
                        's.email AS email',
                        'sp.linkedin AS linkedin',
                        'mp.lastwork AS lastDate',
                        'mp.currently AS currently'
                    )
                    ->groupBy('s.id')
                    ->orderBy($filterStudent, $adesc)
                    ->orderBy('e.degree', 'desc')
                    ->orderBy('s.created_at', 'desc')
                    ->paginate(100);
            } else if ($status == "never") {
                // dd("status=" . $status);
                $result =
                    DB::table('student_user AS s')
                    ->join('student_profile AS sp', 'sp.su_id', '=', 's.id')
                    ->leftJoin('education AS e', 'e.su_id', '=', 's.id')
                    ->leftJoin('work AS w', 'w.su_id', '=', 's.id')
                    ->leftJoin(DB::raw("(select su_id, max(end_period) as lastwork, max(current) as currently from work
                    group by su_id
                    order by su_id desc) as mp"), "mp.su_id", "=", "s.id")
                    ->where([[strtolower('e.name'), 'like', $univName], [strtolower('full_name'), 'like', $searchStudent], ['mp.currently', null]])
                    ->select(
                        'sp.su_id AS studentID',
                        'sp.full_name AS fullName',
                        's.created_at AS registerDate',
                        'e.name AS universityName',
                        'sp.address AS address',
                        'e.major AS major',
                        'e.start_period AS start',
                        'e.end_period AS end',
                        's.phone_number AS phone',
                        's.email AS email',
                        'sp.linkedin AS linkedin',
                        'mp.lastwork AS lastDate',
                        'mp.currently AS currently'
                    )
                    ->groupBy('s.id')
                    ->orderBy($filterStudent, $adesc)
                    ->orderBy('e.degree', 'desc')
                    ->orderBy('s.created_at', 'desc')
                    ->paginate(100);
            } else if ($status == '1' || $status == '0') {
                // dd("status=" . $status);
                $result =
                    DB::table('student_user AS s')
                    ->join('student_profile AS sp', 'sp.su_id', '=', 's.id')
                    ->leftJoin('education AS e', 'e.su_id', '=', 's.id')
                    ->leftJoin('work AS w', 'w.su_id', '=', 's.id')
                    ->leftJoin(DB::raw("(select su_id, max(end_period) as lastwork, max(current) as currently from work
                    group by su_id
                    order by su_id desc) as mp"), "mp.su_id", "=", "s.id")
                    ->where([[strtolower('e.name'), 'like', $univName], [strtolower('full_name'), 'like', $searchStudent], ['mp.currently', $status]])
                    ->select(
                        'sp.su_id AS studentID',
                        'sp.full_name AS fullName',
                        's.created_at AS registerDate',
                        'e.name AS universityName',
                        'sp.address AS address',
                        'e.major AS major',
                        'e.start_period AS start',
                        'e.end_period AS end',
                        's.phone_number AS phone',
                        's.email AS email',
                        'sp.linkedin AS linkedin',
                        'mp.lastwork AS lastDate',
                        'mp.currently AS currently'
                    )
                    ->groupBy('s.id')
                    ->orderBy($filterStudent, $adesc)
                    ->orderBy('e.degree', 'desc')
                    ->orderBy('s.created_at', 'desc')
                    ->paginate(100);
            }
        } else {
            if ($status == "") {
                // dd("status=" . $status);
                $result =
                    DB::table('student_user AS s')
                    ->join('student_profile AS sp', 'sp.su_id', '=', 's.id')
                    ->leftJoin('education AS e', 'e.su_id', '=', 's.id')
                    ->leftJoin('work AS w', 'w.su_id', '=', 's.id')
                    ->leftJoin(DB::raw("(select su_id, max(end_period) as lastwork, max(current) as currently from work
                    group by su_id
                    order by su_id desc) as mp"), "mp.su_id", "=", "s.id")
                    ->where([[strtolower('e.name'), 'like', $univName], [strtolower('full_name'), 'like', $searchStudent]])
                    ->select(
                        'sp.su_id AS studentID',
                        'sp.full_name AS fullName',
                        's.created_at AS registerDate',
                        'e.name AS universityName',
                        'sp.address AS address',
                        'e.major AS major',
                        'e.start_period AS start',
                        'e.end_period AS end',
                        's.phone_number AS phone',
                        's.email AS email',
                        'sp.linkedin AS linkedin',
                        'mp.lastwork AS lastDate',
                        'mp.currently AS currently'
                    )
                    ->groupBy('s.id')
                    ->orderBy($filterStudent, $adesc)
                    ->orderBy('e.degree', 'desc')
                    ->orderBy('s.created_at', 'desc')
                    ->paginate(100);
            } else if ($status == "never") {
                // dd("status=" . $status);
                $result =
                    DB::table('student_user AS s')
                    ->join('student_profile AS sp', 'sp.su_id', '=', 's.id')
                    ->leftJoin('education AS e', 'e.su_id', '=', 's.id')
                    ->leftJoin('work AS w', 'w.su_id', '=', 's.id')
                    ->leftJoin(DB::raw("(select su_id, max(end_period) as lastwork, max(current) as currently from work
                    group by su_id
                    order by su_id desc) as mp"), "mp.su_id", "=", "s.id")
                    ->where([[strtolower('e.name'), 'like', $univName], [strtolower('full_name'), 'like', $searchStudent], ['mp.currently', null]])
                    ->select(
                        'sp.su_id AS studentID',
                        'sp.full_name AS fullName',
                        's.created_at AS registerDate',
                        'e.name AS universityName',
                        'sp.address AS address',
                        'e.major AS major',
                        'e.start_period AS start',
                        'e.end_period AS end',
                        's.phone_number AS phone',
                        's.email AS email',
                        'sp.linkedin AS linkedin',
                        'mp.lastwork AS lastDate',
                        'mp.currently AS currently'
                    )
                    ->groupBy('s.id')
                    ->orderBy($filterStudent, $adesc)
                    ->orderBy('e.degree', 'desc')
                    ->orderBy('s.created_at', 'desc')
                    ->paginate(100);
            } else if ($status == '1' || $status == '0') {
                // dd("status=" . $status);
                $result =
                    DB::table('student_user AS s')
                    ->join('student_profile AS sp', 'sp.su_id', '=', 's.id')
                    ->leftJoin('education AS e', 'e.su_id', '=', 's.id')
                    ->leftJoin('work AS w', 'w.su_id', '=', 's.id')
                    ->leftJoin(DB::raw("(select su_id, max(end_period) as lastwork, max(current) as currently from work
                    group by su_id
                    order by su_id desc) as mp"), "mp.su_id", "=", "s.id")
                    ->where([[strtolower('e.name'), 'like', $univName], [strtolower('full_name'), 'like', $searchStudent], ['mp.currently', $status]])
                    ->select(
                        'sp.su_id AS studentID',
                        'sp.full_name AS fullName',
                        's.created_at AS registerDate',
                        'e.name AS universityName',
                        'sp.address AS address',
                        'e.major AS major',
                        'e.start_period AS start',
                        'e.end_period AS end',
                        's.phone_number AS phone',
                        's.email AS email',
                        'sp.linkedin AS linkedin',
                        'mp.lastwork AS lastDate',
                        'mp.currently AS currently'
                    )
                    ->groupBy('s.id')
                    ->orderBy($filterStudent, $adesc)
                    ->orderBy('e.degree', 'desc')
                    ->orderBy('s.created_at', 'desc')
                    ->paginate(100);
            }
        }

        // dd($result);
        return $result;
    }

    public function getBatch($univName)
    {
        // dd(Session::get("univName"));
        try {
            $results =
                DB::table('student_user AS s')
                ->join('student_profile AS sp', 'sp.su_id', '=', 's.id')
                ->leftJoin('education AS e', 'e.su_id', '=', 's.id')
                ->distinct()
                ->select(
                    'e.start_period AS enrollment'
                )
                ->where(strtolower('e.name'), 'like', $univName)
                ->groupBy('s.id')
                ->orderBy('e.degree', 'desc')
                ->orderBy('s.created_at', 'desc')
                ->get();
            // ->toArray();

            // dd($results);
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
