<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Builders\Pages\DefaultPage;
use App\Livewire\Builders\Breadcrumb;

class Create extends DefaultPage
{
    function pageConfig()
    {
        return parent::pageConfig()
            ->setLayout('admin.layouts.layout1')
            ->setView('admin.users.create')
            ->setTitle('Create')
            ->setIcon('person-plus-fill')
            ->setBreadcrumb((new Breadcrumb)
                ->addItem('Users', 'people-fill', route('admin.users.index'))
                ->addItem('Create', 'person-fill-add', route('admin.users.create')));
    }
}
