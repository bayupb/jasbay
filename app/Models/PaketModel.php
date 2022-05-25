<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketModel extends Model
{
    use HasFactory;

    protected $table = 'paket_models';

    protected $fillable = ['nama_paket', 'deskripsi_paket' , 'gambar_paket'];
}
