<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsenKuliahModel extends Model
{
    protected $table = 'absen_kuliah';
    protected $primaryKey = 'id';
    protected $allowedFields = ['mahasiswa_id', 'mata_kuliah_id', 'tanggal', 'status', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
