@props([
    'title' => null,
])

@php
    $attributes = $attributes->merge([
        'class' => '',
    ]);
@endphp

<div class="w-full px-6 py-6 bg-white flex flex-col" {{ $attributes->except(['class']) }}>
    @if (!empty($title))
        <div class="text-lg lg:text-xl font-semibold text-gray-600 mb-4">
            {{ $title }}
        </div>
    @endif

    <div {{ $attributes->only(['class'])->merge([
        'class' => '',
    ]) }}>
        {{ $slot }}
    </div>
</div>
