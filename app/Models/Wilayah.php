<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $fillable = ['nama','tipe','deskripsi','status'];

    public function pengaduans()
    {
        return $this->hasMany(Pengaduan::class);
    }
}

