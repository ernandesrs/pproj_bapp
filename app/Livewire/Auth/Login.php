<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{
    public function render()
    {
        return view('livewire..auth.login')
            ->layout('livewire..auth.layouts.layout1')
            ->title('Login');
    }
}
