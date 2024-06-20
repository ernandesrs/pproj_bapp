<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Makers\Breadcrumb;
use App\Livewire\Makers\Pages\Page;
use App\Livewire\Makers\Pages\PageBase;
use App\Livewire\Makers\Pages\PageList;

class Index extends PageBase
{
    function page(): Page|null
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
            ->setAction('Create user', route('admin.users.create'), 'person-fill-add', 'primary', false);
    }
}
