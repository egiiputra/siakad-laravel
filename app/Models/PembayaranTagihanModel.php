<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranTagihanModel extends Model
{
    protected $table = 'pembayaran_tagihan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tagihan_va_id', 'jumlah_bayar', 'tanggal_bayar', 'metode', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
