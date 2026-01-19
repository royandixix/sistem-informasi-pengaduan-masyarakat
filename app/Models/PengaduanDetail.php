<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengaduanDetail extends Model
{
    protected $fillable = [
        'pengaduan_id',
        'alamat',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'status'
    ];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }
}
