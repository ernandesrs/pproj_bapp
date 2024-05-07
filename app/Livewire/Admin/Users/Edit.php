<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        return view('livewire..admin.users.edit')
            ->layout('livewire..admin.layouts.layout1', [
                'title' => 'Edit'
            ]);
        ;
    }
}
