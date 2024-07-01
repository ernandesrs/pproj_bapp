<?php

namespace App\Livewire\Builders\Pages;

use App\Livewire\Builders\Pages\ModelManager\ModelManager;
use Illuminate\Database\Eloquent\Model;

class CreatePage extends ModelManager
{
    /**
     * Model
     *
     * @var null|Model
     */
    public null|Model $model = null;

    /**
     * Data
     *
     * @var array
     */
    public array $data = [];

    /**
     * Overwriting render() method to check authorization
     *
     * @return void
     */
    function render()
    {
        if ($this->hasPolicy()) {
            $this->authorize('create', $this->getModelClass());
        }

        return parent::render();
    }

    /**
     * Save data on database
     *
     * @return void
     */
    function save()
    {
        if ($this->hasPolicy()) {
            $this->authorize('create', $this->getModelClass());
        }

        $modelService = $this->getModelServiceClass();
        if (!$modelService) {
            return;
        }

        $created = $modelService::create(
            $this->validate($modelService::rules())
        );

        return $this->responseToCreation($created);
    }
}
