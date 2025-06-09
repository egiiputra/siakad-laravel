<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'id_jenjang_pendidikan',
        'tempat_lahir',
        'jenis_kelamin',
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
        'id_transportasi',
        'telepon',
        'penerima_kps',
        'no_kps',
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
        'nama_ibu',
        'nama_ayah',
        'nama_wali',
        'tanggal_lahir_ibu',
        'tanggal_lahir_ayah',
        'tangga_lahir_wali',
        'nik_ibu',
        'nik_ayah',
        'nik_wali',
        'id_pendidikan_ibu',
        'id_pendidikan_ayah',
        'id_pendidikan_wali',
        'id_penghasilan_ibu',
        'id_penghasilan_ayah',
        'id_penghasilan_wali',
        'id_pekerjaan_ibu',
        'id_pekerjaan_ayah',
        'id_pekerjaan_wali',
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'waktu_pendaftaran';
    protected $updatedField  = 'updated_at';

    public function prodi(): BelongsTo
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }

    public function jenjang(): BelongsTo
    {
        return $this->belongsTo(JenjangPendidikan::class, 'id_jenjang');
    }

    public function agama(): BelongsTo
    {
        return $this->belongsTo(Agama::class, 'id_agama');
    }

    public function jenisTinggal(): BelongsTo
    {
        return $this->belongsTo(JenisTinggal::class, 'id_jenis_tinggal');
    }

    public function transportasi(): BelongsTo
    {
        return $this->belongsTo(Transportasi::class, 'id_transportasi');
    }

    public function penghasilanIbu(): BelongsTo
    {
        return $this->belongsTo(Penghasilan::class, 'id_penghasilan_ibu');
    }

    public function penghasilanAyah(): BelongsTo
    {
        return $this->belongsTo(Penghasilan::class, 'id_penghasilan_ayah');
    }

    public function penghasilanWali(): BelongsTo
    {
        return $this->belongsTo(Penghasilan::class, 'id_penghasilan_wali');
    }

    public function pendidikanIbu(): BelongsTo
    {
        return $this->belongsTo(Pendidikan::class, 'id_pendidikan_ibu');
    }

    public function pendidikanAyah(): BelongsTo
    {
        return $this->belongsTo(Pendidikan::class, 'id_pendidikan_ayah');
    }
    public function pendidikanWali(): BelongsTo
    {
        return $this->belongsTo(Pendidikan::class, 'id_pendidikan_wali');
    }

    public function jenisPendaftaran(): BelongsTo
    {
        return $this->belongsTo(JenisPendaftaran::class, 'id_jenis_pendaftaran');
    }

    public function jalurPendaftaran(): BelongsTo
    {
        return $this->belongsTo(JalurPendaftaran::class, 'id_jalur_pendaftaran');
    }

    public function pembiayaan(): BelongsTo
    {
        return $this->belongsTo(JalurPendaftaran::class, 'id_pembiayaan');
    }
}