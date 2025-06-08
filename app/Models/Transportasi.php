<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transportasi extends Model
{
    protected $table = 'transportasi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama'
    ];

    public $incrementing = false;
    public $timestamps = false;
}
