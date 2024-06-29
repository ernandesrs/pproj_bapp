<?php

namespace App\Livewire\Builders\Pages\Actions;

use App\Livewire\Builders\Pages\Actions\ListActions\Action;
use App\Livewire\Builders\Pages\Actions\ListActions\ActionDelete;
use App\Livewire\Builders\Pages\Actions\ListActions\ActionEdit;
use App\Livewire\Builders\Pages\Actions\ListActions\ActionShow;

class ListAction
{
    /**
     * List actions
     *
     * * show
     *   - por ser uma fn recebendo um id e retornando uma rota para realizar o direcionamento;
     *   - pode ser um action customizado(ignorar por enquanto)
     * * edit
     *   - por ser uma fn recebendo um id e retornando uma rota para realizar o direcionamento;
     *   - pode ser um action customizado(ignorar por enquanto)
     * * delete
     *   - por ser uma fn recebendo um id e retornando uma rota para realizar o direcionamento;
     *   - pode ser o action da propria lista
     *   - pode ser um action customizado(ignorar por enquanto)
     *
     * @var array
     */
    private array $actions = [
        'show' => null,
        'edit' => null,
        'delete' => null,
    ];

    /**
     * Add action
     *
     * @param string $action
     * @param ListActionTypes $actionType
     * @param \Closure|null $closure
     * @param string|null $actionMethod
     * @return ListAction
     */
    private function addAction(
        string $action,
        ListActionTypes $actionType = ListActionTypes::Route,
        ?\Closure $closure = null,
        ?string $actionMethod = null
    ) {
        throw_if(
            $actionType == ListActionTypes::Route && is_null($closure),
            'Needs an anonymous function via $closure parameter receiving an ID and returning the route for targeting.'
        );
        throw_if(
            $actionType == ListActionTypes::Action && is_null($action),
            'Need the name of a method via the $actionMethod parameter receiving an ID to handle the action of "' . $action . '"'
        );

        $this->actions[$action] = [
            'action_type' => $actionType,
            'closure' => $closure,
            'action' => $actionMethod
        ];
        return $this;
    }

    /**
     * Add show
     *
     * @param ListActionTypes $actionType
     * @param \Closure|null $closure
     * @param string|null $actionMethod
     * @return ListAction
     */
    function addShow(
        ?\Closure $closure = null,
        ?string $actionMethod = null,
        ListActionTypes $actionType = ListActionTypes::Route
    ) {
        return $this->addAction('show', $actionType, $closure, $actionMethod);
    }

    /**
     * Add edit
     *
     * @param ListActionTypes $actionType
     * @param \Closure|null $closure
     * @param string|null $actionMethod
     * @return ListAction
     */
    function addEdit(
        ?\Closure $closure = null,
        ?string $actionMethod = null,
        ListActionTypes $actionType = ListActionTypes::Route
    ) {
        return $this->addAction('edit', $actionType, $closure, $actionMethod);
    }

    /**
     * Add delete
     *
     * @param ListActionTypes $actionType
     * @param \Closure|null $closure
     * @param string|null $actionMethod
     * @return ListAction
     */
    function addDelete(
        ?\Closure $closure = null,
        ?string $actionMethod = null,
        ListActionTypes $actionType = ListActionTypes::OwnAction
    ) {
        return $this->addAction('delete', $actionType, $closure, $actionMethod);
    }

    /**
     * Get action show
     *
     * @return null|array
     */
    function getShow()
    {
        return $this->actions['show'];
    }

    /**
     * Get action edit
     *
     * @return null|array
     */
    function getEdit()
    {
        return $this->actions['edit'];
    }

    /**
     * Get action delete
     *
     * @return null|array
     */
    function getDelete()
    {
        return $this->actions['delete'];
    }
}
