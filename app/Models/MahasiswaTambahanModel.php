<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaTambahanModel extends Model
{
    protected $table = 'mahasiswa_tambahan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nipd', 'nama', 'prodi', 'alamat', 'email'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
