<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $fillable = [
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
