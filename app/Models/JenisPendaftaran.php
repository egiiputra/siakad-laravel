<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisPendaftaran extends Model
{
    protected $table = 'jenis_pendaftaran';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama',
        'alias'
    ];

    public $incrementing = false;
    public $timestamps = false;
}
