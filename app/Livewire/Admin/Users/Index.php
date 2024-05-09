<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Admin\BaseAdmin;
use App\Livewire\Makers\Pages\Page;

class Index extends BaseAdmin
{
    function page(): Page|null
    {
        return (new Page('list', 'admin.users.index', 'Users', [
            [
                'label' => 'Users',
                'icon' => 'people-fill',
                'href' => route('admin.users.index')
            ]
        ]))->setIcon('people-fill')
            ->setAction('Create user', route('admin.users.create'), 'person-fill-add', 'success', false);
    }
}
