<?php

namespace App\Livewire\Builders\Pages\ModelManager\Traits;

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

    /**
     * Get on success redirect
     *
     * @return null|\Closure
     */
    function getOnSuccessRedirect()
    {
        return $this->pageOnSuccessRedirect();
    }

    /**
     * Get on fail redirect
     *
     * @return null|\Closure
     */
    function getOnFailRedirect()
    {
        return $this->pageOnFailRedirect();
    }
}
