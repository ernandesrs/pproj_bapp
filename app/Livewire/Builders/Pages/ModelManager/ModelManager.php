<?php

namespace App\Livewire\Builders\Pages\ModelManager;

use App\Livewire\Builders\Pages\DefaultPage;
use App\Livewire\Builders\Pages\ModelManager\Traits\TraitResponse;
use App\Livewire\Builders\Pages\ModelManager\Traits\TraitGetters;
use App\Livewire\Builders\Pages\ModelManager\Traits\TraitSetters;

class ModelManager extends DefaultPage
{
    use TraitGetters, TraitSetters, TraitResponse;

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
