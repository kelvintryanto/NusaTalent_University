<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dashboard;
use App\User;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{

    //checked 02/08/2019 11:16
    //ada error di dashboard.js untuk chart
    public function index()
    {
        $data[] = array();
        // $data['css'] = view('css');
        // $data['js'] = view('js');
        $data['navbar'] = view('includes.navbar');
        // $data['sidebar'] = view('template.sidebar');
        // $data['footer'] = view('template.footer');

        // return view('Dashboard.index')->with('data', $data);
        return view('pages.dashboard')->with('data', $data);
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
