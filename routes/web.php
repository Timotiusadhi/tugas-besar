<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenambahanController;
use App\Http\Controllers\AmbilController;



Route::middleware("auth")->group(function(){
    
    Route::get('/index', function () {
        return view('index');
    })->name('home');

});

Route::get("/",[AuthController::class,"login"])->name("login");
Route::post("/login",[AuthController::class,"loginPost"])->name("login.post");
Route::get("/register",[AuthController::class,"register"])->name("register");
Route::post("/register",[AuthController::class,"registerPost"])->name("register.post");

Route::get("/tambahbarang",[PenambahanController::class,"penambahan"]);
Route::post("/tambahbarang",[PenambahanController::class,"penambahanPost"])->name("penambahan.post");
Route::get("/lihatbarang",[PenambahanController::class,"lihatbarang"])->name("lihat");


Route::resource('penambahans', PenambahanController::class);


    Route::get("/aturbarang",[AmbilController::class,"aturbarang"]);
    