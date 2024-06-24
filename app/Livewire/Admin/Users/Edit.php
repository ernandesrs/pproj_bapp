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
            ->addItem('Users', 'people-fill', route('admin.users.index'))
            ->addItem('Edit user', 'person-fill-gear', route('admin.users.index'));
    }

    function pageTitle()
    {
        return 'Edit user';
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
