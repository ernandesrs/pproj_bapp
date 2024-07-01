<x-common.layout.page-base>

    <div class="flex flex-wrap">
        <div class="basis-full md:basis-4/12 mb-6 md:mb-0 md:pr-2 flex justify-center">
            <x-common.content-block
                title="{{ __('common/phrases.user_picture') }}"
                class="flex justify-center">
                <x-admin.thumb
                    circle
                    size="large"
                    url="{{ empty(\Auth::user()->photo) ? '' : \Storage::url(\Auth::user()->photo) }}"
                    alternative-text="{{ \Auth::user()->username }}" />
            </x-common.content-block>
        </div>

        <div class="basis-full md:basis-8/12 md:pl-2">
            <x-common.content-block
                title="{{ __('common/phrases.user_data') }}">
                <livewire:admin.account.profile />
            </x-common.content-block>
        </div>
    </div>

</x-common.layout.page-base>
