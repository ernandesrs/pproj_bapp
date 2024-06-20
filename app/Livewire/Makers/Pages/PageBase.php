<?php

namespace App\Livewire\Makers\Pages;

use App\Livewire\Makers\Pages\Page;
use Livewire\Component;

class PageBase extends Component
{
    /**
     * \App\Livewire\Makers\Pages\Page|\App\Livewire\Makers\Pages\PageList|\App\Livewire\Makers\Pages\PageBlank instance
     *
     * @return Page|PageList|PageBlank|null
     */
    function page()
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
            ->layout('livewire..' . ((empty($this->page()->getLayout())) ? 'layouts.layout1' : $this->page()->getLayout()), [
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
            'Needs a page! Implement in "' . get_class($this) . '" a public method called "page", returning an instance "\App\Livewire\Makers\Pages\Page" or "\App\Livewire\Makers\Pages\PageList" or "\App\Livewire\Makers\Pages\PageBlank".'
        );

        $this->page()->validatePage();
    }
}
