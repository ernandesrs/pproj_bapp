<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire..admin.home')
            ->layout('livewire..admin.layouts.layout1', [
                'title' => 'Admin Overview'
            ]);
    }
}
