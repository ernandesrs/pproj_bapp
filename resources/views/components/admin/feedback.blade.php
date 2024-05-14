@props([
    'type' => 'default',
    'title' => null,
    'text' => null,

    /**
     * Example of actions item
     * [
     *     'label' => 'Go to',
     *     'href' => '#',
     *     'external' => false,
     * ],
     */
    'actions' => [],
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

    $data = [
        'flash' => false,
        'type' => $type,
        'title' => $title,
        'text' => $text,
        'actions' => $actions,
    ];
    $flash = \App\Livewire\Helpers\Feedback::get();
    if (empty($text) && $flash) {
        $data = $flash->toArray();
    }

@endphp

<div
    x-data="{
        ...{{ json_encode([...$data, 'colors' => $colors, 'showFeedback' => !empty($data['text'])]) }}
    }"
    x-show="showFeedback"

    class="bg-white shadow-md fixed top-5 right-5 max-w-[450px] z-50" style="width: calc(100% - 32px);display: none">
    <div class="flex items-start px-4 py-3 border-l-8 border-t border-r border-b border-opacity-75"
        :class="colors[type]">

        {{-- icon --}}
        <div
            class="text-xl text-opacity-70">
            <x-admin.icon x-show="type == 'success'" name="check-circle" />
            <x-admin.icon x-show="type == 'info' || type == 'light' || type == 'default'" name="info-circle" />
            <x-admin.icon x-show="type == 'danger' || type == 'error'" name="x-circle" />
        </div>
        {{-- /icon --}}

        {{-- title/text --}}
        <div class="ml-3 w-full">
            <div
                x-show="title"
                x-text="title"
                class="font-semibold text-lg"></div>

            <div
                x-text="text"
                class="font-normal text-opacity-70"></div>
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
        {{-- /title/text --}}

        {{-- close --}}
        <button class="px-3">
            <x-admin.icon name="x-circle" class="text-xl text-admin-danger" />
        </button>
        {{-- /close --}}
    </div>
</div>
