<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserPolicy extends BasePolicy
{
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Model $model): bool
    {
        // prohibits excluding oneself
        if ($user->id == $model->id) {
            return false;
        }

        return parent::delete($user, $model);
    }
}
