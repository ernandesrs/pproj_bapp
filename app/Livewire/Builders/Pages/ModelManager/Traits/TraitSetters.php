<?php

namespace App\Livewire\Builders\Pages\ModelManager\Traits;

trait TraitSetters
{
    /**
     * Set page model class
     *
     * @return null|string
     */
    function pageModelClass()
    {
        return null;
    }

    /**
     * Set page model service class
     *
     * @return null|bool|string
     */
    function pageModelServiceClass()
    {
        return null;
    }

    /**
     * Set page model policy class
     *
     * @return null|bool|string
     */
    function pageModelPolicyClass()
    {
        return null;
    }

    /**
     * On success redirect
     *
     * @return null|\Closure A function that can receive a Model or null and must return the URL where the user will be redirected in case of success.
     */
    function pageOnSuccessRedirect()
    {
        return null;
    }

    /**
     * On fail redirect
     *
     * @return null|\Closure A function that can receive a Model or null and must return the URL where the user will be redirected in case of failure.
     */
    function pageOnFailRedirect()
    {
        return null;
    }
}
