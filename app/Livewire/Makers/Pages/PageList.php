<?php

namespace App\Livewire\Makers\Pages;

use App\Livewire\Makers\Breadcrumb;
use Illuminate\Database\Eloquent\Model;

class PageList extends Page
{
    /**
     * Model instance
     *
     * @var null|Model
     */
    private null|Model $modelInstance;

    /**
     * List limit
     *
     * @var int
     */
    private int $listLimit = 20;

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
        $this->modelInstance = null;
    }

    /**
     *
     *
     * GETTERS
     *
     *
     */

    /**
     * Get list items
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function getListItems()
    {
        return $this->getModelInstance()->paginate($this->getListLimit())->withQueryString();
    }

    /**
     * Get model instance
     *
     * @return null|Model
     */
    function getModelInstance()
    {
        return $this->modelInstance;
    }

    /**
     * Get list limit
     *
     * @return int
     */
    function getListLimit()
    {
        return $this->listLimit;
    }

    /**
     *
     *
     * SETTERS
     *
     *
     */

    /**
     * Set model class
     *
     * @param string $modelClass
     * @return PageList
     */
    function setModelClass(string $modelClass)
    {
        $this->modelInstance = new $modelClass;
        return $this;
    }

    /**
     * Set list limit
     *
     * @param int $limit
     * @return PageList
     */
    function setListLimit(int $limit = 20)
    {
        $this->listLimit = $limit;
        return $this;
    }

    /**
     * Validate page list data
     *
     * @return void
     */
    function validatePage()
    {
        throw_if(is_null($this->getModelInstance()), 'Need a model! In the public "page" method, implemented in your Livewire component class, on the returned Page instance, you can call a "setModelClass" publict method and set the list model.');

        parent::validatePage();
    }
}
