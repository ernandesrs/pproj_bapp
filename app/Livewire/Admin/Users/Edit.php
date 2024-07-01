<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Builders\Breadcrumb;
use App\Livewire\Builders\Pages\EditPage;
use App\Models\User;
use App\Services\UserService;

class Edit extends EditPage
{
    function mount(User $user)
    {
        $this->model = $this->user = $user;
        $this->data = $user->toArray();
    }

    /**
     * Delete the current model
     *
     * @param integer $id
     * @return void
     */
    function delete(int $id)
    {
        $feedback = $this->feedback()->success(__('admin/phrases.deletions.success_text'));
        if (!$this->model->delete()) {
            $feedback->error(__('admin/phrases.deletions.fail_text'));
        }

        $feedback->flash();

        $this->redirect(route('admin.users.index'), true);
    }

    function pageActions()
    {
        return (new \App\Livewire\Builders\Pages\Actions\PageAction)
            ->addAction(__('common/words.new') . ' ' . strtolower(__('common/words.user')), route('admin.users.create'), 'person-fill-add', 'primary', \Auth::user()->can('create', $this->getModelClass()));
    }

    function pageModelPolicyClass()
    {
        return \App\Policies\UserPolicy::class;
    }

    function pageModelServiceClass()
    {
        return UserService::class;
    }

    function pageModelClass()
    {
        return User::class;
    }

    function pageBreadcrumb()
    {
        return (new Breadcrumb)
            ->addItem(__('common/words.users'), 'people-fill', route('admin.users.index'))
            ->addItem(__('common/words.edit') . ' ' . strtolower(__('common/words.user')), 'person-fill-gear', route('admin.users.edit', ['user' => $this->model->id]));
    }

    function pageTitle()
    {
        return __('common/words.edit') . ' ' . strtolower(__('common/words.user'));
    }

    function pageIcon()
    {
        return 'person-fill-gear';
    }

    function pageView()
    {
        return 'admin.users.edit';
    }

    function pageLayout()
    {
        return 'admin.layouts.layout1';
    }
}
