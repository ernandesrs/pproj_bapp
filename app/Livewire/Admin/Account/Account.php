<?php

namespace App\Livewire\Admin\Account;

use App\Livewire\Admin\BaseAdmin;
use App\Livewire\Makers\Pages\Page;

class Account extends BaseAdmin
{
    function page(): Page|null
    {
        return (new Page('normal', 'admin.account.account', 'Account', [
            [
                'label' => 'My account',
                'href' => route('admin.account'),
                'icon' => 'person-circle'
            ]
        ]))->setIcon('person-circle');
    }
}
