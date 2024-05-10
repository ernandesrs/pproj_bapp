@props([
    'type' => 'text',
    'label' => null,
])

@php
    $id = $type . '_input_' . uniqid();
    $styles =
        'shadow border border-admin-light px-4 py-2 w-full text-admin-font-light focus:outline-none focus:border-admin-font-light';

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

@elseif ($type == 'textarea')
@endif
