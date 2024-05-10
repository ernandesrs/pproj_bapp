@props([
    'type' => 'text',
    'label' => null,
])

@php
    $id = $type . '_input_' . uniqid();
    $styles =
        'shadow border ' .
        ($errors->has($attributes->get('wire:model')) ? 'border-admin-danger text-admin-danger' : 'border-admin-light text-admin-font-light') .
        ' px-4 py-2 w-full focus:outline-none focus:border-admin-font-light disabled:bg-admin-light disabled:bg-opacity-60 readonly:bg-admin-light readonly:bg-opacity-60';

    $attributes = $attributes->merge([
        'label' => $label,
        'type' => $type,
        'id' => $id,
        'name' => $id,
    ]);
@endphp

@if (in_array($type, ['text', 'password', 'number']))
    <x-admin.form.inputs.input input-styles="{{ $styles }}" {{ $attributes }} />
@elseif ($type == 'select')
    <x-admin.form.inputs.select input-styles="{{ $styles }}" {{ $attributes }} />
@elseif ($type == 'textarea')
@endif
