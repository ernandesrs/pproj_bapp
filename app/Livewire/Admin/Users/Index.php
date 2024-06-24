<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Builders\Breadcrumb;
use App\Livewire\Builders\Pages\Actions\ActionEdit;
use App\Livewire\Builders\Pages\List\ListAction;
use App\Livewire\Builders\Pages\List\Table;
use App\Livewire\Builders\Pages\ListPage;
use App\Models\User;

class Index extends ListPage
{
    function pageListActions()
    {
        return (new ListAction)
            ->addEdit(
                ActionEdit::route('admin.users.edit', ['user' => 'id'])
            );
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
