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
     * List configuration
     *
     * @var array
     */
    private array $listConfig = [
        'column_labels' => [],
        'column_contents' => []
    ];

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
     * Define if the list render button actions
     *
     * @return bool
     */
    function withoutListActions(): bool
    {
        return false;
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
     * Get list columns labels
     *
     * @return array
     */
    function getListColumnsLabel()
    {
        return $this->listConfig['column_labels'];
    }

    /**
     * Get list columns content data
     *
     * @return array
     */
    function getListColumnsContent()
    {
        return $this->listConfig['column_contents'];
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
     * Set list columns
     *
     * @param string $label Column label
     * @param string|null $key Key in model to get column value
     * @param \Closure|null $callback Function returning a string with a custom value for the column
     * @param string|null $view Full path to a custom view for the column.
     *                          Note: The list item will be in a variable 'item' and 'model' in the view.
     * @return PageList
     */
    function setListColumn(string $label, ?string $key = null, ?\Closure $callback = null, ?string $view = null)
    {
        $this->listConfig['column_labels'][] = [
            'label' => $label
        ];

        $this->listConfig['column_contents'][] = [
            'key' => $key,
            'callback' => $callback,
            'view' => $view
        ];

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
