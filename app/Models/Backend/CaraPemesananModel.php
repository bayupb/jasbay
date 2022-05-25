<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaraPemesananModel extends Model
{
    use HasFactory;

    protected $table = 'cara_pemesanan';

    protected $fillable = ['nama_cara', 'deskripsi_cara' , 'status'];

}
