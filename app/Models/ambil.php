<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ambil extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',       // Nama pengambil
        'AMbarang',   // Nama barang
        'JUMbar',     // Jumlah barang
        'BERbar',     // Berat barang
        'Dateam',     // Tanggal ambil
    ];
}
