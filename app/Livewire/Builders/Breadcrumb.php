<?php

namespace App\Livewire\Builders;

class Breadcrumb
{
    /**
     * Data
     *
     * @var array
     */
    private $data = [];

    /**
     * Add new item in the breadcrumb
     *
     * @param string $label
     * @param string $icon
     * @param string $href
     * @return Breadcrumb
     */
    public function addItem(string $label, string $icon, string $href)
    {
        $this->data[] = [
            'label' => $label,
            'icon' => $icon,
            'href' => $href
        ];
        return $this;
    }

    /**
     * Get breadcrumb
     *
     * @return array
     */
    public function getBreadcrumb()
    {
        $homeRouteName = \Str::replace('/', '', \Route::getCurrentRoute()->getPrefix()) . '.home';

        $breads = $this->data;

        if (\Route::has($homeRouteName)) {
            array_unshift($breads, [
                'label' => 'Home',
                'icon' => 'house-fill',
                'href' => route($homeRouteName)
            ]);
        }

        return $breads;
    }

    /**
     * Get breadcrumb without home link
     *
     * @return array
     */
    public function getBreadcrumbWithoutHome()
    {
        return $this->data;
    }
}
