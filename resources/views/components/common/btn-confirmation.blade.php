{{--

Este componente é um botão que aciona um modal de confirmação. Vide as props para mais detalhes.

--}}
@props([
    'icon' => 'exclamation-lg',
    'label' => 'Dispatch confirmation',

    /**
     * Enter true if the confirmation will deal with something specific, such as a user, a post, etc.
     * * When dealing with something specific, you will need to enter the item ID in an "id" key in the "action" prop.
     *
     * Report false if the confirmation will deal with something non-specific, such as terms acceptance, for example.
     **/
    'actionToOne' => null,

    /**
     * Allows default, danger, success, warning, info
     **/
    'type' => 'danger',
    'title' => 'Confirm the deletion!',
    'text' => 'Are you sure you want to delete this item?',
    'action' => [
        'name' => null,
        'id' => null,
    ],
    'id' => uniqid(),
])

@php
    throw_if(
        !is_bool($actionToOne),
        'A prop "actionToOne" needs to be true or false. Refer to the common/btn-confirmation component for more details.',
    );

    throw_if(
        empty($action['name']),
        'The "action" array property needs a value for the key "name", containing the name of the action method.',
    );

    throw_if(
        $actionToOne && empty($action['id']),
        'The action array prop needs a value for the key "id", containing the ID of the item that the confirmation will handle.',
    );
@endphp

<x-common.clickable
    type="button"
    prepend-icon="{{ $icon }}" label="{{ $label }}"

    x-on:click="$dispatch('need_confirmation_with_dialog', {{ json_encode([
        'id' => $id,
        'actionToOne' => $actionToOne,
        'data' => [
            'type' => $type,
            'title' => $title,
            'text' => $text,
            'action' => $action,
        ],
    ]) }})"
    {{ $attributes->only(['class']) }} />
