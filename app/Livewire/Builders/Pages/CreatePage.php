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
     * Save data on database
     *
     * @return void
     */
    function save()
    {
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
