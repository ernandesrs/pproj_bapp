<x-common.layout.page-base>
    <x-common.content-block
        title="{{ __('common/phrases.user_data') }}"
        class="flex justify-center">

        <x-admin.form.base
            submitTo="save"
            class="basis-full">
            @include('livewire.admin.includes.user-basic-data')
        </x-admin.form.base>

    </x-common.content-block>
</x-common.layout.page-base>
