@props([
    'nav' => null,
])

@php
    $styles = [];
@endphp

<ul class="{{ implode(' ', $styles) }}">
    @foreach ($nav as $navLink)
        @if ($navLink['items'] ?? false)
            @php
                $id = uniqid();
                $active = in_array(\Route::currentRouteName(), $navLink['activeIn'] ?? []);
            @endphp
            <li
                x-data="{
                    ...{{ json_encode([
                        'showSubmenu' => $active,
                    ]) }}
                }">
                <x-admin.layout.sidebar.nav-item
                    x-on:click.prevent="showSubmenu=!showSubmenu"
                    :item="$navLink" />

                <ul
                    x-show="showSubmenu"
                    class="{{ implode(' ', ['ml-8 bg-admin-light bg-opacity-10'] + $styles) }}"
                    style="{{ $active ? '' : 'display:none;' }}">
                    @foreach ($navLink['items'] as $subnavLink)
                        <li>
                            <x-admin.layout.sidebar.nav-item
                                wire:navigate
                                :item="$subnavLink"
                                subitem />
                        </li>
                    @endforeach
                </ul>
            </li>
        @else
            <li>
                <x-admin.layout.sidebar.nav-item
                    wire:navigate
                    :item="$navLink" />
            </li>
        @endif
    @endforeach
</ul>
