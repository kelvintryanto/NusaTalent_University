<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\User;
use App\CompanyEvent;
use App\Company
use Session;

class CompanyEventController extends Controller
{
    private function checkSession()
    {
        $user = new User();

        return $user->checkSession();
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
            $numberofEmployees = htmlspecialchars($request->input("companyEventEmployees"));
            $industry = $request->input("companyEventIndustry");
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

    public function editCompanyData(Request $request)
    {
        $event = new Events();

        $companyID = htmlspecialchars($request->input("companyID"));
        $eventID = $request->input("eventID");
        $companyName = htmlspecialchars($request->input("companyEventName"));
        $boothNum = htmlspecialchars($request->input("boothNo"));

        $description = htmlspecialchars($request->input("companyEventDesc"));
        $website = htmlspecialchars($request->input("companyWebsiteEvent"));
        $numberofEmployees = htmlspecialchars($request->input("companyEventEmployees"));
        $industry = $request->input("companyEventIndustry");
        $linkedIn = htmlspecialchars($request->input("companyEventLinkedIn"));
        $updatedAt = date('Y-m-d H:i:s');

        $resp = $event->EditCompanyEvent(
            $companyID,
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

    public function showEditCompanyEvent($eventID, $companyID)
    {
        if ($this->checkSession()) {
            $company = new Company();

            $data[] = array();
            $data['navbar'] = view('includes.navbar');
            $data['industry'] = $company->retrieveIndustry();
            $data['totalEmployee'] = $company->retrieveTotalEmployees();
            $data['companyData'] = $company->retrieveSingleCompanyEvent($companyID);
            $data['companyID'] = $companyID;
            $data['eventID'] = $eventID;

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
}
