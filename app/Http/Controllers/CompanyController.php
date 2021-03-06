<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Company;
use App\Dashboard;
use App\Location;
// use App\Talents;
use App\User;
use Session;
use Validator;
use function GuzzleHttp\Promise\all;

class CompanyController extends Controller
{
    private function checkSession()
    {
        $user = new User();

        return $user->checkSession();
    }

    public function showListCompanyPage()
    {
        // $user = new User();
        $company = new Company();
        if ($this->checkSession()) {
            $data[] = array();
            $data['navbar'] = view('includes.navbar');

            $data['listCompany'] = $company->showListCompany(Session::get('univID'), "", "asc", "", "");
            $data['listCompanyIndustry'] = $company->showIndustry(Session::get('univID'));
            // $data['totalCompany'] = $company->GetTotalCompany();
            return view('pages.companylist')->with('data', $data);
        }
        return redirect("/login");
    }

    public function sortListCompany(Request $request)
    {
        $company = new Company();

        $sortBy = $request['sortBy'];
        $adesc = $request['ordered'];
        $jobIndustry = $request['jobIndustry'];
        $searchCompany = $request['searchCompany'];

        if ($this->checkSession()) {
            // $data[] = array();
            // $data['navbar'] = view('includes.navbar');

            $listCompany = $company->showListCompany(Session::get('univID'), $sortBy, $adesc, $jobIndustry, $searchCompany);
            // $data['listCompanyIndustry'] = $company->showIndustry(Session::get('univID'));
            return $listCompany;
        }
        return redirect("/login");
    }

    public function deleteCompany($companyID)
    {
        $company = new Company();
        $company->DeleteCompany($companyID);

        return redirect('/company');
    }

    public function showEditCompanyProfilePage($companyID)
    {
        $company = new Company();

        if ($this->checkSession()) {
            $data[] = array();

            $data['navbar'] = view('includes.navbar');
            $data['companyData'] = $company->retrieveSingleCompany($companyID);
            // $data['city'] = $location->retrieveCity();
            // $data['province'] = $location->retrieveProvince();
            $data['industry'] = $company->retrieveIndustry();
            // dd($data['companyData'][0]->name);
            // $data['boothNumber'] = $company->GetSingleBoothNumber($companyID);
            // $data['companyID'] = $companyID;
            return view('pages.editcompany')->with('data', $data);
        }

        return redirect("/login");
    }

    public function showAddCompanyPage()
    {
        $company = new Company();

        if ($this->checkSession()) {
            $data[] = array();
            // $data['js'] = view('js');
            // $data['css'] = view('css');
            $data['navbar'] = view('includes.navbar');
            $data['industry'] = $company->retrieveIndustry();
            $data['totalEmployee'] = $company->retrieveTotalEmployees();

            return view('pages.addcompany')->with('data', $data);
        }
        return redirect("/login");
    }

    public function showDetailCompanyProfilePage($companyID)
    {
        $company = new Company();
        if ($this->checkSession()) {
            $data[] = array();

            $data['navbar'] = view('includes.navbar');
            $data['companyData'] = $company->retrieveSingleCompany($companyID);

            return view('pages.companydetail')->with('data', $data);
        }
        return redirect("/login");
    }

    // 13/08/2019

    public function showListCompanyPartnership()
    {
        if ($this->checkSession()) {
            $company = new Company;
            $data_company = $company->RetrieveDataCompany(Session::get('univID'));

            $data[] = array();
            $data['js'] = view('js');
            $data['navbar'] = view('includes.navbar');

            $data['companyData'] = $data_company;
            return view('company.index')->with('data', $data);
        }

        return redirect("/login");
    }

    public function CheckEmail()
    {
        $email = $_POST['email'];

        $company = new Company();

        $resp = $company->CheckEmail($email);

        echo $resp;
    }

    public function ChangePasswordPage()
    {
        $data[] = array();

        $data['css'] = view('css');
        $data['js'] = view('js');
        $data['navbar'] = view('template.navbar');
        $data['sidebar'] = view('template.sidebar');
        $data['footer'] = view('template.footer');

        return view('change-password')->with('data', $data);
    }

    public function showCompanyProfilePage()
    {
        if ($this->checkSession()) {
            $company = new Company;
            $data_company = $company->retrieveDataCompany("");

            $data[] = array();
            $data['css'] = view('css');
            $data['js'] = view('js');
            $data['navbar'] = view('template.navbar')->with('data', $data_company);
            $data['sidebar'] = view('template.sidebar');
            $data['footer'] = view('template.footer');

            $data['companyData'] = $data_company;
            return view('pages.companylist')->with('data', $data);
        }

        return redirect("/login");
    }



    public function ChangePassword()
    {
        $oldPassword = htmlspecialchars(Input::get("txtOldPassword"));
        $newPassword = htmlspecialchars(Input::get("txtNewPassword"));
        $retypePassword = htmlspecialchars(Input::get("txtRetypePassword"));

        $dashboard = new Dashboard();

        if ($newPassword === $retypePassword) {
            $resp = $dashboard->ChangePassword($oldPassword, $newPassword);

            if ($resp)
                return redirect("/resetpassword")->with("success", "Successfully change password");
            else
                return redirect("/resetpassword")->with("failed", "Old password is not correct");
        } else {
            return redirect("/resetpassword")->with("failed", "New passwords do not match");
        }
    }

    public function AddCompanyRegular(Request $request)
    {
        // dd($request->companyEmployees);
        if ($this->checkSession()) {
            $companyName        = htmlspecialchars($request->input("companyName"));
            $companyWebsite     = htmlspecialchars($request->input("companyWebsite"));
            $companyIndustry    = htmlspecialchars($request->input("companyIndustry"));
            $companyLinkedin    = htmlspecialchars($request->input("companyLinkedin"));
            $companyShortdesc   = htmlspecialchars($request->input("companyShortdesc"));
            $companyEmployees   = htmlspecialchars($request->companyEmployees);

            $company = new Company();
            // $companyID = $company->GetCompanyID();
            $univID = Session::get('univID');
            $company->addCompanyRegular(
                $univID,
                $companyName,
                $companyWebsite,
                $companyIndustry,
                $companyLinkedin,
                $companyShortdesc,
                $companyEmployees
            );

            return redirect('/company');
        }
        return redirect('/login');
    }

    public function AddCompany(Request $request)
    {

        $image = $request->file("uploadImage");

        $boothNumber       = htmlspecialchars(Input::get("cbBooth"));
        $companyName       = htmlspecialchars(Input::get('txtCompanyName'));
        $companyEmail      = htmlspecialchars(Input::get('txtCompanyEmail'));
        $companyContact    = htmlspecialchars(Input::get('txtCompanyContact'));
        $companyWebsite    = htmlspecialchars(Input::get('txtCompanyWebsite'));
        $companyLocation   = htmlspecialchars(Input::get('txtCompanyLocation'));
        $companyIndustry   = htmlspecialchars(Input::get('txtCompanyIndustry'));
        $companyLinkedin   = htmlspecialchars(Input::get('txtCompanyLinkedln'));

        $companyHRName     = htmlspecialchars(Input::get('txtCompanyHRName'));
        $companyHRContact  = htmlspecialchars(Input::get('txtCompanyHRContact'));
        $companyHREmail    = htmlspecialchars(Input::get('txtCompanyHREmail'));
        $companyHRPassword = htmlspecialchars(Input::get('txtCompanyHRPassword'));

        $totalEmployee     = htmlspecialchars(Input::get('cbTotalEmployee'));
        $companyAddress    = htmlspecialchars(Input::get('txtCompanyAddress'));
        $companyOverview   = htmlspecialchars(Input::get('txtCompanyDescription'));
        $companyReasons    = htmlspecialchars(Input::get('txtCompanyReasons'));

        $company = new Company();

        $companyID = $company->GetCompanyID();

        $imagePath = $companyID . "_" . rand() . "." . $image->getClientOriginalExtension();

        $resp = $company->AddCompany(
            $companyName,
            $companyWebsite,
            $companyEmail,
            $companyContact,
            $companyHRName,
            $companyHRContact,
            $companyHREmail,
            $companyAddress,
            $companyLocation,
            $companyIndustry,
            $companyLinkedin,
            $totalEmployee,
            $companyOverview,
            $companyReasons,
            $imagePath
        );

        if ($resp) {

            $resp = $company->RegisterAccessCompany($companyID, $companyHREmail, $companyHRPassword);

            if ($resp) {
                $resp = $company->AddBoothEvent($companyID, $boothNumber);

                $filePath = 'companies/photo/' . $imagePath;

                Storage::disk('s3')->put($filePath, file_get_contents($image));

                return json_encode($resp);
            }

            return json_encode(false);
        }

        return json_encode(false);
    }

    public function updateProfile(Request $request)
    {
        $image             = $request->file("uploadImage");

        $imagePath         = Input::get('txtOldPicture');
        $filePath = 'companies/photo/' . $imagePath;

        $companyID         = htmlspecialchars(Input::get('txtCompanyID'));
        $boothID           = htmlspecialchars(Input::get('txtBoothID'));
        $oldBoothNumber    = htmlspecialchars(Input::get('txtBoothNumber'));

        $boothNumber       = htmlspecialchars(Input::get("cbBooth"));
        $companyName       = htmlspecialchars(Input::get('txtCompanyName'));
        $companyEmail      = htmlspecialchars(Input::get('txtCompanyEmail'));
        $companyContact    = htmlspecialchars(Input::get('txtCompanyContact'));
        $companyWebsite    = htmlspecialchars(Input::get('txtCompanyWebsite'));
        $companyLocation   = htmlspecialchars(Input::get('txtCompanyLocation'));
        $companyIndustry   = htmlspecialchars(Input::get('txtCompanyIndustry'));
        $companyLinkedin   = htmlspecialchars(Input::get('txtCompanyLinkedln'));

        $companyHRName     = htmlspecialchars(Input::get('txtCompanyHRName'));
        $companyHRContact  = htmlspecialchars(Input::get('txtCompanyHRContact'));
        $companyHREmail    = htmlspecialchars(Input::get('txtCompanyHREmail'));
        $companyHROldEmail = htmlspecialchars(Input::get('txtCompanyHROldEmail'));
        $companyHRPassword = htmlspecialchars(Input::get('txtCompanyHRPassword'));

        $totalEmployee     = htmlspecialchars(Input::get('cbTotalEmployee'));
        $companyAddress    = htmlspecialchars(Input::get('txtCompanyAddress'));
        $companyOverview   = htmlspecialchars(Input::get('txtCompanyDescription'));
        $companyReasons    = htmlspecialchars(Input::get('txtCompanyReasons'));
        $company = new Company;

        if ($companyHREmail != $companyHROldEmail) {
            $resp =  $company->UpdateCompany($companyName, $companyWebsite, $companyEmail, $companyContact, $companyHRName, $companyHRContact, $companyHREmail, $companyAddress, $companyLocation, $companyIndustry, $companyLinkedin, $totalEmployee, $companyOverview, $companyReasons, $imagePath, $companyID);

            if ($resp) {
                unset($resp);
                $resp = $company->ChangeEmailAccess($companyID, $companyHREmail, $companyHROldEmail);
            }
        } else {
            $resp =  $company->UpdateCompany($companyName, $companyWebsite, $companyEmail, $companyContact, $companyHRName, $companyHRContact, $companyHROldEmail, $companyAddress, $companyLocation, $companyIndustry, $companyLinkedin, $totalEmployee, $companyOverview, $companyReasons, $imagePath, $companyID);
        }

        if ($resp) {
            if ($boothNumber != $oldBoothNumber) {
                unset($resp);
                $resp = $company->UpdateBoothEvent($companyID, $boothID, $boothNumber);
            }

            if ($image) {
                $resUpload = Storage::disk('s3')->getDriver()->put($filePath, file_get_contents($image), ['CacheControl' => "no-cache", "Visibility" => "public"]);

                return json_encode($resUpload);
            }

            return json_encode($resp);
        } else {
            if ($image) {
                $resUpload = Storage::disk('s3')->getDriver()->put($filePath, file_get_contents($image), ['CacheControl' => "no-cache", "Visibility" => "public"]);

                return json_encode($resUpload);
            }
            return json_encode(false);
        }
    }

    public function SaveProfilePicture(Request $request)
    {
        $validated = Validator::make($request->all(), [
            "uploadImage" => "mimes:jpeg,bmp,png",
        ]);

        $image = $request->file("uploadImage");
        $name = rand() . "." . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');

        $company = new Company;

        $resp = $company->SavePicture($name);

        if ($resp) {
            $image->move($destinationPath, $name);
            return json_encode($name);
        } else {
            return json_encode(false);
        }
    }

    public function SetNonActive()
    {
        $jobPostID = $_POST['jobPostID'];
        $company = new Company;

        $resp = $company->SetNonActive($jobPostID);

        return json_encode($resp);
    }

    public function SetActive()
    {
        $jobPostID = $_POST['jobPostID'];
        $company = new Company;

        $resp = $company->SetActive($jobPostID);

        return json_encode($resp);
    }

    public function retrieveCity(Request $request)
    {
        $location = new Location();
        $city = $location->retrieveCity($request['province']);

        return $city;
    }
}
