<?php

namespace App\Livewire\Builders\Pages\Default\Traits;

use App\Livewire\Builders\Breadcrumb;
use App\Livewire\Builders\Pages\DefaultPage;

trait TraitSetters
{
    /**
     * Set page layout
     *
     * @param string $layout
     * @return DefaultPage
     */
    function setLayout(string $layout)
    {
        $this->layout = $layout;
        return $this;
    }

    function setView(string $view)
    {
        $this->view = $view;
        return $this;
    }

    /**
     * Set page title
     *
     * @param string $title
     * @return DefaultPage
     */
    function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Set page icon
     *
     * @param string $icon
     * @return DefaultPage
     */
    function setIcon(string $icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * Set breadcrumb
     *
     * @param Breadcrumb $breadcrumb
     * @return DefaultPage
     */
    function setBreadcrumb(Breadcrumb $breadcrumb)
    {
        $this->breadcrumb = $breadcrumb;
        return $this;
    }

    /**
     * Set page action
     *
     * @param string $label
     * @return DefaultPage
     */
    function setAction(string $label, string $href, ?string $icon = null, string $color = 'primary', bool $external = false)
    {
        $this->actions[] = [
            'label' => $label,
            'href' => $href,
            'icon' => $icon,
            'color' => $color,
            'external' => $external
        ];
        return $this;
    }
}
