<?php

namespace App\Livewire\Builders\Pages;

use App\Livewire\Builders\Pages\Actions\ListActionTypes;
use App\Livewire\Builders\Pages\DefaultPage;
use App\Livewire\Builders\Pages\List\Traits\TraitGetters;
use App\Livewire\Builders\Pages\List\Traits\TraitSetters;
use Illuminate\Database\Eloquent\Model;
use Livewire\WithPagination;

class ListPage extends DefaultPage
{
    use TraitGetters, TraitSetters, WithPagination;

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
        $this->listItems = $this->getModelInstance()->paginate($this->getListLimit());
        return $this;
    }

    /**
     * Show item
     *
     * @param int $id
     * @return mixed
     */
    function show(int $id)
    {
        $actionShow = $this->getListActions()->getShow();
        if (!$actionShow) {
            return;
        }

        if ($actionShow['type'] == ListActionTypes::Route) {
            return $this->redirect(($actionShow['closure'])($id), true);
        }
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

        if ($actionEdit['action_type'] == ListActionTypes::Route) {
            return $this->redirect(($actionEdit['closure'])($id), true);
        }

        if ($actionEdit['action_type'] == ListActionTypes::Action) {
            return;
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

        if ($actionDelete['action_type'] == ListActionTypes::Route) {
            return $this->redirect(($actionDelete['closure'])($id), true);
        }

        if ($actionDelete['action_type'] == ListActionTypes::Action) {
            return;
        }

        if ($actionDelete['action_type'] == ListActionTypes::OwnAction) {
            $model = $this->getModelInstance()->where("id", $id)->firstOrFail();
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
