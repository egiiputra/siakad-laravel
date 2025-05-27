<?php

namespace App\Models;

use CodeIgniter\Model;

class KhsSemesterModel extends Model
{
    protected $table = 'khs_semester';
    protected $primaryKey = 'id';
    protected $allowedFields = ['mahasiswa_id', 'semester', 'ipk', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
