<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\User;
use App\Company;

class EventsController extends Controller
{
    public function index()
    {
        // $user = new User();
        // $company = new Company();

        $data[] = array();
        // $data['css'] = view('css');
        // $data['js'] = view('js');
        $data['navbar'] = view('includes.navbar');
        // $data['sidebar'] = view('template.sidebar');
        // $data['footer'] = view('template.footer');

        // $data['boothNumber'] = $company->GetBoothNumber();
        // $data['lstCompanyBooth'] = $company->GetListCompanyBooth();

        return view('pages.event')->with('data', $data);
    }

    public function GetCareerFairSchedule()
    {
        $event = new Events;

        return $event->RetrieveCareerFair();
    }
}
