<?php

namespace App\Http\Controllers;
use App\Models\Ambil;
use App\Models\Penambahan;
use Illuminate\Http\Request;


class AmbilController extends Controller
{
    public function aturbarang(){
        $penambahan = Penambahan::all();
        
        return view('aturbarang', compact('penambahan')); 
    }
    

    
}
