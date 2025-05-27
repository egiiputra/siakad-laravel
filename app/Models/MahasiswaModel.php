<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nipd',
        'nama',
        'prodi',
        'alamat',
        'periode',
        'referensi',
        'status_ujian',
        'status_wawancara',
        'email',
        'tagihan'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
