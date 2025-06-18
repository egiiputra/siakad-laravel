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
        // return $request->input('tahun');
        $data = [];

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

        return view('pendaftaran/index', $data);
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
            'kewarganegaraanOpts' => DB::select('SELECT * FROM negara')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return 'hello world';
        return json_encode($request);
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
