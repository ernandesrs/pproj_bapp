<?php

namespace App\Livewire\Builders\Pages\ModelManager\Traits;

use Illuminate\Database\Eloquent\Model;

trait TraitResponse
{
    /**
     * Response
     *
     * @param Model|null $model
     * @param bool $creating
     * @return void
     */
    function response(?Model $model, bool $creating = true)
    {
        $feedback = $this->feedback();
        if ($model) {
            $feedback->success($creating ? __('admin/phrases.registrations.success_text') : __('admin/phrases.updates.success_text'));

            if ($this->getOnSuccessRedirect()) {
                $feedback->flash();
                return $this->redirect(($this->getOnSuccessRedirect())($model), true);
            } else {
                $feedback->dispatch($this);
                return;
            }
        }

        $feedback->error($creating ? __('admin/phrases.registrations.fail_text') : __('admin/phrases.updates.fail_text'));
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
        return $this->response($editedModel, false);
    }
}
