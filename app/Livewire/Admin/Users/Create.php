<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Builders\Pages\CreatePage;
use App\Livewire\Builders\Breadcrumb;
use App\Models\User;

class Create extends CreatePage
{
    function pageModelClass()
    {
        return User::class;
    }

    function pageBreadcrumb()
    {
        return (new Breadcrumb)
            ->addItem('Users', 'people-fill', route('admin.users.index'))
            ->addItem('Create', 'person-fill-add', route('admin.users.create'));
    }

    function pageTitle()
    {
        return 'Create user';
    }

    function pageIcon()
    {
        return 'person-fill-add';
    }

    function pageView()
    {
        return 'admin.users.create';
    }

    function pageLayout()
    {
        return 'admin.layouts.layout1';
    }
}
