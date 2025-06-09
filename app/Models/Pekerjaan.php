<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table = 'pendidikan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama'
    ];
}
