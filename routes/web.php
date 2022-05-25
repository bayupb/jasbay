<?php

use App\Http\Livewire\Front\Berita;
use App\Http\Livewire\Front\Kontak;
use App\Http\Livewire\Backend\Paket;
use App\Http\Livewire\Front\Beranda;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Front\Portfolio;
use App\Http\Livewire\Backend\Dashboard;
use App\Http\Livewire\Front\Testimonial;
use App\Http\Livewire\Backend\HargaPaket;
use App\Http\Livewire\Backend\Keunggulan;
use App\Http\Livewire\Backend\FiturHargaPaket;
use App\Http\Livewire\Backend\Data\CaraPemesanan;



Route::middleware(['auth:sanctum' , 'verified'])->group(function(){
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('cara-pemesanan', CaraPemesanan::class)->name('cara-pemesanan');
    Route::get('paket', Paket::class)->name('paket');
    Route::get('keunggulan', Keunggulan::class)->name('keunggulan');
    Route::get('fitur', FiturHargaPaket::class)->name('fitur');
    Route::get('harga-paket', HargaPaket::class)->name('harga-paket');
});

Route::get('', Beranda::class);
Route::get('portfolio', Portfolio::class)->name('portfolio');
Route::get('testimonial', Testimonial::class)->name('testimonial');
Route::get('berita', Berita::class)->name('berita');
Route::get('kontak', Kontak::class)->name('kontak');
