<?php

namespace App\Livewire\Admin\Account;

use App\Livewire\Builders\Pages\DefaultPage;
use App\Livewire\Builders\Breadcrumb;

class Account extends DefaultPage
{
    function pageConfig()
    {
        return $this
            ->setLayout('admin.layouts.layout1')
            ->setView('admin.account.account')
            ->setBreadcrumb((new Breadcrumb)->addItem('Account', 'person-fill-gear', route('admin.account')))
            ->setTitle('Account')
            ->setIcon('person-fill-gear');
    }
}
