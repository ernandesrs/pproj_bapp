<?php

namespace App\Livewire\Builders\Pages\Actions;

class PageAction
{
    /**
     * Actions
     *
     * @var array
     */
    private array $actions = [];

    /**
     * Add page action
     *
     * @param string $label
     * @param string $href
     * @param string|null $icon
     * @param string $color
     * @param bool $show
     * @param bool $external
     * @return PageAction
     */
    function addAction(string $label, string $href, ?string $icon = null, string $color = 'primary', bool $show = true, bool $external = false)
    {
        $this->actions[] = [
            'label' => $label,
            'href' => $href,
            'icon' => $icon,
            'color' => $color,
            'show' => $show,
            'external' => $external
        ];
        return $this;
    }

    /**
     * Get actions
     *
     * @return array
     */
    function getActions()
    {
        return $this->actions;
    }

    /**
     * Has actions
     *
     * @return bool
     */
    function hasActions()
    {
        return count($this->actions) > 0;
    }
}
