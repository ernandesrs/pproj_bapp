<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Builders\Pages\DefaultPage;
use App\Livewire\Builders\Breadcrumb;

class Create extends DefaultPage
{
    function pageLayout()
    {
        return 'admin.layouts.layout1';
    }

    function pageView()
    {
        return 'admin.users.create';
    }

    function pageIcon()
    {
        return 'person-fill-add';
    }

    function pageTitle()
    {
        return 'Create user';
    }

    function pageBreadcrumb()
    {
        return (new Breadcrumb)
            ->addItem('Users', 'people-fill', route('admin.users.index'))
            ->addItem('Create', 'person-fill-add', route('admin.users.create'));
    }
}
