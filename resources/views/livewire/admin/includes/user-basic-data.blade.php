<div class="flex flex-wrap gap-y-6">

    <x-admin.form.input
        wire:model="data.first_name"
        type="text"
        label="{{ __('common/words.first_name') }}"
        class="basis-6/12 pr-3" />

    <x-admin.form.input
        wire:model="data.last_name"
        type="text"
        label="{{ __('common/words.last_name') }}"
        class="basis-6/12 pl-3" />

    <x-admin.form.input
        wire:model="data.username"
        type="text"
        label="{{ __('common/words.username') }}"
        class="basis-6/12 pr-3" />

    <x-admin.form.input
        wire:model="data.gender"
        type="select"
        label="{{ __('common/words.gender') }}"
        class="basis-6/12 pl-3"
        :options="[
            [
                'label' => __('common/words.none'),
                'value' => 'n',
            ],
            [
                'label' => __('common/words.female'),
                'value' => 'f',
            ],
            [
                'label' => __('common/words.female'),
                'value' => 'm',
            ],
        ]" />

    @if ($this->model && $this->model?->id)
        <x-admin.form.input
            wire:model="data.email"
            type="text"
            label="{{ __('common/words.email') }}"
            class="basis-full" disabled />
    @else
        <x-admin.form.input
            wire:model="data.email"
            type="text"
            label="{{ __('common/words.email') }}"
            class="basis-full" />
    @endif

    <x-admin.form.input
        wire:model="data.password"
        type="password"
        label="{{ __('common/words.password') }}"
        class="basis-6/12 pr-3" />

    <x-admin.form.input
        wire:model="data.password_confirmation"
        type="password"
        label="{{ __('common/phrases.password_confirmation') }}"
        class="basis-6/12 pl-3" />

</div>
