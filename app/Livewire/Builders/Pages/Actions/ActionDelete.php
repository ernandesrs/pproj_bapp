<?php

namespace App\Livewire\Builders\Pages\Actions;

class ActionDelete extends Action
{
    /**
     * Set action edit route
     *
     * @param string $name route name
     * @param array $params route params
     *
     * @return ActionDelete
     */
    static function route(string $name, array $params = [])
    {
        return new Action('route', $name, $params);
    }
}
