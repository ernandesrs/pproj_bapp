<?php

namespace App\Livewire\Builders\Pages\List\Traits;

trait TraitSetters
{
    /**
     * Set model class
     *
     * @return null|string
     */
    function pageModelClass()
    {
        return null;
    }

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
     * @return null|\App\Livewire\Builders\Pages\List\ListAction
     */
    function pageListActions()
    {
        return null;
    }
}
