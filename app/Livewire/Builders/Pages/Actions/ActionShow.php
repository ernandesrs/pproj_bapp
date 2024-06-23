<?php

namespace App\Livewire\Builders\Pages\Actions;

class ActionShow extends Action
{
    /**
     * Set action edit route
     *
     * @param string $name route name
     * @param array $params route params
     *
     * @return ActionShow
     */
    static function route(string $name, array $params = [])
    {
        return new Action('route', $name, $params);
    }
}
