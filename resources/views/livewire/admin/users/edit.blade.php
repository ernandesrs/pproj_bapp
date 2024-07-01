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

            <x-common.content-block class="bg-red-400 bg-opacity-20 border border-red-200 px-5 py-3">
                <div class="text-lg font-medium text-red-500 mb-2">Danger area</div>
                <x-common.btn-confirmation
                    icon="trash"
                    label="{{ __('common/words.delete') . ' ' . strtolower(__('common/words.user')) }}"
                    :action-to-one="true"
                    type="danger"
                    title="{{ __('admin/phrases.confirmation.deletion_title', ['itemName' => strtolower(__('admin/phrases.this_item'))]) }}"
                    text="{{ __('admin/phrases.confirmation.deletion_text', ['itemName' => $this->model->first_name . ' ' . $this->model->last_name]) }}"
                    :action="[
                        'name' => 'delete',
                        'id' => $this->model->id,
                    ]"
                    class="!bg-red-400 hover:!bg-red-500 !text-slate-100 hover:!text-slate-100 text-xs py-1 px-2" />
            </x-common.content-block>
        </div>
    </div>
</x-common.layout.page-base>
