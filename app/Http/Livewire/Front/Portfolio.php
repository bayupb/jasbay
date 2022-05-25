<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class Portfolio extends Component
{
    public function render()
    {
        return view('livewire.front.portfolio')->layout('layouts.guest');
    }
}
