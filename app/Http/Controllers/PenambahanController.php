<?php

namespace App\Http\Controllers;
use App\Models\Penambahan;

use Illuminate\Http\Request;

class PenambahanController extends Controller

{
    public function penambahan(){
        return view("tambahbarang");
    }

        function penambahanPost(Request $request){
            $request->validate([
        "penambah" =>"required",
        "NamaBar" =>"required",
        "JumlahBar" =>"required",
        "BeratBar" =>"required",
        "DateBar" =>"required",
        
     ]); 
            $penambahan = new Penambahan();
            $penambahan->penambah = $request->penambah;
            $penambahan->NamaBar = $request->NamaBar;
            $penambahan->JumlahBar = $request->JumlahBar;
            $penambahan->BeratBar = $request->BeratBar;
            $penambahan->DateBar = $request->DateBar;
            $penambahan->StatusBar = 'di gudang';

        if($penambahan->save()){
        return redirect(route("lihat"))
        ->with("success","barang ditambahkan");
         }
    }

    public function lihatbarang(){
       
        $penambahans= Penambahan::all();
        
        return view('lihatbarang', compact('penambahans'));
    }
    public function edit(Penambahan $penambahan)
    {
        return view('editbarang',compact('penambahan'));
    }
    public function update(Request $request, Penambahan $penambahan)
{
    $request->validate([
        'penambah' => 'required',
        'NamaBar' => 'required',
        'JumlahBar' => 'required',
        'BeratBar' => 'required',
        'DateBar' => 'required',
    ]);

    $penambahan->update($request->only([
        'penambah', 'NamaBar', 'JumlahBar', 'BeratBar', 'DateBar'
    ]));

    return redirect()->route('lihat')->with('success', 'Barang updated successfully!');

    }

    
}
