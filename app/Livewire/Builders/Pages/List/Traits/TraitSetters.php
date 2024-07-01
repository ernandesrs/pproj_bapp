<?php

namespace App\Livewire\Builders\Pages\List\Traits;

trait TraitSetters
{
    /**
     * Set list limit
     *
     * @return int
     */
    function pageListLimit()
    {
        return 20;
    }

    /**
     * Set list columns
     *
     * @return null|\App\Livewire\Builders\Pages\List\Table
     */
    function pageTableConfig()
    {
        return null;
    }

    /**
     * Set list actions
     *
     * @return null|\App\Livewire\Builders\Pages\Actions\ListAction
     */
    function pageListActions()
    {
        return null;
    }
}
