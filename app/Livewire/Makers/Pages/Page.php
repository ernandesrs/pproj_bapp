<?php

namespace App\Livewire\Makers\Pages;

class Page
{
    /**
     * Type
     * Allows: blank, normal and list
     *
     * @var string
     */
    protected string $type = 'blank';

    /**
     * Layout name
     *
     * @var string|null
     */
    protected ?string $layout = null;

    /**
     * View name
     *
     * @var string|null
     */
    protected ?string $view = null;

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
    protected ?string $title = null;

    /**
     * Button actions
     *
     * @var array
     */
    protected array $actions = [];

    /**
     * Breadcrumb
     *
     * @var array
     */
    protected array $breadcrumb = [];

    /**
     * Contructor
     *
     * @param string $blank page type: blank, normal, list
     * @param string $view page livewire view name
     * @param string $title page title
     * @param array $breadcrumb page breadcrumb
     */
    function __construct(
        string $type = 'blank',
        string $view,
        string $title,
        array $breadcrumb = []
    ) {
        $this->type = $type;
        $this->view = $view;
        $this->title = $title;
        $this->breadcrumb = $breadcrumb;
    }

    /**
     *
     *
     * GETTERS
     *
     *
     */

    /**
     * Get page type
     *
     * @return string
     */
    function getType(): string
    {
        return $this->type;
    }

    /**
     * Check if page type is blank
     *
     * @return bool
     */
    function typeIsBlank()
    {
        return $this->type == 'blank';
    }

    /**
     * Check if page type is normal
     *
     * @return bool
     */
    function typeIsNormal()
    {
        return $this->type == 'normal';
    }

    /**
     * Check if page type is list
     *
     * @return bool
     */
    function typeIsList()
    {
        return $this->type == 'list';
    }

    /**
     * Get layout name
     *
     * @return string|null
     */
    function getLayout(): ?string
    {
        return $this->layout;
    }

    /**
     * Get view name
     *
     * @return string
     */
    function getView(): string
    {
        return $this->view;
    }

    /**
     * Get page icon
     *
     * @return string
     */
    function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * Get page title
     *
     * @return string
     */
    function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Generate and get a title from breadcrumb
     *
     * @return string
     */
    function getTitleFromBreadcrumb(): string
    {
        return count($this->getBreadcrumb()) == 0 ? $this->getTitle() : implode(' ≫ ', array_map(function ($bread) {
            return $bread['label'];
        }, $this->getBreadcrumb(true)));
    }

    /**
     * Get page breadcrumb
     *
     * @param boolean $withoutHome
     * @return array
     */
    function getBreadcrumb(bool $withoutHome = false): array
    {
        if ($withoutHome) {
            return $this->breadcrumb;
        }

        $breads = $this->breadcrumb;

        array_unshift($breads, [
            'label' => 'Home',
            'icon' => 'house-fill',
            'href' => route('admin.home')
        ]);

        return $breads;
    }

    /**
     * Get button actions
     *
     * @return array
     */
    function getActions(): array
    {
        return $this->actions;
    }

    /**
     * Check if has button actions
     *
     * @return bool
     */
    function hasActions(): bool
    {
        return count($this->actions) > 0;
    }

    /**
     * Getter
     *
     * @param string $key
     * @return mixed
     */
    function __get(string $key)
    {
        return $this->$key ?? null;
    }

    /**
     *
     *
     * SETTERS
     *
     *
     */

    /**
     * Set page layout
     *
     * @param string $layout
     * @return Page
     */
    function setLayout(string $layout)
    {
        $this->layout = $layout;
        return $this;
    }

    /**
     * Set page icon
     *
     * @param string $icon
     * @return Page
     */
    function setIcon(string $icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * Set page action
     *
     * @param string $label
     * @return Page
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
