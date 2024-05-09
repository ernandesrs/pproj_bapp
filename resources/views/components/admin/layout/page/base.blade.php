<div class="bg-white w-full px-5 py-4 min-h-full">
    {{-- page header --}}
    <div class="flex items-center mb-5">
        {{-- title --}}
        <div class="flex items-center text-xl text-admin-font-base">
            <x-admin.icon name="{{ $this->page()->getIcon() }}" class="mr-2" />
            <div class="font-semibold">{{ $this->page()->getTitle() }}</div>
        </div>
        {{-- /title --}}

        {{-- actions --}}
        <div class="flex items-center ml-auto">
            <a class="px-5 py-2 bg-admin-primary text-admin-light" href="">
                <x-admin.icon name="plus-lg" class="mr-2" />
                <span>Create</span>
            </a>
        </div>
        {{-- /actions --}}
    </div>
    {{-- /page header --}}

    {{-- page content --}}
    <div>
        {{ $slot }}
    </div>
    {{-- /page content --}}
</div>
