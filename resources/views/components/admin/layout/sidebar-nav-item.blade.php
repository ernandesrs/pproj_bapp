@props([
    'navItem' => [
        'label' => 'Item text',
        'icon' => 'app-fill',
        'route' => null,
        'href' => '#',
        'title' => 'Item text title',
        'activeIn' => [],
        'permissions' => null,
    ],
])

@php
    $active = in_array(\Route::currentRouteName(), $navItem['activeIn'] ?? []);

    $style = [
        'border-r-4 border-transparent px-10 py-2 flex items-center hover:bg-admin-light hover:bg-opacity-5 duration-100',
    ];

    if ($active) {
        $style[] = 'bg-admin-light bg-opacity-10 border-admin-primary';
    }
@endphp

<x-admin.layout.sidebar-nav-item-base
    :style="$style"
    :nav-item="$navItem"
    :active="$active" />
