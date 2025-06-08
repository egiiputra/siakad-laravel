<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    protected $table = 'agama';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama'
    ];

    public $incrementing = false;
    public $timestamps = false;

}
