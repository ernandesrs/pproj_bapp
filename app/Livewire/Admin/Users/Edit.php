<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Builders\Breadcrumb;
use App\Livewire\Builders\Pages\DefaultPage;

class Edit extends DefaultPage
{
    function pageConfig()
    {
        return parent::pageConfig()
            ->setLayout('admin.layouts.layout1')
            ->setView('admin.users.edit')
            ->setTitle('Edit')
            ->setIcon('person-fill-gear')
            ->setBreadcrumb((new Breadcrumb)
                ->addItem('Users', 'people-fill', route('admin.users.index'))
                ->addItem('Edit', 'person-fill-gear', route('admin.users.edit', ['user' => 1])));
    }
}
