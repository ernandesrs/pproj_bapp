<?php

namespace App\Livewire\Builders\Pages\List\Traits;

use App\Livewire\Builders\Pages\ListPage;

trait TraitSetters
{
    /**
     * Set model class
     *
     * @return null|string
     */
    function pageModelClass()
    {
        return null;
    }

    /**
     * Set list limit
     *
     * @return int
     */
    function pageListLimit()
    {
        return 20;
    }

    /**
     * Set list columns
     *
     * @return null|\App\Livewire\Builders\Pages\List\Table
     */
    function pageListTable()
    {
        return null;
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
