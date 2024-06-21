<?php

namespace App\Livewire\Builders\Pages\List\Traits;

use Illuminate\Database\Eloquent\Model;

trait TraitGetters
{

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
}
