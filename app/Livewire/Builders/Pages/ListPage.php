<?php

namespace App\Livewire\Builders\Pages;

use App\Livewire\Builders\Pages\DefaultPage;
use App\Livewire\Builders\Pages\List\Traits\TraitGetters;
use App\Livewire\Builders\Pages\List\Traits\TraitSetters;
use Illuminate\Database\Eloquent\Model;

class ListPage extends DefaultPage
{
    use TraitGetters, TraitSetters;

    /**
     * Model class
     *
     * @var null|string
     */
    private null|string $modelClass = null;

    /**
     * Model instance
     *
     * @var null|Model
     */
    private null|Model $modelInstance = null;

    /**
     * List items
     *
     * @var mixed
     */
    private mixed $listItems = null;

    /**
     * List limit
     *
     * @var int
     */
    private int $listLimit = 20;

    /**
     * List configuration
     *
     * @var array
     */
    private array $listConfig = [
        'column_labels' => [],
        'column_contents' => []
    ];

    /**
     * List actions(show, edit, delete)
     *
     * @var array
     */
    private array $listActions = [
        'show' => null,
        'edit' => null,
        'delete' => null,
    ];

    /**
     * Page configuration
     *
     * Use this method to configure the page.
     * Return an instance of itself, chaining the configuration methods.
     * Some configuration methods:
     * * setLayout(), setView(), setTitle(), setIcon(), setBreadcrumb(), setAction(), ...
     * * See the trait "\App\Livewire\Builders\Pages\Default\Traits\TraitSetters" for more details and configuration methods.
     *
     * * setModelClass(), setListLimit(), setListColumn(), ...
     * * See the trait "\App\Livewire\Builders\Pages\List\Traits\TraitSetters" for more details and configuration methods.
     *
     * @return null|ListPage
     */
    function pageConfig()
    {
        $this->type = 'list';
        return $this;
    }

    /**
     * Define if the list render button actions
     *
     * @return bool
     */
    function withoutListActions(): bool
    {
        return false;
    }

    /**
     * Load list items
     *
     * @return ListPage
     */
    function loadListItems()
    {
        $this->listItems = $this->getModelInstance()->paginate($this->getListLimit())->withQueryString();
        return $this;
    }

    /**
     * Validate page list data
     *
     * @return void
     */
    function validatePageData()
    {
        throw_if(is_null($this->getModelInstance()), 'Upon return from the public method "pageConfig", overwritten in your Livewire components class, chain a call to the "setModelClass" method');

        parent::validatePageData();
    }
}
