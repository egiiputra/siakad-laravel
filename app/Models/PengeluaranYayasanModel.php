<?php

namespace App\Models;

use CodeIgniter\Model;

class PengeluaranYayasanModel extends Model
{
    protected $table = 'pengeluaran_yayasan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['jenis_pengeluaran', 'jumlah', 'tanggal', 'keterangan', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
