<?php

namespace App\Http\Controllers;

use App\Models\Penambahan;
use Illuminate\Http\Request;

class PenambahanController extends Controller
{
    // Tampilkan form tambah barang
    public function penambahan()
    {
        return view("tambahbarang");
    }

    // Proses tambah barang baru
    public function penambahanPost(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'exists:users,name',
            ],
            "NamaBar" => "required",
            "JumlahBar" => "required",
            "BeratBar" => "required",
            "DateBar" => "required",
        ], [
            'name.exists' => 'Nama yang Anda masukkan tidak valid. Pastikan nama sesuai dengan akun yang terdaftar.',
            'name.required' => 'Nama wajib diisi.',
            'NamaBar.required' => 'Nama barang wajib diisi.',
            'JumlahBar.required' => 'Jumlah barang wajib diisi.',
            'BeratBar.required' => 'Berat barang wajib diisi.',
            'DateBar.required' => 'Tanggal penambahan barang wajib diisi.',
        ]);

        $penambahans = Penambahan::create([
            "name" => $request->name,
            "NamaBar" => $request->NamaBar,
            "JumlahBar" => $request->JumlahBar,
            "BeratBar" => $request->BeratBar,
            "DateBar" => $request->DateBar,
            "StatusBar" => 'di gudang',
        ]);

        return redirect(route("lihat"))->with("success", "Barang berhasil ditambahkan!");
    }

    // Tampilkan daftar barang
    public function lihatbarang()
    {
        $penambahans = Penambahan::all();
        return view('lihatbarang', compact('penambahans'));
    }

    // Tampilkan halaman edit barang
    public function edit(Penambahan $penambahan)
    {
        return view('editbarang', compact('penambahan'));
    }

    // Proses update barang
    public function update(Request $request, Penambahan $penambahan)
    {
        $request->validate([
            
            "NamaBar" => "required",
            "JumlahBar" => "required",
            "BeratBar" => "required",
            "DateBar" => "required",
        ]);

        $penambahan->update($request->only([
            "name", "NamaBar", "JumlahBar", "BeratBar", "DateBar"
        ]));

        return redirect()->route('lihat')->with('success', 'Barang berhasil diperbarui!');
    }

    // Tampilkan daftar barang di halaman atur barang
    public function aturbarang()
    {
        $penambahans = Penambahan::all();
        return view('aturbarang', compact('penambahans'));
    }

    // Proses delete barang
    public function destroy(Penambahan $penambahan)
    {
        $penambahan->delete();
        return redirect()->route('lihat')->with('success', 'Barang berhasil dihapus!');
    }
}
