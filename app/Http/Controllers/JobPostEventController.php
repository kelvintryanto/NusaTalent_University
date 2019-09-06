<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\User;
use App\Company;
use Session;

class JobPostEventController extends Controller
{
    private function checkSession()
    {
        $user = new User();

        return $user->checkSession();
    }

    public function EventJobPage()
    {
        $data[] = array();
        $data['navbar'] = view('includes.navbar');
        $data['navbarEvent'] = view('includes.navbarEvent');

        return view('pages.eventjoblist')->with('data', $data);
    }
}
