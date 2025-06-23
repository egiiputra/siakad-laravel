<?php

namespace App\Http\Controllers;

// use App\Models\JenisPendaftaran;
// use App\Models\JenjangPendidikan;
// use App\Models\JalurPendaftaran;
// use App\Models\Pendaftaran;
// use App\Models\Periode;
// use App\Models\Prodi;
// use App\Models\Pembiayaan;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pendaftaran = DB::select('SELECT p.nipd AS nipd, prodi.nama AS prodi, p.nama AS nama, p.kota AS kota, p.periode_pendaftaran AS periode, p.gelombang AS gelombang, p.sudah_ujian AS sudah_ujian, p.sudah_wawancara AS sudah_wawancara, p.email AS email FROM pendaftaran p INNER JOIN prodi ON p.id_prodi=prodi.id');

        // var_dump($pendaftaran[0]);
        // die();
        // return $request->input('tahun');

        // Get filter inputs
        // $prodi = $request->input('prodi');
        // $tahun = $request->input('tahun');
        // $status_ujian = $request->input('status_ujian');
        // $status_wawancara = $request->input('status_wawancara');
        // $nama = $request->input('nama');

        // $builder = Mahasiswa->findAll $this->mahasiswaModel;
        // $pendaftaran = Pendaftaran::all();
        // dd($pendaftaran);

        // if ($prodi) {
        //     $builder = $builder->where('prodi', $prodi);
        // }
        // if ($tahun) {
        //     $builder = $builder->where('periode', $tahun);
        // }
        // if ($status_ujian) {
        //     $builder = $builder->where('status_ujian', $status_ujian);
        // }
        // if ($status_wawancara) {
        //     $builder = $builder->where('status_wawancara', $status_wawancara);
        // }
        // if ($nama) {
        //     $builder = $builder->like('nama', $nama);
        // }

        // $data['mahasiswa'] = $builder->orderBy('id', 'DESC')->findAll();

        return view('pendaftaran/index', ['pendaftaran' => $pendaftaran]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pendaftaran/form', [
            // options for select input
            'periodeOpts' => DB::select('SELECT * FROM periode'),
            'prodiOpts' => DB::select('SELECT * FROM prodi'),
            'jenjangPendidikanOpts' => DB::select('SELECT * FROM jenjang_pendidikan'),
            'jenisPendaftaranOpts' => DB::select('SELECT * FROM jenis_pendaftaran'),
            'jalurPendaftaranOpts' => DB::select('SELECT * FROM jalur_pendaftaran'),
            'pembiayaanOpts' => DB::select('SELECT * FROM pembiayaan'),
            'agamaOpts' => DB::select('SELECT * FROM agama'),
            'kewarganegaraanOpts' => DB::select('SELECT * FROM negara'),
            'jenisTinggalOpts' => DB::select('SELECT * FROM jenis_tinggal'),
            'transportasiOpts' => DB::select('SELECT * FROM transportasi'),
            'pendidikanOpts' => DB::select('SELECT * FROM pendidikan'),
            'pekerjaanOpts' => DB::select('SELECT * FROM pekerjaan'),
            'penghasilanOpts' => DB::select('SELECT * FROM penghasilan')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // TODO: Validasi input
        // TODO: validasi file upload

        // TODO: Handle file upload simpan ke direktori dengan nama sesuai nama db

        $tanggal = explode("-", $request->input('tanggalDaftar'));

        // Get nomor urut terakhir
        $total_registration = DB::scalar("SELECT COUNT(*) FROM pendaftaran WHERE tanggal_pendaftaran = " . $request->input('tanggalDaftar'));

        $nipd = str_pad(strval($total_registration + 1), 4, "0", STR_PAD_LEFT)
            . "/PMB/$tanggal[1]/$tanggal[0]";

        $result = DB::insert('INSERT INTO pendaftaran
            VALUES (NULL,' 
            . implode(',', array_fill(0, 31, '?')) 
            . ', NOW(), '
            . implode(',', array_fill(0, 34, '?'))
            . ')'
        , [
            $nipd,
            $request->input('noKtp'),
            $request->input('nama'),
            $request->input('email'),
            $request->input('angkatan'),
            $request->input('kelas'),
            $request->input('gelombang'),
            $request->input('periode'),
            $request->input('prodi'),
            $request->input('jenjangPendidikan'),
            $request->input('tempatLahir'),
            $request->input('jenisKelamin'),
            $request->input('agama'),
            $request->input('nisn'),
            $request->input('npwp'),
            $request->input('kewarganegaraan'),
            $request->input('jalan'),
            $request->input('kota'),
            $request->input('kecamatan'),
            $request->input('rt'),
            $request->input('rw'),
            $request->input('kodePos'),
            $request->input('jenisTinggal'),
            $request->input('transportasi'),
            $request->input('telepon'),
            $request->input('terimaKps'),
            $request->input('NoKps'),
            $request->input('jenisPendaftaran'),
            $request->input('jalurPendaftaran'),
            $request->input('pembiayaan'),
            null,
            $request->input('sks'),
            0,
            str_pad(strval($total_registration + 1), 4, "0", STR_PAD_LEFT) . "-PMB-$tanggal[1]-$tanggal[0]_ijazah.pdf",
            str_pad(strval($total_registration + 1), 4, "0", STR_PAD_LEFT) . "-PMB-$tanggal[1]-$tanggal[0]_identitas.pdf",
            str_pad(strval($total_registration + 1), 4, "0", STR_PAD_LEFT) . "-PMB-$tanggal[1]-$tanggal[0]_kk.pdf",
            str_pad(strval($total_registration + 1), 4, "0", STR_PAD_LEFT) . "-PMB-$tanggal[1]-$tanggal[0]_foto.jpg",
            str_pad(strval($total_registration + 1), 4, "0", STR_PAD_LEFT) . "-PMB-$tanggal[1]-$tanggal[0]_buktibayar.jpg",
            "2025-06-15 15:30:00",
            "2025-06-15 16:00:00",
            0,
            0,
            0,
            $request->input('asalSekolah'),
            '',
            $request->input('namaIbu'),
            $request->input('namaAyah'),
            $request->input('namaWali'),
            $request->input('tanggalLahirIbu'),
            $request->input('tanggalLahirAyah'),
            $request->input('tanggalLahirWali'),
            $request->input('nikIbu'),
            $request->input('nikAyah'),
            $request->input('nikWali'),
            $request->input('pendidikanIbu'),
            $request->input('pendidikanAyah'),
            $request->input('pendidikanWali'),
            $request->input('penghasilanIbu'),
            $request->input('penghasilanAyah'),
            $request->input('penghasilanWali'),
            $request->input('pekerjaanIbu'),
            $request->input('pekerjaanAyah'),
            $request->input('pekerjaanWali'),
            $request->input('periode'),
            $request->input('tanggalDaftar'),
        ]);
        // return 'hello world';
        return back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
