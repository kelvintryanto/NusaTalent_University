<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;

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

    //check 02/08/2019 11:54 pindah DB
    public function showStudentDetailPage()
    {

        // $data[] = array();

        // $data['css'] = view('css');
        // $data['js'] = view('js');
        $data['navbar'] = view('includes.navbar');
        // $data['sidebar'] = view('template.sidebar');
        // $data['footer'] = view('template.footer');

        //check this method class
        $data['students'] = $this->_student->getAllStudent();

        return view('pages.allstudent')->with('data', $data);
        // return 'test';
    }
}
