@props([
    'inputStyles' => null,
])

<div {{ $attributes->only(['class'])->merge(['class' => 'relative']) }}>
    @if ($attributes->has('label'))
        <label class="text-admin-font-light mb-1 block" for="{{ $attributes->get('id') }}">
            {{ $attributes->get('label') }}
        </label>
    @endif
    <div class="relative">
        <select {{ $attributes->except(['class', 'type', 'options']) }}
            class="{{ $inputStyles }}">
            @foreach ($attributes->get('options') as $option)
                <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
            @endforeach
        </select>
    </div>

    @if ($errors->has($attributes->get('wire:model')))
        <x-admin.form.feedback color="danger" text="{{ implode('.', $errors->get($attributes->get('wire:model'))) }}" />
    @endif
</div>
