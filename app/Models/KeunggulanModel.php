<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeunggulanModel extends Model
{
    use HasFactory;

    protected $table = 'keunggulan_models';

    protected $fillable = ['nama_keunggulan', 'deskripsi_keunggulan' , 'gambar_keunggulan'];
}
