<?php

namespace App\Livewire\Builders\Pages\Actions;

use App\Livewire\Builders\Pages\Actions\ListActions\Action;
use App\Livewire\Builders\Pages\Actions\ListActions\ActionDelete;
use App\Livewire\Builders\Pages\Actions\ListActions\ActionEdit;
use App\Livewire\Builders\Pages\Actions\ListActions\ActionShow;

class ListAction
{
    /**
     * Action show
     *
     * @var null|Action|ActionShow
     */
    private null|Action|ActionShow $show = null;

    /**
     * Action edit
     *
     * @var null|Action|ActionEdit
     */
    private null|Action|ActionEdit $edit = null;

    /**
     * Action delete
     *
     * @var null|Action|ActionDelete
     */
    private null|Action|ActionDelete $delete = null;

    /**
     * Add a action show
     *
     * @param Action|ActionShow $show
     * @return ListAction
     */
    function addShow(Action|ActionShow $show)
    {
        $this->show = $show;
        return $this;
    }

    /**
     * Add a action edit
     *
     * @param Action|ActionEdit $edit
     * @return ListAction
     */
    function addEdit(Action|ActionEdit $edit)
    {
        $this->edit = $edit;
        return $this;
    }

    /**
     * Add a action delete
     *
     * @param Action|ActionDelete $delete
     * @return ListAction
     */
    function addDelete(Action|ActionDelete $delete)
    {
        $this->delete = $delete;
        return $this;
    }

    /**
     * Get action show
     *
     * @return null|Action|ActionShow
     */
    function getShow()
    {
        return $this->show;
    }

    /**
     * Get action edit
     *
     * @return null|Action|ActionEdit
     */
    function getEdit()
    {
        return $this->edit;
    }

    /**
     * Get action delete
     *
     * @return null|Action|ActionDelete
     */
    function getDelete()
    {
        return $this->delete;
    }
}
