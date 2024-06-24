<?php

namespace App\Livewire\Builders\Pages;

use App\Livewire\Builders\Pages\Create\Traits\TraitGetters;
use App\Livewire\Builders\Pages\Create\Traits\TraitSetters;
use Illuminate\Database\Eloquent\Model;

class CreatePage extends DefaultPage
{
    use TraitGetters, TraitSetters;

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
        dump($this->data);
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

        return parent::validatePageData();
    }
}
