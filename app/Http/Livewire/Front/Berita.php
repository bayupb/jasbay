<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class Berita extends Component
{
    public function render()
    {
        return view('livewire.front.berita')->layout('layouts.guest');
    }
}
