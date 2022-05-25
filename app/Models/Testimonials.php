<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    use HasFactory;

    protected $table = 'testimonial';

    protected $fillable = ['nama_testimonial', 'jabatan_testimonial' , 'deskripsi_testimonial'];
}
