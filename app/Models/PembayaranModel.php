<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id';
    protected $allowedFields = ['mahasiswa_id', 'jumlah', 'tanggal', 'metode', 'keterangan', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
