<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class SettingsController extends Controller
{
    public function semester()
    {
        // TODO: Implement semester settings logic
        return view('settings/semester');
    }

    public function herRegistrasi()
    {
        // TODO: Implement her registrasi logic
        return view('settings/her_registrasi');
    }

    public function buatTagihan()
    {
        // TODO: Implement buat tagihan logic
        return view('settings/buat_tagihan');
    }

    public function buatTagihanMhs()
    {
        // TODO: Implement buat tagihan mahasiswa logic
        return view('settings/buat_tagihan_mhs');
    }

    public function itemPembayaran()
    {
        // TODO: Implement item pembayaran logic
        return view('settings/item_pembayaran');
    }

    public function jadwalKuliah()
    {
        // TODO: Implement jadwal kuliah logic
        return view('settings/jadwal_kuliah');
    }

    public function dosenWali()
    {
        // TODO: Implement dosen wali logic
        return view('settings/dosen_wali');
    }
}
