<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiKuliahModel extends Model
{
    protected $table = 'nilai_kuliah';
    protected $primaryKey = 'id';
    protected $allowedFields = ['mahasiswa_id', 'mata_kuliah_id', 'nilai', 'semester', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
