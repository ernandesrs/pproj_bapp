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
     * Validate page list data
     *
     * @return void
     */
    function validatePageData()
    {
        if (empty($this->pageModelClass())) {
            $this->fails[] = 'Override the "pageModelClass()" public method, returning the model class.';
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
