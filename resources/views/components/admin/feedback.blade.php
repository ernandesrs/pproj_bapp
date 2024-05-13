@props([
    'type' => 'default',
    'title' => '',
    'text' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit quisquam quo dignissimos.',

    /**
     * Example of actions item
     * [
     *     'label' => 'Go to',
     *     'href' => '#',
     *     'external' => false,
     * ],
     */
    'actions' => [
        [
            'label' => 'Go to',
            'href' => '#',
            'external' => false,
        ],
    ],
])

@php
    $colors = [
        'success' => 'text-admin-success border-admin-success',
        'danger' => 'text-admin-danger border-admin-danger',
        'error' => 'text-admin-danger border-admin-danger',
        'info' => 'text-admin-info border-admin-info',
        'light' => 'text-admin-font-light border-admin-font-light',
        'default' => 'text-admin-font-light border-admin-font-light',
    ];
@endphp

<div class="bg-white shadow-md fixed top-5 right-5 max-w-[450px] z-50" style="width: calc(100% - 32px)">
    <div class="flex items-start px-4 py-3 border-l-8 border-t border-r border-b border-opacity-75 {{ $colors[$type] }}">
        <x-admin.icon
            name="{{ [
                'success' => 'check-circle',
                'danger' => 'x-circle',
                'error' => 'x-circle',
                'info' => 'info-circle',
                'light' => 'info-circle',
                'default' => 'info-circle',
            ][$type] }}"
            class="text-2xl text-opacity-70" />
        <div class="ml-3">
            @if (!empty($title))
                <div class="font-semibold text-lg">{{ $title }}</div>
            @endif
            <div class="font-normal text-opacity-70">{{ $text }}</div>
            @if ($actions)
                <div class="pt-3 flex justify-start gap-x-1">
                    @foreach ($actions as $action)
                        <a {{ $action['external'] ? '' : 'wire:navigate' }}
                            class="hover:text-opacity-100 hover:font-semibold duration-200"
                            href="{{ $action['url'] ?? '#' }}">
                            {{ $action['label'] }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
        <button class="px-3">
            <x-admin.icon name="x-circle" class="text-xl text-admin-danger" />
        </button>
    </div>
</div>
