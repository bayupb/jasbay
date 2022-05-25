<?php

namespace App\Models;

use App\Models\JasaPaket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FiturHargaPaketModel extends Model
{
    use HasFactory;

    protected $table ='fitur_harga_paket_models';
    protected $fillable = ['nama_fitur_harga_paket'];

    /**
     * Get the user that owns the FiturHargaPaketModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jasapaket(): BelongsTo
    {
        return $this->belongsTo(JasaPaket::class, 'fitur_harga_paket_id', 'id');
    }
}
