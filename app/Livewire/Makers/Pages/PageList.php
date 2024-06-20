<?php

namespace App\Livewire\Makers\Pages;

use App\Livewire\Makers\Breadcrumb;

class PageList extends Page
{
    /**
     * Constructor
     *
     * @param string $view
     * @param string $title
     * @param Breadcrumb $breadcrumb
     */
    function __construct(string $view, string $title, Breadcrumb $breadcrumb = new Breadcrumb())
    {
        parent::__construct($view, $title, $breadcrumb);
        $this->type = 'list';
    }

    /**
     * Validate page list data
     *
     * @return void
     */
    function validatePage()
    {
        parent::validatePage();
    }
}
