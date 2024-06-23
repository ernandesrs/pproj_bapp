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
        return $this->pageLayout();
    }

    /**
     * Get view name
     *
     * @return string|null
     */
    function getView(): ?string
    {
        return $this->pageView();
    }

    /**
     * Get page icon
     *
     * @return null|string
     */
    function getIcon(): ?string
    {
        return $this->pageIcon();
    }

    /**
     * Get page title
     *
     * @return null|string
     */
    function getTitle(): ?string
    {
        return $this->pageTitle();
    }

    /**
     * Generate and get a title from breadcrumb
     *
     * @return string
     */
    function getTitleFromBreadcrumb(): string
    {
        return count($this->getBreadcrumb()) == 0 ? $this->getTitle() : implode(' » ', array_map(function ($bread) {
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
        $bread = $this->pageBreadcrumb();
        if (is_null($bread)) {
            $bread = new Breadcrumb;
        }

        if ($withoutHome) {
            return $bread->getBreadcrumbWithoutHome();
        }

        return $bread->getBreadcrumb();
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

