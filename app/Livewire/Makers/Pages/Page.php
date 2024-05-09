<?php

namespace App\Livewire\Makers\Pages;

class Page
{
    protected ?string $layout = null;
    protected ?string $view = null;
    protected ?string $icon = 'app';
    protected ?string $title = null;
    protected array $breadcrumb = [];

    /**
     * Contructor
     *
     * @param string $view page livewire view name
     * @param string $title page title
     * @param array $breadcrumb page breadcrumb
     */
    function __construct(
        string $view,
        string $title,
        array $breadcrumb = []
    ) {
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
     * Getter
     *
     * @param string $key
     * @return mixed
     */
    function __get(string $key)
    {
        return $this->$key ?? null;
    }
}
