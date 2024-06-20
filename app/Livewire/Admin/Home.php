<?php

namespace App\Livewire\Admin;

use App\Livewire\Makers\Breadcrumb;
use App\Livewire\Makers\Pages\PageBase;
use App\Livewire\Makers\Pages\PageBlank;

class Home extends PageBase
{
    /**
     * Page
     *
     * @return PageBlank|null
     */
    function page(): ?PageBlank
    {
        return (
            new PageBlank(
                'admin.home',
                'Overview',
                (new Breadcrumb)->addItem('Overview', 'app', route('admin.home'))
            )
        )->setLayout('admin.layouts.layout1')
            ->setIcon('pie-chart-fill');
    }
}
