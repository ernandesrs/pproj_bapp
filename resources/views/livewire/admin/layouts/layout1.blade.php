<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    @vite(['resources/js/admin/app.js', 'resources/css/admin/app.css'])
</head>

<body class="bg-admin-light flex">

    @php
        $sidebarNavs = [
            [
                [
                    'label' => 'Dashboard',
                    'icon' => 'grid-fill',
                    'href' => '#',
                    'route' => [
                        'name' => 'admin.home',
                    ],
                    'activeIn' => ['admin.home'],
                    'permissions' => null,
                ],
                [
                    'label' => 'Users',
                    'icon' => 'people-fill',
                    'activeIn' => ['admin.users.index', 'admin.users.create', 'admin.users.edit'],
                    'items' => [
                        [
                            'label' => 'List all',
                            'icon' => 'list-nested',
                            'href' => '#',
                            'route' => [
                                'name' => 'admin.users.index',
                            ],
                            'activeIn' => ['admin.users.index'],
                            'permissions' => null,
                        ],
                        [
                            'label' => 'Create',
                            'icon' => 'person-fill-add',
                            'href' => '#',
                            'route' => [
                                'name' => 'admin.users.create',
                            ],
                            'activeIn' => ['admin.users.create'],
                            'permissions' => null,
                        ],
                    ],
                ],
                [
                    'label' => 'Roles',
                    'icon' => 'shield-fill',
                    'href' => '#',
                ],
            ],
        ];
    @endphp

    {{-- aside --}}
    <aside
        class="bg-admin-sidebar text-admin-light w-[275px] h-screen">

        {{-- header --}}
        <header class="w-full h-[60px] px-10 flex items-center justify-start">
            <span class="text-2xl text-admin-light">
                <span class="text-admin-primary font-bold">{{ config('app.name') }}</span><span>ADMIN</span>
            </span>
        </header>

        {{-- navigations --}}
        <div class="w-full" style="height: calc(100% - 60px); overflow-y: auto;">
        </div>
        {{-- /navigations --}}

    </aside>
    {{-- /aside --}}

    {{-- main --}}
    <main
        class="bg-admin-light w-full h-screen px-5 flex flex-col">

        {{-- topbar --}}
        <div class="bg-transparent w-full h-[60px] flex items-center">
        </div>
        {{-- /topbar --}}

        {{-- content --}}
        <div class="bg-white px-5 w-full flex-1">
            {{ $slot }}
        </div>
        {{-- /content --}}

    </main>
    {{-- /main --}}

</body>

</html>
