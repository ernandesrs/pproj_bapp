<?php

namespace App\Livewire\Admin\Account;

use App\Livewire\Makers\Pages\Page;
use App\Livewire\Makers\Pages\PageBase;

class Account extends PageBase
{
    function page(): Page|null
    {
        return (new Page('normal', 'admin.account.account', 'Account', [
            [
                'label' => 'My account',
                'href' => route('admin.account'),
                'icon' => 'person-circle'
            ]
        ]))
            ->setLayout('admin.layouts.layout1')
            ->setIcon('person-circle');
    }
}
