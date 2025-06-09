<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembiayaan extends Model
{
    protected $table = 'pembiayaan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama'
    ];
}