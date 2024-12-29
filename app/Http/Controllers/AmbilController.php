<?php

namespace App\Http\Controllers;

use App\Models\Ambil;
use App\Models\Penambahan;
use Illuminate\Http\Request;

class AmbilController extends Controller
{
  
    public function ambilForm(Penambahan $penambahan)
    {
        return view('ambilbarang', compact('penambahan'));
    }

    
    public function ambilPost(Request $request, Penambahan $penambahan)
    {
       
        $validatedData = $request->validate([
            'name' => 'required|exists:users,name',
            'AMbarang' => 'required|string|max:255',
            'JUMbar' => 'required|string|min:1',
            'BERbar' => 'required|string|max:255',
            'Dateam' => 'required|date',
        ], [
            'name.exists' => 'Nama yang Anda masukkan tidak valid.',
            'name.required' => 'Nama wajib diisi.',
            'AMbarang.required' => 'Nama barang wajib diisi.',
            'JUMbar.required' => 'Jumlah barang wajib diisi.',
            'BERbar.required' => 'Berat barang wajib diisi.',
            'Dateam.required' => 'Tanggal pengambilan barang wajib diisi.',
        ]);

     
        $penambahan->update([
            'StatusBar' => 'diambil',
        ]);

        Ambil::create([
            'name' => $validatedData['name'],
            'AMbarang' => $validatedData['AMbarang'],
            'JUMbar' => $validatedData['JUMbar'],
            'BERbar' => $validatedData['BERbar'],
            'Dateam' => $validatedData['Dateam'],
        ]);

       
        return redirect()->route('lihat')->with('success', 'Barang berhasil diambil!');
    }
}
