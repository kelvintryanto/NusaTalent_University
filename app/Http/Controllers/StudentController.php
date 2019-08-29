<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use Session;

class StudentController extends Controller
{
    private $_student;
    private $_user;

    private function checkSession()
    {
        $user = new User();

        return $user->checkSession();
    }

    public function __construct()
    {
        $this->_student = new Student;
        $this->_user = new User();
    }

    public function studentDetail($studentID)
    {
        $data[] = array();

        $data['student'] = "";
        return view('pages.allstudent')->with('data', $data);
    }

    //check 02/08/2019 11:54 pindah DB
    public function showStudentDetailPage()
    {
        $data[] = array();

        if ($this->checkSession()) {
            // $data['css'] = view('css');
            // $data['js'] = view('js');
            $data['navbar'] = view('includes.navbar');
            // $data['sidebar'] = view('template.sidebar');
            // $data['footer'] = view('template.footer');

            //check this method class
            $data['students'] = $this->_student->getAllStudent(Session::get('univName'), "", "", "desc", "registerDate", "");
            $data['batch'] = $this->_student->getBatch(Session::get('univName'));
            // dd($data['students']);

            return view('pages.allstudent')->with('data', $data);
        }
        return redirect('/login');
    }

    public function sortListStudent(Request $request)
    {
        $searchStudent = $request['searchStudent'];
        $enrollment = $request['enrollment'];
        $adesc = $request['adesc'];
        $status = $request['status'];
        $filterStudent = $request['filterStudent'];
        $listStudent = $this->_student->getAllStudent(Session::get('univName'), $searchStudent, $enrollment, $adesc, $filterStudent, $status);
        return $listStudent;
    }
}
