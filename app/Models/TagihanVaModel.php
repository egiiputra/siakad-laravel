<?php

namespace App\Models;

use CodeIgniter\Model;

class TagihanVaModel extends Model
{
    protected $table = 'tagihan_va';
    protected $primaryKey = 'id';
    protected $allowedFields = ['mahasiswa_id', 'nomor_va', 'jumlah_tagihan', 'status', 'jatuh_tempo', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
