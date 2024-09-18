<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_perusahaan',
        'alamat',
        'kontak',
        'deskripsi',
    ];

    // Relasi dengan tabel Menu
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
