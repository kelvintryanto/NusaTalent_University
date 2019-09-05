<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\User;
use App\Company;
use Session;

class EventsController extends Controller
{
    private function checkSession()
    {
        $user = new User();

        return $user->checkSession();
    }

    public function index()
    {
        // $user = new User();
        // $company = new Company();
        if ($this->checkSession()) {
            $event = new Events();

            $data[] = array();
            $data['navbar'] = view('includes.navbar');
            // $data['navbarEvent'] = view('includes.navbarEvent');

            $data['eventList'] = $event->RetrieveCareerFair(Session::get('univID'), "", 'startDate', 'asc', "");
            // $data['listCompanyIndustry'] = $company->showIndustry(Session::get('univID'));
            // $data['boothNumber'] = $company->GetBoothNumber();
            // $data['lstCompanyBooth'] = $company->GetListCompanyBooth();

            return view('pages.event')->with('data', $data);
        }

        return redirect('/login');
    }

    public function detailEvent($eventID)
    {
        if ($this->checkSession()) {
            $event = new Events();

            $data[] = array();
            $data['navbar'] = view('includes.navbar');
            $data['eventDetail'] = $event->RetrieveSingleEvent($eventID);

            $data['listCompanyEvent'] = $event->showListCompanyEvent($eventID);
            return view('pages.eventDetail')->with('data', $data);
        }
        return redirect('/login');
    }

    public function editCompanyEvent($companyID)
    {
        $company = new Company();
        if ($this->checkSession()) {
            $data[] = array();
            // $data['js'] = view('js');
            // $data['css'] = view('css');
            $data['navbar'] = view('includes.navbar');
            $data['industry'] = $company->retrieveIndustry();
            $data['totalEmployee'] = $company->retrieveTotalEmployees();
            $data['companyID'] = $companyID;

            return view('pages.editCompanyEvent')->with('data', $data);
        }
        return redirect("/login");
    }

    public function showAddCompanyEvent($id)
    {
        $company = new Company();
        if ($this->checkSession()) {
            $data[] = array();
            // $data['js'] = view('js');
            // $data['css'] = view('css');
            $data['navbar'] = view('includes.navbar');
            $data['industry'] = $company->retrieveIndustry();
            $data['totalEmployee'] = $company->retrieveTotalEmployees();
            $data['eventID'] = $id;

            return view('pages.addCompanyEvent')->with('data', $data);
        }
        return redirect("/login");
    }

    public function addCompanyData(Request $request)
    {
        if ($this->checkSession()) {
            $company = new Company();
            $event = new Events();

            //untuk booth_event table
            $eventID = htmlspecialchars($request->input("eventID"));
            $cp_id = $company->GetCompanyID();
            $companyName = htmlspecialchars($request->input("companyEventName"));
            $boothNum = htmlspecialchars($request->input("boothNo"));

            //untuk company_profile table dan university profile
            $description = htmlspecialchars($request->input("companyEventDesc"));
            $website = htmlspecialchars($request->input("companyWebsiteEvent"));
            $numberofEmployees = htmlspecialchars($request->input("companyWebsiteEvent"));
            $industry = htmlspecialchars($request->input("companyEventIndustry"));
            $linkedIn = htmlspecialchars($request->input("companyEventLinkedIn"));
            $updatedAt = date('Y-m-d H:i:s');

            $resp = $event->AddCompanyEvent(
                Session::get('univID'),
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
            );

            return redirect('/event/' . $eventID);
        }
        return redirect('/login');
    }

    public function sortEventCompany(Request $request)
    {
        if ($this->checkSession()) {
            $searchEventCompany = $request['searchEventCompany'];
            $sortBy = $request['sortByEvent'];
            $adesc = $request['adesc'];
            $statusActive = $request['statusActive'];

            $event = new Events();
            $listEvent = $event->RetrieveCareerFair(Session::get('univID'), $searchEventCompany, $sortBy, $adesc, $statusActive);
            return $listEvent;
        }
        return redirect("/login");
    }

    public function showAddEvent()
    {
        $company = new Company();

        if ($this->checkSession()) {
            $data[] = array();
            // $data['js'] = view('js');
            // $data['css'] = view('css');
            $data['navbar'] = view('includes.navbar');
            $data['industry'] = $company->retrieveIndustry();
            $data['totalEmployee'] = $company->retrieveTotalEmployees();

            return view('pages.addEvent')->with('data', $data);
        }
        return redirect("/login");
    }

    public function showEditEvent($eventID)
    {
        if ($this->checkSession()) {
            $event = new Events();
            $company = new Company();
            $data[] = array();

            $data['eventData'] = $event->RetrieveSingleEvent($eventID);
            $data['navbar'] = view('includes.navbar');
            $data['industry'] = $company->retrieveIndustry();
            $data['totalEmployee'] = $company->retrieveTotalEmployees();
            $data['eventID'] = $eventID;
            return view('pages.editEvent')->with('data', $data);
        }
        return redirect("/login");
    }

    public function editEventData(Request $request)
    {
        if ($this->checkSession()) {
            $eventID        = htmlspecialchars($request->input('eventID'));
            $eventName      = htmlspecialchars($request->input('eventName'));
            $description    = htmlspecialchars($request->input('eventShortDesc'));
            $startDate      = htmlspecialchars($request->input('startDate'));
            $endDate        = htmlspecialchars($request->input('endDate'));
            $capacity       = htmlspecialchars($request->input('capacity'));
            $place          = htmlspecialchars($request->input('place'));
            $univID         = Session::get('univID');

            $event = new Events();
            $event->editEvent(
                $eventID,
                $eventName,
                $description,
                $startDate,
                $endDate,
                $capacity,
                $place,
                $univID
            );
            return redirect('/event');
        }
        return redirect('/login');
    }

    public function EventCompanyPage()
    {
        $company = new Company();

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

    public function addEvent(Request $request)
    {
        if ($this->checkSession()) {
            $eventName      = htmlspecialchars($request->input('eventName'));
            $description    = htmlspecialchars($request->input('eventShortDesc'));
            $startDate      = htmlspecialchars($request->input('startDate'));
            $endDate        = htmlspecialchars($request->input('endDate'));
            $capacity       = htmlspecialchars($request->input('capacity'));
            $place          = htmlspecialchars($request->input('place'));
            $univID         = Session::get('univID');

            $event = new Events();
            $event->addEvent(
                $eventName,
                $description,
                $startDate,
                $endDate,
                $capacity,
                $place,
                $univID
            );
            return redirect('/event');
        }
        return redirect('/login');
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

        // return $event->RetrieveCareerFair();
    }
}
