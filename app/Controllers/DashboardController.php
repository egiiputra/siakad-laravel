<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // TODO: Implement logic to gather overall recap data
        return view('dashboard/index');
    }
}
