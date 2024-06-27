<?php

namespace App\Livewire\Builders\Pages\Actions;

class ActionDelete extends Action
{
    /**
     * Set action edit route
     *
     * @param \Closure $fn
     * @return ActionDelete
     */
    static function route(\Closure $fn)
    {
        return new Action('route', $fn);
    }
}
