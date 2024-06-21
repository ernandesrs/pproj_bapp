<?php

namespace App\Livewire\Builders\Pages;

use App\Livewire\Builders\Breadcrumb;
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
     * Layout name
     *
     * @var string
     */
    protected string $layout = '';

    /**
     * View name
     *
     * @var string
     */
    protected string $view = '';

    /**
     * Icon
     *
     * @var string|null
     */
    protected ?string $icon = 'app';

    /**
     * Title
     *
     * @var string|null
     */
    protected ?string $title = '';

    /**
     * Button actions
     *
     * @var array
     */
    protected array $actions = [];

    /**
     * Breadcrumb
     *
     * @var null|Breadcrumb
     */
    protected null|Breadcrumb $breadcrumb = null;

    /**
     * Page configuration
     *
     * Use this method to configure the page.
     * Return an instance of itself, chaining the configuration methods.
     * Some configuration methods:
     * setLayout(), setView(), setTitle(), setIcon(), setBreadcrumb(), setAction(), ...
     *
     * See the trait "\App\Livewire\Builders\Pages\Default\Traits\TraitSetters" for more details and configuration methods.
     *
     * @return null|DefaultPage
     */
    function pageConfig()
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
        $this->pageConfig();
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
        throw_if(
            is_null($this->pageConfig()),
            'In your Livewire component class, override the public "pageConfig()" method and return the instance of the class itself.'
        );

        throw_if(
            empty($this->getLayout()) || empty($this->getView()),
            'Need basic settings! In your Livewire component class, override the public "pageConfig()" method and return the instance of the class itself. Open the method and see your documentation/comments.'
        );
    }
}
