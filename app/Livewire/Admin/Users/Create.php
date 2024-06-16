<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Makers\Pages\Page;
use App\Livewire\Makers\Pages\PageBase;

class Create extends PageBase
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
        ]))
            ->setLayout('admin.layouts.layout1')
            ->setIcon('person-fill-add')
            ->setAction('Back to list', route('admin.users.index'), 'arrow-left', 'light', false);
    }
}
