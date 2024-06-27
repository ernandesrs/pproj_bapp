<?php

namespace App\Livewire\Builders\Pages;

use App\Helpers\Feedback;
use App\Livewire\Builders\Pages\Default\Traits\TraitGetters;
use App\Livewire\Builders\Pages\Default\Traits\TraitSetters;
use Livewire\Component;

class DefaultPage extends Component
{
    use TraitSetters, TraitGetters;

    protected array $fails = [];

    /**
     * Type
     * Allows: default, normal and list
     *
     * @var string
     */
    protected string $type = 'default';

    /**
     * Boot
     *
     * @return void
     */
    function boot()
    {
        $this->type = 'default';
    }

    /**
     * Render Livewire view
     *
     * @return void
     */
    function render()
    {
        $this->validatePageData();

        return view('livewire..' . $this->getView())
            ->layout('livewire..' . ((empty($this->getLayout())) ? 'layouts.layout1' : $this->getLayout()), [
                'title' => $this->getTitleFromBreadcrumb()
            ]);
    }

    /**
     * Feedback instance
     *
     * @return Feedback
     */
    function feedback()
    {
        return (new Feedback)->timer(10000);
    }

    /**
     * Validate page data
     *
     * @return void
     */
    protected function validatePageData()
    {
        if (empty($this->getLayout())) {
            $this->fails[] = 'Override the "pageLayout()" public method, returning the layout path.';
        }

        if (empty($this->getView())) {
            $this->fails[] = 'Override the "pageView()" public method, returning the view path.';
        }

        if (empty($this->pageTitle())) {
            $this->fails[] = 'Override the "pageTitle()" public method, returning the page title.';
        }

        throw_if(count($this->fails) > 0, "In your Livewire component class: " . implode(" | ", $this->fails));
    }
}
