<?php

namespace App\Livewire\Admin;

use App\Livewire\Makers\Breadcrumb;
use App\Livewire\Makers\Pages\Page;
use App\Livewire\Makers\Pages\PageBase;

class Home extends PageBase
{
    /**
     * Page
     *
     * @return Page|null
     */
    function page(): ?Page
    {
        return (
            new Page(
                'blank',
                'admin.home',
                'Overview',
                (new Breadcrumb)->addItem('Overview', 'app', route('admin.home'))
            )
        )->setLayout('admin.layouts.layout1')
            ->setIcon('pie-chart-fill');
    }
}
