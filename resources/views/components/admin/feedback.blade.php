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
        'timer' => 3000,
        'flash' => false,
        'type' => $type,
        'title' => $title,
        'text' => $text,
        'actions' => $actions,
    ];
    $flash = \App\Helpers\Feedback::get();
    if (empty($text) && $flash) {
        $data = $flash->toArray();
    }

@endphp

<div
    x-data="{
        timeLeft: 0,
        timeLeftWidth: 0,
        timerHandler: null,
        timerLeftWidthHandler: null,
        ...{{ json_encode([...$data, 'colors' => $colors, 'showFeedback' => false]) }},

        init() {
            $nextTick(() => {
                if (this.method_hasFeedback()) {
                    this.method_showFeedback();
                }
            });
        },
        method_feedbackFromEvent(event) {
            const data = event.detail[0];

            if (this.method_hasAndShownFeedback()) {
                {{-- hide the current feedback --}}
                this.method_closeFeedback();

                {{-- wait for the close animation --}}
                setTimeout(() => {
                    this.method_setFeedbackData(data);
                    this.method_showFeedback();
                }, 250);
            } else {
                this.method_setFeedbackData(data);

                {{-- just shows the new feedback --}}
                if (this.method_hasFeedback()) {
                    this.method_showFeedback();
                }
            }
        },
        method_setFeedbackData(data) {
            this.type = data.type;
            this.title = data.title;
            this.text = data.text;
            this.timer = data.timer;
            this.flash = data.flash;
        },
        method_showFeedback() {
            this.showFeedback = true;

            {{-- bounce effect --}}
            setTimeout(() => {
                $el.classList.add('animate-bounce-element');
                this.method_startTimer();
            }, 200);
        },
        method_closeFeedback() {
            this.showFeedback = false;

            {{-- wait for the closing animation --}}
            setTimeout(() => {
                this.method_clearFeedback();
            }, 100);

        },
        method_clearFeedback() {
            this.title = this.text = null;
            this.timeLeftWidth = this.timeLeft = 0;
            this.type = 'default';
            this.flash = false;
            this.actions = [];

            clearInterval(this.timerHandler);
            clearInterval(this.timerLeftWidthHandler);
            this.timerHandler = this.timerLeftWidthHandler = null;
        },
        method_startTimer() {
            if (!this.method_hasAndShownFeedback()) {
                return;
            }

            this.timerHandler = setInterval(() => {
                if (this.timeLeft >= this.timer) {
                    this.method_closeFeedback();
                }

                this.timeLeft += 1000;
            }, 1000);

            this.timerLeftWidthHandler = setInterval(() => {
                if (this.timeLeftWidth < 100) {
                    this.timeLeftWidth += (10 / (this.timer + 1000)) * 100;
                }
            }, 10);
        },
        method_pauseTimer() {
            if (this.timerHandler) {
                clearInterval(this.timerHandler);
                this.timerHandler = null;
                this.timeLeft = 0;
            }

            if (this.timerLeftWidthHandler) {
                clearInterval(this.timerLeftWidthHandler);
                this.timerLeftWidthHandler = null;
                this.timeLeftWidth = 0;
            }
        },
        method_hasFeedback() {
            return this?.text && this.text.length > 0 ? true : false;
        },
        method_hasAndShownFeedback() {
            return this.text && this.showFeedback;
        }
    }"
    x-show="showFeedback"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="translate-x-1/4 opacity-0"
    x-transition:enter-end="translate-x-0 opacity-100"
    x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="translate-x-0 opacity-100"
    x-transition:leave-end="translate-x-1/4 opacity-0"

    x-on:mouseenter="method_pauseTimer"
    x-on:mouseleave="method_startTimer"
    x-on:server_from_feedback.window="method_feedbackFromEvent"

    class="bg-white shadow-md fixed top-5 right-5 max-w-[450px] z-50 cursor-default"
    style="width: calc(100% - 32px); display: none;">

    {{-- content --}}
    <div class="flex items-start px-4 py-3 border-l-8 border-t border-r border-b border-opacity-75 relative"
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

            {{-- title --}}
            <div
                x-show="title"
                x-text="title"
                class="font-semibold text-lg"></div>

            {{-- text --}}
            <div
                x-text="text"
                class="font-normal text-opacity-70"></div>

            {{-- actions --}}
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

            {{-- loader/timer --}}
            <div class="border-b-2 absolute left-0 border-opacity-75 bottom-0"
                :style="'width:' + timeLeftWidth + '%'" :class="colors[type]">
            </div>
        </div>
        {{-- /title/text --}}

        {{-- close --}}
        <button
            x-on:click="method_closeFeedback"
            class="">
            <x-admin.icon name="x-circle" class="text-xl text-admin-danger" />
        </button>
        {{-- /close --}}
    </div>
    {{-- /content --}}

</div>
