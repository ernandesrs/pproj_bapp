<?php

namespace App\Livewire\Builders\Pages\Actions\ListActions;

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

    /**
     * Own action: the listing page itself will handle the deletion
     *
     * @return ActionDelete
     */
    static function ownAction()
    {
        return new Action('own_action');
    }
}
