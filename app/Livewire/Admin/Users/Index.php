<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Builders\Breadcrumb;
use App\Livewire\Builders\Pages\ListPage;

class Index extends ListPage
{
    function pageConfig()
    {
        return parent::pageConfig()
            ->setLayout('admin.layouts.layout1')
            ->setView('admin.users.index')
            ->setIcon('people-fill')
            ->setTitle('Users')
            ->setBreadcrumb(
                (new Breadcrumb)->addItem('Users', 'app', route('admin.home'))
            )
            ->setModelClass(\App\Models\User::class)
            ->setModelListActions(
                null,
                \App\Livewire\Builders\Pages\Actions\ActionEdit::route('admin.users.edit', ['user' => 'id']),
                null
            )
            ->setListLimit(20)
            ->setListColumn('ID', 'id')
            ->setListColumn('Custom view', null, null, 'livewire.admin.users.includes.status')
            ->setListColumn('Name', null, fn($user) => $user->first_name . ' ' . $user->last_name, null)
            ->setListColumn('E-mail', 'email');
    }
}
