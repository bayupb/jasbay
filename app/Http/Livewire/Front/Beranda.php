<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\PaketModel;
use App\Models\KeunggulanModel;
use App\Models\Backend\CaraPemesananModel;

class Beranda extends Component
{
    public function render()
    {
        $datadiri = CaraPemesananModel::where('status' , 0)->take(4)->get();
        $paket = PaketModel::orderBy('created_at' , 'asc')->get();
        $keunggulan = KeunggulanModel::orderBy('created_at' , 'asc')->get();
        return view('livewire.front.beranda', [
            'dataDiri'  => $datadiri,
            'keunggulanModel'  => $keunggulan,
            'paketModel'  => $paket
        ])->layout('layouts.guest');
    }
}
