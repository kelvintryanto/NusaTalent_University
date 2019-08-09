<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dashboard;
use App\User;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    private function checkSession()
    {
        $user = new User();

        return $user->checkSession();
    }

    //checked 02/08/2019 11:16
    //ada error di dashboard.js untuk chart
    //confirm dashboard 1st page
    public function index()
    {
        if ($this->checkSession()) {
            $data[] = array();
            $data['navbar'] = view('includes.navbar');

            return view('pages.dashboard')->with('data', $data);
        }
        return redirect('/login');
    }
    // checked finished 02/08/2019 11:16
    // matikan dulu untuk dashboard.js


    public function GetChartAreaData()
    {
        $month = $_POST['month'];
        $type = $_POST['type'];

        $dashboard = new Dashboard();

        $results = $dashboard->GetChartAreaData($month, $type);

        return $results;
    }

    public function GetChartBarData()
    {
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $type = $_POST['type'];
        $graph = $_POST['graph'];
        $dashboard = new Dashboard();

        $results = $dashboard->GetChartData($startDate, $endDate, $type, $graph);

        return $results;
    }
}
