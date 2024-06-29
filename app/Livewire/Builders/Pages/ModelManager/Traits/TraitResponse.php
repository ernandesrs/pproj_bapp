<?php

namespace App\Livewire\Builders\Pages\ModelManager\Traits;

use Illuminate\Database\Eloquent\Model;

trait TraitResponse
{
    /**
     * Response
     *
     * @param Model|null $model
     * @return void
     */
    function response(?Model $model)
    {
        $feedback = $this->feedback();
        if ($model) {
            $feedback->success('Created with success!');

            if ($this->getOnSuccessRedirect()) {
                $feedback->flash();
                return $this->redirect(($this->getOnSuccessRedirect())($model), true);
            } else {
                $feedback->dispatch($this);
                return;
            }
        }

        $feedback->error('Fail on create!');
        if ($this->getOnFailRedirect()) {
            $feedback->flash();
            return $this->redirect(($this->getOnFailRedirect())($model), true);
        }

        $feedback->dispatch($this);
    }

    /**
     * Create response
     *
     * @param Model|null $createdModel
     * @return void
     */
    function responseToCreation(?Model $createdModel)
    {
        return $this->response($createdModel);
    }

    /**
     * Edit response
     *
     * @param Model|null $editedModel
     * @return void
     */
    function responseToUpdate(?Model $editedModel)
    {
        return $this->response($editedModel);
    }
}
