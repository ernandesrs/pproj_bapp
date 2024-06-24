<?php

namespace App\Livewire\Builders\Pages;

use App\Livewire\Builders\Pages\Edit\Traits\TraitGetters;
use App\Livewire\Builders\Pages\Edit\Traits\TraitSetters;
use Illuminate\Database\Eloquent\Model;

class EditPage extends DefaultPage
{
    use TraitSetters, TraitGetters;

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

        if (!$updated) {
            $this->feedback()->error('Fail on update!')->dispatch($this);
        }

        $this->feedback()->success('Success on update!')->dispatch($this);
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

        if (!is_bool($this->pageModelServiceClass()) && empty($this->pageModelServiceClass())) {
            $this->fails[] = 'Override the "pageModelServiceClass()" public method, returning the model service class or false.';
        }

        if (empty($this->model)) {
            $this->fails[] = 'Load your model using the Livewire "mount()" public method.    ';
        }

        if (!$this->model instanceof (new ($this->pageModelClass())())) {
            $this->fails[] = 'The public property "model" expects an instance of "' . $this->pageModelClass() . '", "' . $this->model::class . '" has been defined.';
        }

        return parent::validatePageData();
    }
}
