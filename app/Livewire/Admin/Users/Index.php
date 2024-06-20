<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Makers\Breadcrumb;
use App\Livewire\Makers\Pages\PageBase;
use App\Livewire\Makers\Pages\PageList;

class Index extends PageBase
{
    /**
     * Page
     *
     * @return PageList|null
     */
    function page(): PageList|null
    {
        return (
            new PageList(
                'admin.users.index',
                'Users',
                (new Breadcrumb)->addItem('Users', 'people-fill', route('admin.users.index'))
            )
        )
            ->setLayout('admin.layouts.layout1')
            ->setIcon('people-fill')
            ->setModelClass(\App\Models\User::class)
            ->setListColumn('ID', 'id')
            ->setListColumn('Name', null, function ($user) {
                return $user->first_name . ' ' . $user->last_name;
            }, null)
            ->setListColumn('Status', null, null, 'livewire.admin.users.includes.status')
            ->setListColumn('E-mail', 'email');
    }
}
