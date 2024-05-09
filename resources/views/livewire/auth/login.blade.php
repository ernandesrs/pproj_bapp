<form wire:submit.prevent='attempt'>

    <div class="flex flex-wrap justify-center gap-4">
        <div class="basis-full">
            <input wire:model="data.email" class="w-full px-4 py-2 bg-admin-light bg-opacity-45 border-admin-light"
                type="email"
                placeholder="Email">
            @if ($errors->has('data.email'))
                <span class="text-admin-danger text-sm mt-1">
                    {{ $errors->get('data.email')[0] }}
                </span>
            @endif
        </div>

        <div class="basis-full">
            <input wire:model="data.password" class="w-full px-4 py-2 bg-admin-light bg-opacity-45 border-admin-light"
                type="password"
                placeholder="Password">
            @if ($errors->has('data.password'))
                <span class="text-admin-danger text-sm mt-1">
                    {{ $errors->get('data.password')[0] }}
                </span>
            @endif
        </div>

        <div class="basis-full flex items-center justify-center mt-2">
            <x-admin.buttons.clickable
                wire:loading.remove
                label="Login"
                type="submit"
                prepend-icon="check-lg" />
            <x-admin.buttons.clickable
                wire:loading
                label="Login"
                type="submit"
                prepend-icon="check-lg" loading />
        </div>
    </div>

</form>
