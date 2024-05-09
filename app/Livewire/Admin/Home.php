<?php

namespace App\Livewire\Admin;

use App\Livewire\Makers\Pages\Page;

class Home extends BaseAdmin
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
                [
                    [
                        'label' => 'Overview',
                        'icon' => 'app',
                        'href' => route('admin.home')
                    ]
                ]
            )
        )
            ->setLayout('admin.layouts.layout1')
            ->setIcon('pie-chart-fill');
    }
}
