@props([
    'color' => 'default',
    'text' => null,
])

@php
    $colors = [
        'default' => 'text-admin-font-light text-opacity-75',
        'danger' => 'text-admin-danger',
        'success' => 'text-admin-success',
    ];
@endphp

<span
    class="block text-sm font-normal italic mt-1 {{ $colors[$color] ?? $colors['default'] }}">{{ $text }}</span>
