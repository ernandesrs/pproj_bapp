@props([
    'item' => null,
    'subitem' => false,
])

@php
    $show = false;
    if (is_null($item['permissions'] ?? null)) {
        $show = true;
    } else {
        // check permissions
    }

    if ($show) {
        $active = in_array(\Route::currentRouteName(), $item['activeIn'] ?? []);
        $href = $item['href'] ?? '#';
        $styles = ['block px-5 py-2'];

        if (isset($item['route']['name'])) {
            $href = route($item['route']['name'], $item['route']['params'] ?? []);
        }

        if ($subitem) {
            $styles[] = 'border-l-2';
            $styles[] = $active ? 'border-admin-primary' : 'border-admin-light';
        } else {
            $styles[] = 'border-r-4';
            $styles[] = $active ? 'border-admin-primary' : 'border-transparent';
        }
    }
@endphp

@if ($show)
    <a class="{{ implode(' ', $styles) }}"
        href="{{ $href }}" {{ $attributes }}>
        <x-admin.icon name="{{ $item['icon'] }}" class="mr-2" /><span>{{ $item['label'] }}</span>
    </a>
@endif
