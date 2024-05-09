@props([
    'type' => 'button',
    'label' => 'Button label',
    'prependIcon' => null,
    'appendIcon' => null,
    'color' => 'primary',
    'variant' => 'filled',
    'external' => false,
    'disabled' => false,
    'loading' => false,
])

@php
    $colors = [
        'primary' => [
            'filled' => 'border-admin-primary bg-admin-primary text-white',
            'outlined' => 'border-admin-primary text-admin-primary',
            'link' => 'border-none text-admin-primary shadow-none hover:shadow-none',
        ],
        'secondary' => [
            'filled' => 'bg-admin-secondary border-admin-secondary text-white',
            'outlined' => 'border-admin-secondary text-admin-secondary',
            'link' => 'border-none text-admin-secondary shadow-none hover:shadow-none',
        ],
        'success' => [
            'filled' => 'bg-admin-success border-admin-success text-white',
            'outlined' => 'border-admin-success text-admin-success',
            'link' => 'border-none text-admin-success shadow-none hover:shadow-none',
        ],
        'danger' => [
            'filled' => 'bg-admin-danger border-admin-danger text-white',
            'outlined' => 'border-admin-danger text-admin-danger',
            'link' => 'border-none text-admin-danger shadow-none hover:shadow-none',
        ],
        'info' => [
            'filled' => 'bg-admin-info border-admin-info text-white',
            'outlined' => 'border-admin-info text-admin-info',
            'link' => 'border-none text-admin-info shadow-none hover:shadow-none',
        ],
        'light' => [
            'filled' => 'bg-admin-light border-admin-light text-admin-font-light',
            'outlined' => 'border-admin-light text-admin-font-light',
            'link' => 'border-none text-admin-light shadow-none hover:shadow-none',
        ],
        'dark' => [
            'filled' => 'bg-admin-dark border-admin-dark text-white',
            'outlined' => 'border-admin-dark text-admin-dark',
            'link' => 'border-none text-admin-dark shadow-none hover:shadow-none',
        ],
    ];
    $styles = [
        'border px-3 py-2 shadow hover:shadow-md duration-200',
        $colors[$color][$variant] ?? $colors[$color]['filled'],
    ];
    $isLink = $attributes->has('href');

    if (!$external) {
        $attributes = $attributes->merge(['wire:navigate' => true]);
    } else {
        if ($isLink) {
            $attributes = $attributes->merge(['target' => '_blank']);
        }
    }

    if ($disabled) {
        $styles[] = 'pointer-events-none';
    }

    if ($loading) {
        $styles[] = 'animate-pulse';
    }

    $attributes = $attributes->merge(['class' => implode(' ', $styles)]);
@endphp

@if ($isLink)
    <a {{ $attributes->except(['type']) }}>
        @if ($prependIcon)
            <x-admin.icon name="{{ $loading ? 'arrow-clockwise animate-spin inline-block' : $prependIcon }}"
                class="mr-2 pointer-events-none" />
        @endif
        <span class="pointer-events-none">{{ $label }}</span>
        @if ($appendIcon)
            <x-admin.icon name="{{ $loading ? 'arrow-clockwise animate-spin inline-block' : $appendIcon }}"
                class="mr-2 pointer-events-none" />
        @endif
    </a>
@else
    <button {{ $attributes->except(['href', 'target', 'title']) }}>
        @if ($prependIcon)
            <x-admin.icon name="{{ $loading ? 'arrow-clockwise animate-spin inline-block' : $prependIcon }}"
                class="mr-2 pointer-events-none" />
        @endif
        <span class="pointer-events-none">{{ $label }}</span>
        @if ($appendIcon)
            <x-admin.icon name="{{ $loading ? 'arrow-clockwise animate-spin inline-block' : $appendIcon }}"
                class="mr-2 pointer-events-none" />
        @endif
    </button>
@endif
