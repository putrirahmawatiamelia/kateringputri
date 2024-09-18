<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchant_id',
        'nama_menu',
        'deskripsi',
        'image',
        'harga',
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
