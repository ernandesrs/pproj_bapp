<?php

namespace App\Livewire\Builders\Pages\ModelManager\Traits;
use Illuminate\Database\Eloquent\Model;

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
     * Get model instance
     *
     * @return null|Model
     */
    function getModelInstance()
    {
        if ($this->modelInstance instanceof Model) {
            return $this->modelInstance;
        }

        return new ($this->pageModelClass())();
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
