<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire..admin.users.create')
            ->layout('livewire..admin.layouts.layout1', [
                'title' => 'Create'
            ]);
        ;
    }
}
