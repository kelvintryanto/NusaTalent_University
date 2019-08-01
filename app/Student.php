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
		$this->_user = new User();
	}

	public function getAllStudent()
	{
		try {
			$results = 
				DB::table('students AS s')
				->join('student_profile AS sp', 'sp.student_id', '=', 's.id')
				->leftJoin('education AS e', 'e.student_id', '=', 's.id')
				->select('sp.student_id AS studentID', 
							DB::raw('CONCAT(sp.first_name, " ", sp.last_name) AS fullName'),
							's.register_date AS registerDate', 'e.name AS universityName')
				->where('s.funnel', 'umn01')
				->groupBy('s.id')
				->orderBy('e.degree_id', 'desc')
				->orderBy('s.register_date', 'desc')
				->get()
				->toArray();

			if(!empty($results))
				return $results;

			return 'FETCH_FAILED';
		}
		catch(Exception $ex)
		{
			return 'ERROR';
		}
	}

	public function getExportDataStudent($name, $univ, $email, $telepon)
	{
		$selectArr = array();

		if($name == 'checked')
		{
			array_push($selectArr, 'sp.first_name AS firstName');
			array_push($selectArr, 'sp.last_name AS lastName');
		}
		if($univ == 'checked'){
			array_push($selectArr, 'e.name AS universityName');
		}
		if($email == 'checked'){
			array_push($selectArr, 's.email AS studentEmail');
		}
		if($telepon == 'checked'){
			array_push($selectArr, 'sp.phone_num AS phoneNumber');
		}

		$resp = 
			DB::table('students AS s')
			->join('student_profile AS sp', 'sp.student_id', '=', 's.id')
			->leftJoin('education AS e', 'e.student_id', '=', 'sp.student_id')
			->select($selectArr)
			->where('s.funnel', 'umn01')
			->groupBy('s.id')
			->orderBy('e.degree_id', 'desc')
			->get()
			->toArray();

		if(!empty($resp))
			return $resp;

		return false;
	}
}
