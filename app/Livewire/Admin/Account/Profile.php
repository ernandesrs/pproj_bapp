<?php

namespace App\Livewire\Admin\Account;

use App\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Profile extends Component
{
    /**
     * Logged user
     *
     * @var Authenticatable
     */
    #[Locked]
    public Authenticatable|User $user;

    /**
     * Data
     *
     * @var array
     */
    public array $data = [];

    function boot()
    {
        $this->user = \Auth::user();
        $this->data = $this->user->toArray();
    }

    public function render()
    {
        return view('livewire..admin.account.profile');
    }

    /**
     * Update logged user data
     *
     * @return void
     */
    public function update()
    {
        $validated = $this->validate([
            'data.first_name' => ['required', 'max:30'],
            'data.last_name' => ['required', 'max:70'],
            'data.username' => ['required', 'max:30', 'unique:users,username,' . $this->user->id],
            'data.gender' => ['required', Rule::in(['n', 'm', 'f'])],
            'data.password' => ['string', 'confirmed']
        ]);

        if (isset($validated['data']['password'])) {
            $validated['data']['password'] = \Hash::make($validated['data']['password']);
        }

        if (!$this->user->update($validated['data'])) {
            (new \App\Helpers\Feedback())
                ->error('Fail on udpate')
                ->timer(10000)
                ->flash();
            return $this->redirect(route('admin.account'), true);
        }

        (new \App\Helpers\Feedback())
            ->success('Profile data updated.')
            ->timer(10000)
            ->dispatch($this);
    }
}
