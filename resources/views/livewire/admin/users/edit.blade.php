<x-common.layout.page-base>
    <div class="flex flex-wrap">
        <div class="basis-full md:basis-4/12 mb-6 md:mb-0 md:pr-2 flex justify-center">
            <x-common.content-block
                title="User picture"
                class="flex justify-center">
                <x-admin.thumb
                    circle
                    size="large"
                    url="{{ empty($this->model->photo) ? '' : \Storage::url($this->model->photo) }}"
                    alternative-text="{{ $this->model->username }}" />
            </x-common.content-block>
        </div>

        <div class="basis-full md:basis-8/12 md:pl-2">
            <x-common.content-block
                title="User data">
                <x-admin.form.base
                    submitTo="update">
                    @include('livewire.admin.includes.user-basic-data')
                </x-admin.form.base>
            </x-common.content-block>
        </div>
    </div>
</x-common.layout.page-base>
