@props([
    'type' => 'text',
    'label' => null,
])

@php
    $id = $type . '_input_' . uniqid();
    $styles =
        'shadow border ' .
        ($errors->has($attributes->get('wire:model'))
            ? 'border-admin-danger text-admin-danger'
            : 'border-admin-light text-admin-font-light') .
        ' px-4 py-2 w-full focus:outline-none focus:border-admin-font-light disabled:bg-admin-light disabled:bg-opacity-60 readonly:bg-admin-light readonly:bg-opacity-60';

    $attributes = $attributes->merge([
        'label' => $label,
        'type' => $type,
        'id' => $id,
        'name' => $id,
    ]);
@endphp

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

        @if (in_array($type, ['text', 'password', 'number']))
            <input {{ $attributes->except(['class', 'type']) }}
                :type="type"
                class="{{ $styles }}" />

            @if ($attributes->get('type') == 'password')
                <button
                    x-on:click.prevent="togglePasswordInputVisibility"
                    class="absolute h-full top-0 right-0 px-3 border border-transparent">
                    <x-admin.icon x-show="type == 'password'" name="eye-fill" />
                    <x-admin.icon x-show="type == 'text'" name="eye-slash-fill" />
                </button>
            @endif
        @elseif ($type == 'select')
            <select {{ $attributes->except(['class', 'type', 'options']) }}
                class="{{ $styles }}">
                @foreach ($attributes->get('options') as $option)
                    <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                @endforeach
            </select>
        @endif
    </div>
    @if ($errors->has($attributes->get('wire:model')))
        <x-admin.form.feedback color="danger"
            text="{{ implode('.', $errors->get($attributes->get('wire:model'))) }}" />
    @endif
</div>
