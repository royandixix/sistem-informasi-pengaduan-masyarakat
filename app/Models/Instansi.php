<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $fillable = ['nama','kontak','deskripsi','alamat','status'];

    public function pengaduans()
    {
        return $this->hasMany(Pengaduan::class);
    }
}
