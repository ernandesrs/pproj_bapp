<?php

namespace App\Livewire\Builders\Pages\Actions\ListActions;

class Action
{
    /**
     * Type
     *
     * @var string|null
     */
    public ?string $type = null;

    /**
     * Closure to get route
     *
     * @var \Closure|null
     */
    public ?\Closure $routeClosure = null;

    /**
     * Set action route
     *
     * @param \Closure $fn
     * @return Action
     */
    function __construct(string $type, ?\Closure $fn = null)
    {
        $this->type = $type;
        $this->routeClosure = $fn;
    }

    function typeIsRoute()
    {
        return $this->type == 'route';
    }

    function typeIsOwnAction()
    {
        return $this->type == 'own_action';
    }
}
