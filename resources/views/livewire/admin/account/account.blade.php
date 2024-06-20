<x-common.layout.page-base>

    <div class="flex">
        <div class="basis-full md:basis-4/12 md:pr-2 flex justify-center">
            <x-common.content-block
                title="User picture"
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
                title="User data">
                <livewire:admin.account.profile />
            </x-common.content-block>
        </div>
    </div>

</x-common.layout.page-base>
