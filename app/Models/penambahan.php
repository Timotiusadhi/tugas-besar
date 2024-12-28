<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penambahan extends Model
{
    use HasFactory;
    protected $table = 'penambahans';
    protected $fillable = ['penambah', 'NamaBar', 'JumlahBar', 'BeratBar', 'DateBar'];

    
}
