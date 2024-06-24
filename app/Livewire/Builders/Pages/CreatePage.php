<?php

namespace App\Livewire\Builders\Pages;

use App\Livewire\Builders\Pages\Create\Traits\TraitResponse;
use App\Livewire\Builders\Pages\Create\Traits\TraitGetters;
use App\Livewire\Builders\Pages\Create\Traits\TraitSetters;
use Illuminate\Database\Eloquent\Model;

class CreatePage extends DefaultPage
{
    use TraitGetters, TraitSetters, TraitResponse;

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

        return parent::validatePageData();
    }
}
