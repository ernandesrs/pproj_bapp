<?php

namespace App\Livewire\Builders\Pages\Edit\Traits;

trait TraitGetters
{
    /**
     * Get page model class
     *
     * @return null|string
     */
    function getModelClass()
    {
        return $this->pageModelClass();
    }
}
