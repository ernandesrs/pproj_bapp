<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Login extends Component
{
    /**
     * Data
     *
     * @var array
     */
    public array $data = [
        'email' => null,
        'password' => null,
        'remember' => false
    ];

    /**
     * Render login view
     *
     * @return void
     */
    public function render()
    {
        return view('livewire..auth.login')
            ->layout('livewire..auth.layouts.layout1')
            ->title('Login');
    }

    /**
     * Attempt login
     *
     * @return void
     */
    public function attempt()
    {
        $validated = $this->validate([
            'data.email' => ['required', 'email', 'exists:users,email'],
            'data.password' => ['required'],
            'data.remember' => ['boolean']
        ], [
            'data.email.exists' => 'Email notfound in our database.'
        ]);

        if (\Auth::attempt(['email' => $validated['data']['email'], 'password' => $validated['data']['password']], $validated['data']['remember'])) {
            $this->redirect(route('admin.home'));
        } else {
            $this->addError('data.email', 'Login fail: email or password invalid.');
        }
    }
}
