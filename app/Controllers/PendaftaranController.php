<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use CodeIgniter\Controller;

class PendaftaranController extends Controller
{
    protected $mahasiswaModel;
    protected $session;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
        $this->session = session();
        helper(['form', 'url']);
    }

    private function checkAccess()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/auth/login')->send();
        }
        $role = $this->session->get('role');
        if (!in_array($role, ['admin', 'dosen'])) {
            // Only admin and dosen can access pendaftaran
            return redirect()->to('/auth/login')->send();
        }
    }

    public function index()
    {
        $this->checkAccess();

        $data = [];

        // Get filter inputs
        $prodi = $this->request->getGet('prodi');
        $tahun = $this->request->getGet('tahun');
        $status_ujian = $this->request->getGet('status_ujian');
        $status_wawancara = $this->request->getGet('status_wawancara');
        $nama = $this->request->getGet('nama');

        $builder = $this->mahasiswaModel;

        if ($prodi) {
            $builder = $builder->where('prodi', $prodi);
        }
        if ($tahun) {
            $builder = $builder->where('periode', $tahun);
        }
        if ($status_ujian) {
            $builder = $builder->where('status_ujian', $status_ujian);
        }
        if ($status_wawancara) {
            $builder = $builder->where('status_wawancara', $status_wawancara);
        }
        if ($nama) {
            $builder = $builder->like('nama', $nama);
        }

        $data['mahasiswa'] = $builder->orderBy('id', 'DESC')->findAll();

        echo view('pendaftaran/index', $data);
    }

    public function save()
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

        return redirect()->to('/pendaftaran');
    }

    public function delete($id)
    {
        $this->checkAccess();

        $this->mahasiswaModel->delete($id);
        return redirect()->to('/pendaftaran');
    }
}
