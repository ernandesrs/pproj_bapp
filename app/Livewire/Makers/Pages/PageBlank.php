<?php

namespace App\Livewire\Makers\Pages;

use App\Livewire\Makers\Breadcrumb;

class PageBlank extends Page
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
        $this->type = 'blank';
    }

    /**
     * Validate page blank data
     *
     * @return void
     */
    function validatePage()
    {
        parent::validatePage();
    }
}
