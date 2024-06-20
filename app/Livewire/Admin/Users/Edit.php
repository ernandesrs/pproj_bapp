<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Makers\Breadcrumb;
use App\Livewire\Makers\Pages\Page;
use App\Livewire\Makers\Pages\PageBase;

class Edit extends PageBase
{
    /**
     * Page
     *
     * @return Page
     */
    function page()
    {
        return (
            new Page(
                'admin.users.edit',
                'Edit',
                (new Breadcrumb)->addItem('Edit', 'person-fill-gear', route('admin.users.edit', ['user' => 0]))
            )
        )
            ->setLayout('admin.layouts.layout1')
            ->setIcon('person-fill-gear');
    }
}
