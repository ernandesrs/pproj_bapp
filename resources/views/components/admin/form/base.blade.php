@props([
    'submitText' => __('common/words.save'),
    'submittingText' => __('common/words.saving'),
    'submitTo' => null,
])

@php
    throw_if(empty($submitTo), 'Inform via "submitTo" prop, the method where the form data will be sent.');
@endphp

<form wire:submit.prevent="{{ $submitTo }}" {{ $attributes }}>
    {{ $slot }}

    <div class="w-full flex items-center justify-center mt-8">
        @isset($submit)
            {{ $submit }}
        @else
            <x-admin.buttons.clickable
                wire:loading.remove
                type="submit"
                prepend-icon="check-lg"
                label="{{ $submitText }}" />
            <x-admin.buttons.clickable
                wire:loading
                prepend-icon="check-lg"
                label="{{ $submittingText }}"
                loading
                disabled />
        @endisset
    </div>
</form>
