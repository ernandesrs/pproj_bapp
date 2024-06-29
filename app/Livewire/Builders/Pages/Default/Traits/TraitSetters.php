<?php

namespace App\Livewire\Builders\Pages\Default\Traits;

use App\Livewire\Builders\Breadcrumb;
use App\Livewire\Builders\Pages\Actions\PageAction;

trait TraitSetters
{
    /**
     * Set page layout
     *
     * @return null|string
     */
    function pageLayout()
    {
        return null;
    }

    /**
     * Set page view
     *
     * @return null|string
     */
    function pageView()
    {
        return null;
    }

    /**
     * Set page icon
     *
     * @return null|string
     */
    function pageIcon()
    {
        return null;
    }

    /**
     * Set page title
     *
     * @return null|string
     */
    function pageTitle()
    {
        return null;
    }

    /**
     * Set breadcrumb
     *
     * @return null|Breadcrumb
     */
    function pageBreadcrumb()
    {
        return null;
    }

    /**
     * Set page action
     *
     * @return null|PageAction
     */
    function pageActions()
    {
        return null;
    }
}
