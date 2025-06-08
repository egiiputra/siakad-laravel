<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JalurPendaftaran extends Model
{
    protected $table = 'jalur_pendaftaran';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama'
    ];

    public $incrementing = false;
    public $timestamps = false;
}
