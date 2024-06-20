@props([
    'label' => 'Button text',
    'appendIcon' => null,
    'prependIcon' => null,
    'loading' => false,
])

@php
    $isLink = $attributes->has('href');

    $attributes = $attributes->merge([
        'class'=>'px-5 py-2 bg-slate-100 hover:bg-slate-300 duration-300 text-slate-500 hover:text-slate-600'
    ]);
@endphp

@if ($isLink)
    <a {{ $attributes->except(['type']) }}>
        @if ($prependIcon)
            <x-common.icon name="{{ $loading ? 'arrow-clockwise animate-spin inline-block' : $prependIcon }}"
                class="mr-2 pointer-events-none" />
        @endif
        <span class="pointer-events-none">{{ $label }}</span>
        @if ($appendIcon)
            <x-common.icon name="{{ $loading ? 'arrow-clockwise animate-spin inline-block' : $appendIcon }}"
                class="mr-2 pointer-events-none" />
        @endif
    </a>
@else
    <button {{ $attributes->except(['href', 'target', 'title', 'wire:navigate']) }}>
        @if ($prependIcon)
            <x-common.icon name="{{ $loading ? 'arrow-clockwise animate-spin inline-block' : $prependIcon }}"
                class="mr-2 pointer-events-none" />
        @endif
        <span class="pointer-events-none">{{ $label }}</span>
        @if ($appendIcon)
            <x-common.icon name="{{ $loading ? 'arrow-clockwise animate-spin inline-block' : $appendIcon }}"
                class="mr-2 pointer-events-none" />
        @endif
    </button>
@endif
