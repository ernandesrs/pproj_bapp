<?php

namespace App\Livewire\Builders\Pages\Actions\ListActions;

class ActionShow extends Action
{
    /**
     * Set action edit route
     *
     * @param \Closure $fn
     *
     * @return ActionShow
     */
    static function route(\Closure $fn)
    {
        return new Action('route', $fn);
    }
}
