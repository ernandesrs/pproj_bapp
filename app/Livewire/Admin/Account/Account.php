<?php

namespace App\Livewire\Admin\Account;

use App\Livewire\Makers\Breadcrumb;
use App\Livewire\Makers\Pages\Page;
use App\Livewire\Makers\Pages\PageBase;

class Account extends PageBase
{
    function page(): Page|null
    {
        return (
            new Page(
                'normal',
                'admin.account.account',
                'Account',
                (new Breadcrumb)->addItem('My account', 'person-circle', route('admin.account'))
            )
        )
            ->setLayout('admin.layouts.layout1')
            ->setIcon('person-circle');
    }
}
