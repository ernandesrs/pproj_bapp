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

    function getTableConfig()
    {
        return $this->pageTableConfig();
    }
}
