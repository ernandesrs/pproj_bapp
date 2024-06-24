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

        $feedback = $this->feedback();
        if ($created) {
            $feedback->success('Created with success!');

            if ($this->getOnSuccessRedirect()) {
                $feedback->flash();
                return $this->redirect(($this->getOnSuccessRedirect())($created), true);
            } else {
                $feedback->dispatch($this);
                return;
            }
        }

        $feedback->error('Fail on create!');
        if ($this->getOnFailRedirect()) {
            $feedback->flash();
            return $this->redirect(($this->getOnFailRedirect())($created), true);
        }

        $feedback->dispatch($this);
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
