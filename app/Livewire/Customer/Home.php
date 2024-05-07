<?php

namespace App\Livewire\Customer;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire..customer.home')
            ->layout('livewire..customer.layouts.layout1', [
                'title' => 'Customer Overview'
            ]);
    }
}
