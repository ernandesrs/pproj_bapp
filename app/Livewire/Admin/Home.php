<?php

namespace App\Livewire\Admin;

use App\Livewire\Builders\Breadcrumb;
use App\Livewire\Builders\Pages\DefaultPage;

class Home extends DefaultPage
{
    function pageConfig()
    {
        return parent::pageConfig()
            ->setLayout('admin.layouts.layout1')
            ->setView('admin.home')
            ->setTitle('Overview')
            ->setBreadcrumb((new Breadcrumb)->addItem('Overview', 'app', route('admin.home')));
    }
}
