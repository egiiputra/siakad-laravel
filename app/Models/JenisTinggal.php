<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisTinggal extends Model
{
    protected $table = 'jenis_tinggal';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama'
    ];

    public $incrementing = false;
    public $timestamps = false;
}
