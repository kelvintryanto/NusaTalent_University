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
        $data['navbar'] = view('includes.navbar');
        $data['navbarEvent'] = view('includes.navbarEvent');

        // $data['boothNumber'] = $company->GetBoothNumber();
        // $data['lstCompanyBooth'] = $company->GetListCompanyBooth();

        return view('pages.event')->with('data', $data);
    }

    public function EventCompanyPage()
    {
        // $user = new User();
        // $company = new Company();

        $data[] = array();
        $data['navbar'] = view('includes.navbar');
        $data['navbarEvent'] = view('includes.navbarEvent');

        // $data['boothNumber'] = $company->GetBoothNumber();
        // $data['lstCompanyBooth'] = $company->GetListCompanyBooth();

        return view('pages.eventcompanylist')->with('data', $data);
    }

    public function EventJobPage()
    {
        // $user = new User();
        // $company = new Company();

        $data[] = array();
        $data['navbar'] = view('includes.navbar');
        $data['navbarEvent'] = view('includes.navbarEvent');

        // $data['boothNumber'] = $company->GetBoothNumber();
        // $data['lstCompanyBooth'] = $company->GetListCompanyBooth();

        return view('pages.eventjoblist')->with('data', $data);
    }

    public function EventVisitorPage()
    {
        // $user = new User();
        // $company = new Company();

        $data[] = array();
        $data['navbar'] = view('includes.navbar');
        $data['navbarEvent'] = view('includes.navbarEvent');

        // $data['boothNumber'] = $company->GetBoothNumber();
        // $data['lstCompanyBooth'] = $company->GetListCompanyBooth();

        return view('pages.eventvisitorlist')->with('data', $data);
    }

    public function GetCareerFairSchedule()
    {
        $event = new Events;

        return $event->RetrieveCareerFair();
    }
}
