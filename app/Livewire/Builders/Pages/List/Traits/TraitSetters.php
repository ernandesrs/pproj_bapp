<?php

namespace App\Livewire\Builders\Pages\List\Traits;

use App\Livewire\Builders\Pages\ListPage;

trait TraitSetters
{
    /**
     * Set model class
     *
     * @param string $modelClass
     * @return ListPage
     */
    function setModelClass(string $modelClass)
    {
        $this->modelClass = $modelClass;
        return $this;
    }

    /**
     * Set list limit
     *
     * @param int $limit
     * @return ListPage
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
     * @return ListPage
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
     * Set list actions
     *
     * @param null|\App\Livewire\Builders\Pages\Actions\Action|\App\Livewire\Builders\Pages\Actions\ActionShow $show set show action
     * @param null|\App\Livewire\Builders\Pages\Actions\Action|\App\Livewire\Builders\Pages\Actions\ActionEdit $edit set edit action
     * @param null|\App\Livewire\Builders\Pages\Actions\Action|\App\Livewire\Builders\Pages\Actions\ActionDelete $delete set delete action
     * @return ListPage
     */
    function setModelListActions(
        null|\App\Livewire\Builders\Pages\Actions\Action|\App\Livewire\Builders\Pages\Actions\ActionShow $show = null,
        null|\App\Livewire\Builders\Pages\Actions\Action|\App\Livewire\Builders\Pages\Actions\ActionEdit $edit = null,
        null|\App\Livewire\Builders\Pages\Actions\Action|\App\Livewire\Builders\Pages\Actions\ActionDelete $delete = null,
    ) {
        $this->listActions['show'] = $show;
        $this->listActions['edit'] = $edit;
        $this->listActions['delete'] = $delete;
        return $this;
    }
}
