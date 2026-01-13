<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * Atribut yang dapat diisi (Mass Assignment).
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Default: 'admin' atau 'masyarakat'
    ];

    /**
     * Atribut yang disembunyikan saat serialisasi (JSON).
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting atribut.
     * Di Laravel 11, disarankan menggunakan method casts() daripada property $casts.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Helper untuk mengecek role (Opsional tapi sangat berguna)
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isMasyarakat(): bool
    {
        return $this->role === 'masyarakat';
    }
}