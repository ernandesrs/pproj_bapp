<?php

namespace App\Livewire\Admin\Account;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
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
     * Model
     *
     * @var null|Model
     */
    public null|Model $model = null;

    /**
     * Data
     *
     * @var array
     */
    public array $data = [];

    function boot()
    {
        $this->model = $this->user = \Auth::user();
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
        $updated = UserService::update(
            $this->user,
            $this->validate(UserService::rules($this->user->id))
        );

        if (!$updated) {
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
