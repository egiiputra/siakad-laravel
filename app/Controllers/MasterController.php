<?php

namespace App\Controllers;

use App\Models\MataKuliahModel;
use App\Models\MahasiswaModel;
use App\Models\MahasiswaTambahanModel;
use App\Models\DosenModel;
use App\Models\TenagaKependidikanModel;
use CodeIgniter\Controller;

class MasterController extends Controller
{
    protected $mataKuliahModel;
    protected $mahasiswaModel;
    protected $mahasiswaTambahanModel;
    protected $dosenModel;
    protected $tenagaKependidikanModel;
    protected $session;

    public function __construct()
    {
        $this->mataKuliahModel = new MataKuliahModel();
        $this->mahasiswaModel = new MahasiswaModel();
        $this->mahasiswaTambahanModel = new MahasiswaTambahanModel();
        $this->dosenModel = new DosenModel();
        $this->tenagaKependidikanModel = new TenagaKependidikanModel();
        $this->session = session();
        helper(['form', 'url']);
    }

    private function checkAccess()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/auth/login')->send();
        }
        $role = $this->session->get('role');
        if ($role !== 'admin') {
            // Only admin can access master module
            return redirect()->to('/auth/login')->send();
        }
    }

    // Mata Kuliah
    public function mataKuliah()
    {
        $this->checkAccess();
        $data['mata_kuliah'] = $this->mataKuliahModel->orderBy('id', 'DESC')->findAll();
        echo view('master/mata_kuliah', $data);
    }

    public function saveMataKuliah()
    {
        $this->checkAccess();
        $data = [
            'kode' => $this->request->getPost('kode'),
            'nama' => $this->request->getPost('nama'),
            'sks' => $this->request->getPost('sks'),
        ];
        $this->mataKuliahModel->insert($data);
        return redirect()->to('/master/mata-kuliah');
    }

    public function deleteMataKuliah($id)
    {
        $this->checkAccess();
        $this->mataKuliahModel->delete($id);
        return redirect()->to('/master/mata-kuliah');
    }

    // Mahasiswa
    public function mahasiswa()
    {
        $this->checkAccess();
        $data['mahasiswa'] = $this->mahasiswaModel->orderBy('id', 'DESC')->findAll();
        echo view('master/mahasiswa', $data);
    }

    public function saveMahasiswa()
    {
        $this->checkAccess();
        $data = [
            'nipd' => $this->request->getPost('nipd'),
            'nama' => $this->request->getPost('nama'),
            'prodi' => $this->request->getPost('prodi'),
            'alamat' => $this->request->getPost('alamat'),
            'periode' => $this->request->getPost('periode'),
            'referensi' => $this->request->getPost('referensi'),
            'status_ujian' => 'belum',
            'status_wawancara' => 'belum',
            'email' => $this->request->getPost('email'),
            'tagihan' => $this->request->getPost('tagihan'),
        ];
        $this->mahasiswaModel->insert($data);
        return redirect()->to('/master/mahasiswa');
    }

    public function deleteMahasiswa($id)
    {
        $this->checkAccess();
        $this->mahasiswaModel->delete($id);
        return redirect()->to('/master/mahasiswa');
    }

    // Mahasiswa Tambahan
    public function mahasiswaTambahan()
    {
        $this->checkAccess();
        $data['mahasiswa_tambahan'] = $this->mahasiswaTambahanModel->orderBy('id', 'DESC')->findAll();
        echo view('master/mahasiswa_tambahan', $data);
    }

    public function saveMahasiswaTambahan()
    {
        $this->checkAccess();
        $data = [
            'nipd' => $this->request->getPost('nipd'),
            'nama' => $this->request->getPost('nama'),
            'prodi' => $this->request->getPost('prodi'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
        ];
        $this->mahasiswaTambahanModel->insert($data);
        return redirect()->to('/master/mahasiswa-tambahan');
    }

    public function deleteMahasiswaTambahan($id)
    {
        $this->checkAccess();
        $this->mahasiswaTambahanModel->delete($id);
        return redirect()->to('/master/mahasiswa-tambahan');
    }

    // Dosen
    public function dosen()
    {
        $this->checkAccess();
        $data['dosen'] = $this->dosenModel->orderBy('id', 'DESC')->findAll();
        echo view('master/dosen', $data);
    }

    public function saveDosen()
    {
        $this->checkAccess();
        $data = [
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('nama'),
            'prodi' => $this->request->getPost('prodi'),
            'email' => $this->request->getPost('email'),
        ];
        $this->dosenModel->insert($data);
        return redirect()->to('/master/dosen');
    }

    public function deleteDosen($id)
    {
        $this->checkAccess();
        $this->dosenModel->delete($id);
        return redirect()->to('/master/dosen');
    }

    // Tenaga Kependidikan
    public function tenagaKependidikan()
    {
        $this->checkAccess();
        $data['tenaga_kependidikan'] = $this->tenagaKependidikanModel->orderBy('id', 'DESC')->findAll();
        echo view('master/tenaga_kependidikan', $data);
    }

    public function saveTenagaKependidikan()
    {
        $this->checkAccess();
        $data = [
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
            'email' => $this->request->getPost('email'),
        ];
        $this->tenagaKependidikanModel->insert($data);
        return redirect()->to('/master/tenaga-kependidikan');
    }

    public function deleteTenagaKependidikan($id)
    {
        $this->checkAccess();
        $this->tenagaKependidikanModel->delete($id);
        return redirect()->to('/master/tenaga-kependidikan');
    }
}
