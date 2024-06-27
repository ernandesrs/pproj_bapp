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
     * Boot
     *
     * @return void
     */
    function boot()
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
     * @param int $id
     * @return mixed
     */
    function edit(int $id)
    {
        $actionEdit = $this->getListActions()->getEdit();
        if (!$actionEdit) {
            return;
        }

        $model = $this->getModelInstance()->where("id", $id)->firstOrFail();
        if ($actionEdit->typeIsRoute()) {
            return $this->redirect(($actionEdit->routeClosure)($model), true);
        }

        return;
    }

    /**
     * Delete item
     *
     * @param int $id
     * @return mixed
     */
    function delete(int $id)
    {
        $actionDelete = $this->getListActions()->getDelete();

        if (!$actionDelete) {
            return;
        }

        $model = $this->getModelInstance()->where("id", $id)->firstOrFail();

        if ($actionDelete->typeIsRoute()) {
            return $this->redirect(($actionDelete->routeClosure)($model), true);
        }

        if ($actionDelete->typeIsOwnAction()) {
            $feedback = $this->feedback()->success("Success on delete.");

            if (!$model->delete()) {
                $feedback->error('Fail on delete.');
            }

            $feedback->dispatch($this);
        }
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
