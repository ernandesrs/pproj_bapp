<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Builders\Breadcrumb;
use App\Livewire\Builders\Pages\List\Table;
use App\Livewire\Builders\Pages\ListPage;
use App\Models\User;

class Index extends ListPage
{
    function pageListActions()
    {
        return (new \App\Livewire\Builders\Pages\Actions\ListAction)
            ->addEdit(\App\Livewire\Builders\Pages\Actions\ListActions\ActionEdit::route(fn($id) => route('admin.users.edit', ['user' => $id])))
            ->addDelete(\App\Livewire\Builders\Pages\Actions\ListActions\ActionDelete::ownAction());
    }

    function pageTableConfig()
    {
        return (new Table)
            ->addColumn('ID', 'id')
            ->addColumn('Name', null, fn($user) => $user->first_name . ' ' . $user->last_name)
            ->addColumn('Status', null, null, 'livewire.admin.users.includes.status')
            ->addColumn('E-mail', 'email');
    }

    function pageModelClass()
    {
        return User::class;
    }

    function pageActions()
    {
        return (new \App\Livewire\Builders\Pages\Actions\PageAction)
            ->addAction('New user', route('admin.users.create'), 'person-fill-add');
    }

    function pageBreadcrumb()
    {
        return (new Breadcrumb)
            ->addItem('Users', 'people-fill', route('admin.users.index'));
    }

    function pageTitle()
    {
        return 'Users';
    }

    function pageIcon()
    {
        return 'people-fill';
    }

    function pageView()
    {
        return 'admin.users.index';
    }

    function pageLayout()
    {
        return 'admin.layouts.layout1';
    }
}
