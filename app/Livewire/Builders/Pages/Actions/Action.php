<?php

namespace App\Livewire\Builders\Pages\Actions;

class Action
{
    public ?string $type = null;
    public ?string $name = null;
    public array $params = [];

    /**
     * Set action route
     *
     * @param string $type action type
     * @param string $name route name
     * @param array $params route params
     * @return Action
     */
    function __construct(string $type, string $name, array $params = [])
    {
        $this->type = $type;
        $this->name = $name;
        $this->params = $params;
    }

    function typeIsRoute()
    {
        return $this->type == 'route';
    }
}
