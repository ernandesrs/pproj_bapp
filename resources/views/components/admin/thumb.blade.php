@props([
    'url' => null,
    'alternativeText' => 'user',
    'size' => 'normal',
    'circle' => false,
])

@php
    $sizes = [
        'extrasmall' => 'lg:w-12 lg:h-12 text-lg',
        'small' => 'lg:w-24 lg:h-24 text-3xl',
        'normal' => 'lg:w-36 lg:h-36 text-4xl',
        'medium' => 'w-24 h-24 md:w-48 md:h-48 text-5xl',
        'large' => 'w-36 h-36 sm:w-48 sm:h-48 lg:w-64 lg:h-64 text-4xl lg:text-6xl',
    ];
@endphp

<div
    class="flex items-center justify-center font-semibold text-admin-font-light text-opacity-50 bg-admin-light border-4 border-white shadow-md {{ $sizes[$size] }} {{ $circle ? 'rounded-full' : '' }} overflow-hidden cursor-default">
    @if (!empty($url))
        <img class="w-full h-full" src="{{ $url }}" alt="{{ $alternativeText }}">
    @else
        <div class="uppercase">
            {{ $alternativeText[0] }}
        </div>
    @endif
</div>
