<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ReportsController extends Controller
{
    public function mahasiswa()
    {
        // TODO: Implement report logic for Mahasiswa
        return view('reports/mahasiswa');
    }

    public function akademik()
    {
        // TODO: Implement report logic for Akademik
        return view('reports/akademik');
    }

    public function pemasukan()
    {
        // TODO: Implement report logic for Pemasukan
        return view('reports/pemasukan');
    }

    public function keuangan()
    {
        // TODO: Implement report logic for Keuangan
        return view('reports/keuangan');
    }

    public function siakadToFeeder()
    {
        // TODO: Implement report logic for SIAKAD to FEEDER
        return view('reports/siakad_to_feeder');
    }

    public function downloadExcel($reportType)
    {
        // TODO: Implement Excel export logic based on $reportType
    }
}
