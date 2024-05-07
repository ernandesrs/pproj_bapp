@props([
    'navItem' => [
        'label' => 'Item text',
        'icon' => 'app-fill',
        'route' => null,
        'href' => '#',
        'title' => 'Item text title',
        'permissions' => null,
    ],
    'style' => [],
    'active' => false,
])

@php
    $show = false;

    if (is_null($navItem['permissions'] ?? null)) {
        $show = true;
    } else {
        // check if logged user has permissions to see this navigation item
    }
@endphp

@if ($show)
    <a
        wire:navigate
        class="{{ implode(' ', $style) }}"
        href="{{ isset($navItem['route']) ? route($navItem['route']['name'], $navItem['route']['params'] ?? []) : $navItem['href'] }}"
        title="{{ $navItem['title'] ?? $navItem['label'] }}">
        <span class="bi bi-{{ $navItem['icon'] }} {{ $active ? 'ml-3' : '' }}"></span>
        <span class="ml-3">
            {{ $navItem['label'] }}
        </span>
    </a>
@endif
