<?php

namespace App\Livewire\Builders\Pages\Actions;

class ActionEdit extends Action
{
    /**
     * Set action edit route
     *
     * @param \Closure $fn
     * @return ActionEdit
     */
    static function route(\Closure $fn)
    {
        return new Action('route', $fn);
    }
}
