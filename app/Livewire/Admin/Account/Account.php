<?php

namespace App\Livewire\Admin\Account;

use App\Livewire\Builders\Pages\DefaultPage;
use App\Livewire\Builders\Breadcrumb;

class Account extends DefaultPage
{
    function pageLayout()
    {
        return 'admin.layouts.layout1';
    }

    function pageView()
    {
        return 'admin.account.account';
    }

    function pageIcon()
    {
        return 'person-fill-gear';
    }

    function pageTitle()
    {
        return 'My Account';
    }

    function pageBreadcrumb()
    {
        return (new Breadcrumb)->addItem('My Account', 'app', route('admin.account'));
    }
}
