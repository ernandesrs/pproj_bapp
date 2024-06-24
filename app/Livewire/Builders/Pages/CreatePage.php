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
        $modelService = $this->getModelServiceClass();
        if (!$modelService) {
            return;
        }

        $created = $modelService::create(
            $this->validate($modelService::rules())
        );

        if (!$created) {
            $this->feedback()->error('Fail on create a new user!')->dispatch($this);
        }

        $this->feedback()->success('A new user has ben created with success!')->flash();

        return $this->redirect(route('admin.users.edit', ['user' => $created->id]), true);
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
