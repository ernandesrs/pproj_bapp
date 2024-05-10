<x-admin.form.base
    class="flex flex-wrap gap-y-6">

    <x-admin.form.input
        wire:model="data.first_name"
        type="text"
        label="First name"
        class="basis-6/12 pr-3" />

    <x-admin.form.input
        wire:model="data.last_name"
        type="text"
        label="Last name"
        class="basis-6/12 pl-3" />

    <x-admin.form.input
        wire:model="data.username"
        type="text"
        label="Username"
        class="basis-6/12 pr-3" />

    <x-admin.form.input
        wire:model="data.gender"
        type="text"
        label="Gender"
        class="basis-6/12 pl-3" />

    <x-admin.form.input
        wire:model="data.email"
        type="text"
        label="Email"
        class="basis-full"
        disabled />

    <x-admin.form.input
        wire:model="data.password"
        type="password"
        label="Password"
        class="basis-6/12 pr-3" />

    <x-admin.form.input
        wire:model="data.password_confirmation"
        type="password"
        label="Password confirmation"
        class="basis-6/12 pl-3" />

</x-admin.form.base>
