<?php

namespace App\Models;

use App\Models\FiturHargaPaketModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JasaPaket extends Model
{
    use HasFactory;

    protected $table = 'jasa_pakets';

    protected $fillable = ['nama_jasa_paket', 'judul_jasa_paket',  'fitur_harga_paket_id', 'harga_jasa_paket', 'sub_title_harga_jasa_paket'];

    public function fiturharga()
    {
        return $this->hasMany(FiturHargaPaketModel::class);
    }
}
