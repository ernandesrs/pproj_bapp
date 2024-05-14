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
        ...{{ json_encode([...$data, 'colors' => $colors, 'showFeedback' => false]) }},

        init() {
            $nextTick(() => {
                if (this.text?.length > 0) {
                    this.method_showFeedback();
                }
            });
        },
        method_showFeedback() {
            this.showFeedback = true;

            {{-- bounce effect --}}
            setTimeout(() => {
                $el.classList.add('animate-bounce-element');
            }, 200);
        },
        method_closeFeedback() {
            this.showFeedback = false;
            setTimeout(() => {
                this.method_clearFeedback();
            }, 100);
        },
        method_clearFeedback() {
            this.title = null;
            this.text = null;
            this.type = 'default';
            this.flash = false;
            this.actions = [];
        }
    }"
    x-show="showFeedback"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="translate-x-1/4 opacity-0"
    x-transition:enter-end="translate-x-0 opacity-100"
    x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="translate-x-0 opacity-100"
    x-transition:leave-end="translate-x-1/4 opacity-0"

    class="bg-white shadow-md fixed top-5 right-5 max-w-[450px] z-50" style="width: calc(100% - 32px); display: none;">

    {{-- content --}}
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

            <div
                x-show="actions.length > 0"
                class="pt-3 flex justify-start gap-x-1">
                <template x-for="action in actions.filter((fa) => fa.external)">
                    <a
                        :href="action.href"
                        x-text="action.label"
                        target="_blank"
                        class="hover:text-opacity-100 hover:font-semibold duration-200"></a>
                </template>
                <template x-for="action in actions.filter((fa) => !fa.external)">
                    <a
                        wire:navigate
                        :href="action.href"
                        x-text="action.label"
                        class="hover:text-opacity-100 hover:font-semibold duration-200"></a>
                </template>
            </div>
        </div>
        {{-- /title/text --}}

        {{-- close --}}
        <button
            x-on:click="method_closeFeedback"
            class="px-3">
            <x-admin.icon name="x-circle" class="text-xl text-admin-danger" />
        </button>
        {{-- /close --}}
    </div>
    {{-- /content --}}

</div>
