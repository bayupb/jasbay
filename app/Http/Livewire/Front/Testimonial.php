<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Testimonials;
use Livewire\WithPagination;
use App\Http\Livewire\Front\Testimonial;

class Testimonial extends Component
{

    public $testimonials, $testimonial_id,  $nama_testimonial, $jabatan_testimonial , $deskripsi_testimonial;
    use WithPagination;
    public $page = 1;

    protected $queryString = [
        'page' => ['except' => 1, 'as' => 'p'],
    ];

    public function resettestimonial(){
        $this->nama_testimonial = '';
        $this->jabatan_testimonial = '';
        $this->deskripsi_testimonial = '';
    }
    public function rules(){
        return [
            'nama_testimonial' => 'required|min:3',
            'jabatan_testimonial' => 'required',
            'deskripsi_testimonial' => 'required',
        ];
    }
    public function messages (){
        return [
            'nama_testimonial.min' => 'Nama minimal 3 huruf!',
            'nama_testimonial.required' => 'Nama tidak boleh kosong.',
            'jabatan_testimonial.required' => 'Jabatan tidak boleh kosong.',
            'deskripsi_testimonial.required' => 'Deskripsi tidak boleh kosong',
        ];
    }

    public function uploadtestimonial(){
        $this->validate();

        $Testimonials   =Testimonials::create([
            'nama_testimonial'  => $this->nama_testimonial,
            'jabatan_testimonial'  => $this->jabatan_testimonial,
            'deskripsi_testimonial'  => $this->deskripsi_testimonial,
        ]);
        session()->flash('message', 'Testimonial berhasil dibuat!😎', 3000);
        $this->resettestimonial();
        return $Testimonials->toArray();
    }

    public function render()
    {
        $testimonials = Testimonials::latest()->paginate(6);
        return view('livewire.front.testimonial',[
            'Testimonials'  => $testimonials
        ])->layout('layouts.guest');
    }
}
