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
            ->addEdit(fn($id) => route('admin.users.edit', ['user' => $id]))
            ->addDelete();
    }

    function pageTableConfig()
    {
        return (new Table)
            ->addColumn('ID', 'id')
            ->addColumn(__('common/words.name'), null, fn($user) => $user->first_name . ' ' . $user->last_name)
            ->addColumn(__('common/words.status'), null, null, 'livewire.admin.users.includes.status')
            ->addColumn(__('common/words.email'), 'email');
    }

    function pageModelClass()
    {
        return User::class;
    }

    function pageActions()
    {
        return (new \App\Livewire\Builders\Pages\Actions\PageAction)
            ->addAction(__('common/words.new') . ' ' . strtolower(__('common/words.user')), route('admin.users.create'), 'person-fill-add');
    }

    function pageBreadcrumb()
    {
        return (new Breadcrumb)
            ->addItem(__('common/words.users'), 'people-fill', route('admin.users.index'));
    }

    function pageTitle()
    {
        return __('common/words.users');
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
