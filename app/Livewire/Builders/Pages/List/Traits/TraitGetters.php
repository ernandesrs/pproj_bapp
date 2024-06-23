<?php

namespace App\Livewire\Builders\Pages\List\Traits;

use Illuminate\Database\Eloquent\Model;

trait TraitGetters
{
    /**
     * Get list items
     *
     * @return mixed
     */
    function getListItems()
    {
        if (is_null($this->listItems)) {
            $this->loadListItems();
        }

        return $this->listItems;
    }

    /**
     * Get model instance
     *
     * @return null|Model
     */
    function getModelInstance()
    {
        if ($this->modelInstance instanceof Model) {
            return $this->modelInstance;
        }

        return new ($this->pageModelClass())();
    }

    /**
     * Get list limit
     *
     * @return int
     */
    function getListLimit()
    {
        return $this->pageListLimit();
    }

    /**
     * Get list columns labels
     *
     * @return array
     */
    function getListColumnsLabel()
    {
        return $this->pageListTable()->getTableHeadLabels();
    }

    /**
     * Get list columns content data
     *
     * @return array
     */
    function getListColumnsContent()
    {
        return $this->pageListTable()->getTableRowColumns();
    }

    /**
     * Get list actions
     *
     * @return object
     */
    function getModelListActions()
    {
        return (object) $this->listActions;
    }
}
