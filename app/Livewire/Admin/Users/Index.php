<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Builders\Breadcrumb;
use App\Livewire\Builders\Pages\List\Table;
use App\Livewire\Builders\Pages\ListPage;
use App\Models\User;

class Index extends ListPage
{
    function pageLayout()
    {
        return 'admin.layouts.layout1';
    }

    function pageView()
    {
        return 'admin.users.index';
    }

    function pageIcon()
    {
        return 'people-fill';
    }

    function pageTitle()
    {
        return 'Users';
    }

    function pageBreadcrumb()
    {
        return (new Breadcrumb)
            ->addItem('Users', 'people-fill', route('admin.users.index'));
    }

    function pageModelClass()
    {
        return User::class;
    }

    function pageListTable()
    {
        return (new Table)
            ->addColumn('ID', 'id')
            ->addColumn('Name', null, fn($user) => $user->first_name . ' ' . $user->last_name)
            ->addColumn('Status', null, null, 'livewire.admin.users.includes.status')
            ->addColumn('E-mail', 'email');
    }
}
