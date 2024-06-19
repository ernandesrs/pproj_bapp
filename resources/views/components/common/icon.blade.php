@props([
    'name' => 'app',
])

<span {{ $attributes->merge(['class' => 'bi bi-' . $name]) }}></span>
