<?php

namespace App\Livewire\Builders\Pages;

use App\Livewire\Builders\Pages\ModelManager\ModelManager;
use Illuminate\Database\Eloquent\Model;

class EditPage extends ModelManager
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
     * Update model data
     *
     * @return void
     */
    function update()
    {
        $modelService = $this->getModelServiceClass();
        if (!$modelService) {
            return;
        }

        $updated = $modelService::update(
            $this->model,
            $this->validate($modelService::rules($this->model->id))
        );

        return $this->responseToUpdate($updated);
    }

    /**
     * Validate page list data
     *
     * @return void
     */
    function validatePageData()
    {
        if (empty($this->model)) {
            $this->fails[] = 'Load your model using the Livewire "mount()" public method.    ';
        }

        if (!$this->model instanceof (new ($this->pageModelClass())())) {
            $this->fails[] = 'The public property "model" expects an instance of "' . $this->pageModelClass() . '", "' . $this->model::class . '" has been defined.';
        }

        return parent::validatePageData();
    }
}
