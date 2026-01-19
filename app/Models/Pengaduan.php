<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengaduan extends Model
{
    protected $fillable = [
        'user_id',
        'kategori_pengaduan_id',
        'instansi_id',
        'judul',
        'isi',
        'foto',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriPengaduan::class);
    }

    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }

    public function details()
    {
        return $this->hasOne(PengaduanDetail::class);
    }
}
