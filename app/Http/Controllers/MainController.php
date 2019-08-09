<?php

namespace App\Http\Controllers;

use Request;
use Response;
use Session;
use Illuminate\Support\Facades\Input;
use App\Company;
use App\Dashboard;
use App\Talents;
use App\User;
use App\Student;
use Validator;
use GuzzleHttp\RedirectMiddleware;

class MainController extends Controller
{

    private function checkSession()
    {
        $user = new User();

        return $user->checkSession();
    }

    public function showLoginPage()
    {
        // $data[] = array();

        // $data['css'] = view('css');
        // $data['js'] = view('js');
        // $data['navbar'] = view('template.navbar');
        // $data['sidebar'] = view('template.sidebar');
        // $data['footer'] = view('template.footer');

        // dd($this->checkSession());
        // return view('index')->with('data', $data);
        if ($this->checkSession()) {
            return redirect('/dashboard');
        } else {
            // dd('udah masuk nih');
            return view('pages.login');
        }
    }

    public function TalentReviewed($id)
    {
        $talent = new Talents;
        $resp = $talent->TalentReviewed($id);

        if ($resp)
            echo json_encode("success");
        else
            echo json_encode("failed");
    }

    public function GetJobPostAnswers()
    {
        $jobPostID = $_POST['jobPostID'];
        $studentID = $_POST['studentID'];

        if (!empty($jobPostID) && !empty($studentID)) {
            $dashboard = new Dashboard;

            $resp = $dashboard->GetJobPostAnswer($jobPostID, $studentID);

            if (!is_null($resp))
                return $resp;
            else
                return false;
        } else
            return false;
    }

    public function getStudentExportData()
    {
        $name = $_POST['nama'];
        $univ = $_POST['univ'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];

        $student = new Student;

        $resp = $student->getExportDataStudent($name, $univ, $email, $telepon);

        return json_encode($resp);
    }

    // public function UpdateTalent()
    // {
    //     $dashboard = new Dashboard;

    //     $data = $dashboard->LoadTalent();
    //     $dataStd = array();
    //     $previousID = "";
    //     foreach($data as $row)
    //     {
    //         if($previousID !== $row->student_id)
    //         {
    //             if($row->reviewed === 0 && $row->hired === 0 && $row->rejected === 0)
    //             {
    //                 $data = array(
    //                     "studentID" => $row->student_id,
    //                     "status" => 0
    //                 );
    //                 array_push($dataStd, $data);
    //             }
    //             else if($row->reviewed === 1 && $row->hired === 1 && $row->rejected === 0 ||
    //                     $row->reviewed === 1 && $row->hired === 0 && $row->rejected === 1)
    //             {
    //                 $data = array(
    //                     "studentID" => $row->student_id,
    //                     "status" => 2
    //                 );
    //                 array_push($dataStd, $data);
    //             }
    //             else if($row->reviewed === 1 && $row->hired === 0 && $row->rejected === 0)
    //             {
    //                 $data = array(
    //                     "studentID" => $row->student_id,
    //                     "status" => 1
    //                 );
    //                 array_push($dataStd, $data);
    //             }
    //         }
    //         $previousID = $row->student_id;
    //     }
    //     foreach($dataStd as $row)
    //     {
    //         $dashboard->UpdateTalentStatus($row['studentID'], $row['status']);
    //     }
    // }

    public function ChangePasswordPage()
    {
        $user = new User();

        if ($this->checkSession()) {
            $data[] = array();

            $data['css'] = view('css');
            $data['js'] = view('js');
            $data['navbar'] = view('includes.navbar')->with('univName', $user->getUnivName());
            $data['sidebar'] = view('template.sidebar');
            $data['footer'] = view('template.footer');

            return view('change-password')->with('data', $data);
        }

        return redirect("/login");
    }

    // checked 02/08/2019 10:24
    public function authorizedAccess()
    {
        $email    = htmlspecialchars(Input::get('txtEmail'));
        $password = htmlspecialchars(Input::get('txtPassword'));


        //membuat object class baru User
        $user = new User();

        //authenticateUser
        $resp = $user->authenticateUser($email, $password);

        if ($resp) {
            Session::put('email', $email);
            return redirect("/dashboard");
        } else {
            return redirect("/login")->with("failed", "Invalid email/password!");
        }
    }
    // checked finished 02/08/2019 10:44
    // checked again 06/08/2019
    // return redirect /Dashboard bermasalah, elsenya tidak bermasalah

    public function ChangePassword()
    {
        $oldPassword = htmlspecialchars(Input::get("txtOldPassword"));
        $newPassword = htmlspecialchars(Input::get("txtNewPassword"));
        $retypePassword = htmlspecialchars(Input::get("txtRetypePassword"));

        $user = new User();

        if ($newPassword === $retypePassword) {
            $resp = $user->changePassword($oldPassword, $newPassword);

            if ($resp)
                return redirect("/Access/change-password")->with("success", "Successfully change password");
            else
                return redirect("/Access/change-password")->with("failed", "Old password is not correct");
        } else {
            return redirect("/Access/change-password")->with("failed", "New passwords do not match");
        }
    }
}
