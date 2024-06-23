<?php

namespace App\Livewire\Builders\Pages\List;

class Table
{
    /**
     * Head labels
     *
     * @var array
     */
    private array $headLabels = [];

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
        $this->headLabels[] = [
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
    function getTableHeadLabels()
    {
        return $this->headLabels;
    }

    /**
     * Get table row column
     *
     * @return array
     */
    function getTableRowColumns()
    {
        return $this->columns;
    }
}
