<?php

namespace App\Livewire\Builders\Pages\List;

use App\Livewire\Builders\Pages\Actions\Action;
use App\Livewire\Builders\Pages\Actions\ActionDelete;
use App\Livewire\Builders\Pages\Actions\ActionEdit;
use App\Livewire\Builders\Pages\Actions\ActionShow;

class Table
{
    /**
     * Head labels
     *
     * @var array
     */
    private array $columnsLabels = [];

    /**
     * Columns
     *
     * @var array
     */
    private array $columns = [];

    /**
     * Add table column
     *
     * @param string $label
     * @param string|null $key
     * @param \Closure|null $callback
     * @param string|null $view
     * @return Table
     */
    function addColumn(string $label, ?string $key = null, ?\Closure $callback = null, ?string $view = null)
    {
        $this->columnsLabels[] = [
            'label' => $label
        ];

        $this->columns[] = [
            'key' => $key,
            'callback' => $callback,
            'view' => $view
        ];

        return $this;
    }

    /**
     * Get table head labels
     *
     * @return array
     */
    function getColumnLabels()
    {
        return $this->columnsLabels;
    }

    /**
     * Get table row column
     *
     * @return array
     */
    function getRowColumns()
    {
        return $this->columns;
    }
}
