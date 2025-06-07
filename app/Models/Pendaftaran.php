<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nipd',
        'nik',
        'nama',
        'email',
        'tahun_masuk',
        'kelas',
        'gelombang',
        'periode_pendaftaran',
        'id_prodi',
        'id_jenjang',
        'tempat_lahir',
        'jenis_kelamin',
        'nama_ibu',
        'tanggal_lahir_ibu',
        'id_agama',
        'nisn',
        'npwp',
        'kewarganegaraan',
        'jalan',
        'kota',
        'dusun',
        'rt',
        'rw',
        'kode_pos',
        'id_jenis_tinggal',
        'id_alat_transportasi',
        'telepon',
        'no_ponsel',
        'penerima_kps',
        'no_kps',
        'nik_ayah',
        'nama_ayah',
        'tanggal_lahir_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'nik_ibu',
        'tanggal_lahir_ibu',
        'id_pengahasilan_ibu',
        'nama_wali',
        'tangga_lahir_wali',
        'pendidikan_wali',
        'pekerjaan_wali',
        'penghasilan_wali',
        'id_jenis_pendaftaran',
        'id_jalur_pendaftaran',
        'id_pembiayaan',
        'sks_diakui',
        'selesai_proses',
        'scan_ijazah',
        'scan_identitas',
        'scan_kk',
        'foto',
        'scan_bukti_bayar',
        'start_ujian',
        'end_ujian',
        'sudah_ujian',
        'sudah_wawancara',
        'skor_ujian',
        'asal_sekolah',
        'referensi_dari',
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'waktu_pendaftaran';
    protected $updatedField  = 'updated_at';
}