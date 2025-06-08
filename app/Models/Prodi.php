<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prodi extends Model
{
    protected $table = 'prodi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nim_prefix',
        'id_fak',
        'nama',
        'program',
        'nipy_kaprodi',
        'akreditasi',
        'no_akreditasi',
        'tgl_akreditasi',
        'status'
    ];
    public $incrementing = false;

    public function fakultas(): BelongsTo
    {
        return $this->belongsTo(Fakultas::class, 'id_fak');
    }
}
