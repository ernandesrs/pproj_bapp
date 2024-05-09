<form>

    <div class="flex flex-wrap justify-center gap-4">
        <div class="basis-full">
            <input class="w-full px-4 py-2 bg-admin-light bg-opacity-45 border-admin-light" type="email"
                placeholder="Email">
        </div>

        <div class="basis-full">
            <input class="w-full px-4 py-2 bg-admin-light bg-opacity-45 border-admin-light" type="password"
                placeholder="Password">
        </div>

        <div class="basis-full flex items-center justify-center mt-2">
            <x-admin.buttons.clickable
                label="Login"
                type="submit"
                prepend-icon="check-lg" />
        </div>
    </div>

</form>
