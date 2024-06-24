<?php

namespace App\Livewire\Builders\Pages\Create\Traits;

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

    /**
     * Get model service class
     *
     * @return null|bool|string
     */
    function getModelServiceClass()
    {
        return $this->pageModelServiceClass();
    }
}
