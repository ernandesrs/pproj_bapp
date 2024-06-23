<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Builders\Breadcrumb;
use App\Livewire\Builders\Pages\DefaultPage;
use App\Models\User;

class Edit extends DefaultPage
{
    public User $user;

    function boot(User $user)
    {
        $this->user = $user;
    }

    function pageLayout()
    {
        return 'admin.layouts.layout1';
    }

    function pageView()
    {
        return 'admin.users.edit';
    }

    function pageIcon()
    {
        return 'person-fill-gear';
    }

    function pageTitle()
    {
        return 'Edit user';
    }

    function pageBreadcrumb()
    {
        return (new Breadcrumb)
            ->addItem('Users', 'people-fill', route('admin.users.index'))
            ->addItem('Edit user', 'person-fill-gear', route('admin.users.index'));
    }
}
