<?php

namespace App\Livewire\Builders\Pages;

use App\Livewire\Builders\Pages\DefaultPage;
use App\Livewire\Builders\Pages\List\Traits\TraitGetters;
use App\Livewire\Builders\Pages\List\Traits\TraitSetters;
use Illuminate\Database\Eloquent\Model;

class ListPage extends DefaultPage
{
    use TraitGetters, TraitSetters;

    /**
     * Model instance
     *
     * @var null|Model
     */
    private null|Model $modelInstance = null;

    /**
     * List items
     *
     * @var mixed
     */
    private mixed $listItems = null;

    /**
     * Mount
     *
     * @return void
     */
    function mount()
    {
        $this->type = 'list';
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
     * Load list items
     *
     * @return ListPage
     */
    function loadListItems()
    {
        $this->listItems = $this->getModelInstance()->paginate($this->getListLimit())->withQueryString();
        return $this;
    }

    /**
     * Edit item
     *
     * @param integer $id
     * @return mixed
     */
    function edit(int $id)
    {
        $routeEdit = $this->getListActions()->getEdit();

        if (!$routeEdit) {
            return;
        }

        return $this->redirect(route($routeEdit->name, $routeEdit->params), true);
    }

    /**
     * Validate page list data
     *
     * @return void
     */
    function validatePageData()
    {
        if (empty($this->pageModelClass())) {
            $this->fails[] = 'Override the "pageModelClass()" public method, returning the model class.';
        }

        if (is_null($this->pageTableConfig())) {
            $this->fails[] = 'Override the "pageTableConfig()" public method, returning a instance of "App\Livewire\Builders\Pages\List\Table".';
        }

        return parent::validatePageData();
    }
}
