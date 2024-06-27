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

    /**
     * Own action: the listing page itself will handle the deletion
     *
     * @return ActionEdit
     */
    static function ownAction()
    {
        return new Action('own_action');
    }
}
