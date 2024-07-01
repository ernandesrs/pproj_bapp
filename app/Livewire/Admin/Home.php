<?php

namespace App\Livewire\Admin;

use App\Livewire\Builders\Pages\DefaultPage;

class Home extends DefaultPage
{
    function pageTitle()
    {
        return __('common/words.overview');
    }

    function pageView()
    {
        return 'admin.home';
    }

    function pageLayout()
    {
        return 'admin.layouts.layout1';
    }
}
