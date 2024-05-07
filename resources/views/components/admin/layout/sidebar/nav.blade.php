@props([
    'nav' => null,
])

@php
    $styles = [];
@endphp

@foreach ($nav as $navLink)
    <ul class="{{ implode(' ', $styles) }}">
        @if ($navLink['items'] ?? false)
            @php
                $id = uniqid();
                $active = in_array(\Route::currentRouteName(), $item['activeIn'] ?? []);
            @endphp
            <li>
                <x-admin.layout.sidebar.nav-item
                    :item="$navLink"
                    target="#{{ $id }}" />

                <ul class="{{ implode(' ', ['ml-8 bg-admin-light bg-opacity-10'] + $styles) }}" id="{{ $id }}"
                    style="{{ $active ? '' : 'display:none;' }}">
                    @foreach ($navLink['items'] as $subnavLink)
                        <x-admin.layout.sidebar.nav-item
                            :item="$subnavLink"
                            subitem />
                    @endforeach
                </ul>
            </li>
        @else
            <x-admin.layout.sidebar.nav-item
                :item="$navLink" />
        @endif
    </ul>
@endforeach
