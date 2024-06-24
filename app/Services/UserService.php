<?php

namespace App\Services;

use Illuminate\Validation\Rule;
use Illuminate\Auth\Authenticatable;
use App\Models\User;

class UserService extends Service
{
    /**
     * Create user
     *
     * @param array $validated
     * @return null|User
     */
    static function create(array $validated = [])
    {
        $validated['data']['password'] = \Hash::make($validated['data']['password']);

        return User::create($validated['data']);
    }

    /**
     * Update user
     *
     * @param Authenticatable|User $user
     * @param array $validated
     * @return null|User
     */
    static function update(Authenticatable|User $user, array $validated = [])
    {
        if (isset($validated['data']['password'])) {
            $validated['data']['password'] = \Hash::make($validated['data']['password']);
        }

        return $user->update($validated["data"]) ? $user->fresh() : null;
    }

    /**
     * User rules
     *
     * @param int|null $id
     * @return array
     */
    static function rules(?int $id = null): array
    {
        $rules = [
            'data.first_name' => ['required', 'max:30'],
            'data.last_name' => ['required', 'max:70'],
            'data.gender' => ['required', Rule::in(['n', 'm', 'f'])],
            'data.password' => ['string', 'confirmed']
        ];

        if ($id) {
            $rules['data.username'] = ['required', 'max:30', 'unique:users,username,' . $id];
        } else {
            $rules['data.username'] = ['required', 'max:30', 'unique:users,username'];
            $rules['data.email'] = ['required', 'email', 'unique:users,email'];
        }

        return $rules;
    }

    /**
     * User rules messages
     *
     * @return array
     */
    static function messages(): array
    {
        return [];
    }
}
