<?php

namespace App\Livewire\Makers\Pages;

use App\Livewire\Makers\Breadcrumb;

class Page
{
    /**
     * Type
     * Allows: blank, normal and list
     *
     * @var string
     */
    protected string $type = 'blank';

    /**
     * Layout name
     *
     * @var string|null
     */
    protected ?string $layout = null;

    /**
     * View name
     *
     * @var string|null
     */
    protected ?string $view = null;

    /**
     * Icon
     *
     * @var string|null
     */
    protected ?string $icon = 'app';

    /**
     * Title
     *
     * @var string|null
     */
    protected ?string $title = null;

    /**
     * Button actions
     *
     * @var array
     */
    protected array $actions = [];

    /**
     * Breadcrumb
     *
     * @var Breadcrumb
     */
    protected Breadcrumb $breadcrumb;

    /**
     * Contructor
     *
     * @param string $view page livewire view name
     * @param string $title page title
     * @param array $breadcrumb page breadcrumb
     */
    function __construct(
        string $view,
        string $title,
        Breadcrumb $breadcrumb = new Breadcrumb()
    ) {
        $this->type = 'normal';
        $this->view = $view;
        $this->title = $title;
        $this->breadcrumb = $breadcrumb;
    }

    /**
     *
     *
     * GETTERS
     *
     *
     */

    /**
     *
     *
     * SETTERS
     *
     *
     */


    /**
     * Validate page data
     *
     * @return void
     */
    function validatePage()
    {
        //
    }
}
