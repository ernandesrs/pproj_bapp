@props([
    'inputStyles' => null,
])

<div {{ $attributes->only(['class'])->merge(['class' => 'relative']) }}>
    @if ($attributes->has('label'))
        <label class="text-admin-font-light mb-1 block" for="{{ $attributes->get('id') }}">
            {{ $attributes->get('label') }}
        </label>
    @endif
    <div
        x-data="{
            ...{{ json_encode(['originalType' => $attributes->get('type'), 'type' => $attributes->get('type')]) }},

            togglePasswordInputVisibility() {
                if (this.originalType != 'password') {
                    return;
                }

                this.type = this.type == 'password' ? 'text' : 'password';
            }
        }"
        class="relative">
        <input {{ $attributes->except(['class', 'type']) }}
            :type="type"
            class="{{ $inputStyles }}" />

        @if ($attributes->get('type') == 'password')
            <button
                x-on:click.prevent="togglePasswordInputVisibility"
                class="absolute h-full top-0 right-0 px-3 border border-transparent">
                <x-admin.icon x-show="type=='password'" name="eye-fill" />
                <x-admin.icon x-show="type=='text'" name="eye-slash-fill" />
            </button>
        @endif
    </div>
</div>
