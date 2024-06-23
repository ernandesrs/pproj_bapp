<?php

namespace App\Livewire\Builders\Pages;

use App\Livewire\Builders\Pages\Default\Traits\TraitGetters;
use App\Livewire\Builders\Pages\Default\Traits\TraitSetters;
use Livewire\Component;

class DefaultPage extends Component
{
    use TraitSetters, TraitGetters;

    /**
     * Type
     * Allows: default, normal and list
     *
     * @var string
     */
    protected string $type = 'default';

    /**
     * Button actions
     *
     * @var array
     */
    protected array $actions = [];

    /**
     * Mount
     *
     * @return void
     */
    function mount()
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
     * Validate page data
     *
     * @return void
     */
    protected function validatePageData()
    {
        $fails = [];

        if (empty($this->getLayout())) {
            $fails[] = 'Override the "pageLayout()" public method, returning the layout path.';
        }

        if (empty($this->getView())) {
            $fails[] = 'Override the "pageView()" public method, returning the view path.';
        }

        if (empty($this->pageTitle())) {
            $fails[] = 'Override the "pageTitle()" public method, returning the page title.';
        }

        throw_if(count($fails) > 0, "In your Livewire component class: " . implode(" | ", $fails));
    }
}
