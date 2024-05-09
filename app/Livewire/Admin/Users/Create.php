<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Admin\BaseAdmin;
use App\Livewire\Makers\Pages\Page;

class Create extends BaseAdmin
{
    function page(): Page|null
    {
        return (new Page('normal', 'admin.users.create', 'Create', [
            [
                'label' => 'Users',
                'icon' => 'people-fill',
                'href' => route('admin.users.index')
            ],
            [
                'label' => 'Create',
                'icon' => 'person-check',
                'href' => route('admin.users.create')
            ]
        ]))->setIcon('person-fill-add')
            ->setAction('Back to list', route('admin.users.index'), 'arrow-left', 'light', false);
    }
}
