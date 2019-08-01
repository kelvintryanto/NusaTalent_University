<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dashboard;
use App\User;
class DashboardController extends Controller {

    public function index() {
        $user = new User();
        $dashboard = new Dashboard();
        $data[] = array();
        $data['css'] = view('css');
        $data['js'] = view('js');
        $data['navbar'] = view('template.navbar')->with("univName", $user->getUnivName());
        $data['sidebar'] = view('template.sidebar');
        $data['footer'] = view('template.footer');

    	return view('Dashboard.index')->with('data', $data);
    }

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
