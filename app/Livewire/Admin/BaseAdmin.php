<?php

namespace App\Livewire\Admin;

use App\Livewire\Makers\Pages\Page;
use Livewire\Component;

class BaseAdmin extends Component
{
    /**
     * \App\Livewire\Makers\Pages\Page instance
     *
     * @return Page|null
     */
    function page(): ?Page
    {
        return null;
    }

    /**
     * Render Livewire view
     *
     * @return void
     */
    function render()
    {
        $this->validatePage();

        return view('livewire..' . $this->page()->getView())
            ->layout('livewire..' . $this->page()->getLayout() ?? 'admin.layouts.layout1', [
                'title' => $this->page()->getTitleFromBreadcrumb()
            ]);
    }

    /**
     * Validate page
     *
     * @return void
     */
    private function validatePage()
    {
        throw_if(
            is_null($this->page()),
            'An instance of "\App\Livewire\Makers\Pages\Page" required! Implement in "' . get_class($this) . '" a public method called "page", returning an instance "\App\Livewire\Makers\Pages\Page".'
        );
    }
}
