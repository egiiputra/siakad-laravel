<?php

namespace App\Models;

use CodeIgniter\Model;

class PemasukanLainModel extends Model
{
    protected $table = 'pemasukan_lain';
    protected $primaryKey = 'id';
    protected $allowedFields = ['sumber', 'jumlah', 'tanggal', 'keterangan', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
