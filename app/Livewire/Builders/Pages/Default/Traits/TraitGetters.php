<?php

namespace App\Livewire\Builders\Pages\Default\Traits;

use App\Livewire\Builders\Breadcrumb;

trait TraitGetters
{
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
        if (is_null($this->breadcrumb)) {
            $this->breadcrumb = new Breadcrumb;
        }

        if ($withoutHome) {
            return $this->breadcrumb->getBreadcrumbWithoutHome();
        }

        return $this->breadcrumb->getBreadcrumb();
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
}

