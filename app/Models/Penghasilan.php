<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penghasilan extends Model
{
    protected $table = 'penghasilan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama'
    ];

    public $incrementing = false;
    public $timestamps = false;
}
