<x-admin.layout.page.base>

    <div class="flex flex-wrap gap-y-6">

        <div class="basis-full md:basis-4/12 md:pr-2 flex justify-center">
            <x-admin.thumb
                circle
                size="large"
                url="{{ empty(\Auth::user()->photo) ? '' : \Storage::url(\Auth::user()->photo) }}"
                alternative-text="{{ \Auth::user()->username }}" />
        </div>

        <div class="basis-full md:basis-8/12 md:pl-2">
            <livewire:admin.account.profile />
        </div>

    </div>

</x-admin.layout.page.base>
