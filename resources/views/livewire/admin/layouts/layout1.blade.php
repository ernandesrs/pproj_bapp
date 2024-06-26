<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin | {{ $title ?? 'Page Title' }}</title>

    @vite(['resources/js/admin/app.js', 'resources/css/admin/app.css'])
</head>

<body
    x-data="{
        desktopWidth: 1024,
        showSidebar: false,

        init() {
            $nextTick(() => {
                if (window.innerWidth >= this.desktopWidth) {
                    this.showSidebar = true;
                }

                window.addEventListener('resize', () => {
                    if (window.innerWidth >= this.desktopWidth && !this.showSidebar) {
                        this.showSidebar = true;
                    } else if (window.innerWidth < this.desktopWidth && this.showSidebar) {
                        this.showSidebar = false;
                    }
                });
            });
        },

        sidebarToggler() {
            this.showSidebar = !this.showSidebar;
        }
    }"
    class="bg-admin-light flex">

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
                    'label' => __('common/words.users'),
                    'icon' => 'people-fill',
                    'activeIn' => ['admin.users.index', 'admin.users.create', 'admin.users.edit'],
                    'items' => [
                        [
                            'label' => __('common/words.list') . ' ' . strtolower(__('common/words.all')),
                            'icon' => 'list-nested',
                            'href' => '#',
                            'route' => [
                                'name' => 'admin.users.index',
                            ],
                            'activeIn' => ['admin.users.index'],
                            'permissions' => null,
                        ],
                        [
                            'label' => __('common/words.create') . ' ' . strtolower(__('common/words.new')),
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
                    'label' => __('common/words.roles'),
                    'icon' => 'shield-fill',
                    'href' => '#',
                ],
            ],
        ];

        $sidebarEndNavs = [
            [
                [
                    'label' => __('common/words.my_f') . ' ' . strtolower(__('common/words.account')),
                    'icon' => 'person-circle',
                    'href' => '#',
                    'route' => [
                        'name' => 'admin.account',
                    ],
                    'activeIn' => ['admin.account'],
                    'permissions' => null,
                ],
                [
                    'label' => __('common/words.settings'),
                    'icon' => 'gear-fill',
                    'href' => '#',
                    'activeIn' => [],
                    'permissions' => null,
                ],
            ],
        ];
    @endphp

    {{-- aside --}}
    <aside
        x-show="showSidebar"

        class="bg-admin-sidebar text-admin-light w-3/4 sm:w-[275px] h-screen fixed lg:relative" style="display: none;">

        {{-- header --}}
        <header class="w-full h-[60px] px-10 flex items-center justify-start">
            <span class="text-2xl text-admin-light">
                <span class="text-admin-primary font-bold">{{ config('app.name') }}</span><span>ADMIN</span>
            </span>
        </header>

        {{-- navigations --}}
        <div class="w-full flex flex-col" style="height: calc(100% - 60px); overflow-y: auto;">
            <div>
                @foreach ($sidebarNavs as $sidebarNav)
                    <x-admin.layout.sidebar.nav
                        :nav="$sidebarNav" />
                @endforeach
            </div>

            {{-- nav end --}}
            <div class="mt-auto">
                @foreach ($sidebarEndNavs as $sidebarNav)
                    <x-admin.layout.sidebar.nav
                        :nav="$sidebarNav" />
                @endforeach
            </div>
            {{-- /nav end --}}
        </div>
        {{-- /navigations --}}

    </aside>
    {{-- /aside --}}

    {{-- main --}}
    <main
        class="bg-admin-light w-full h-screen px-5 flex flex-col">

        {{-- topbar --}}
        <div class="bg-transparent w-full h-[60px] flex items-center">
            <nav></nav>

            <button
                x-on:click="sidebarToggler"
                class="text-admin-dark text-2xl ml-auto lg:order-first">
                <x-admin.icon name="list" />
            </button>
        </div>
        {{-- /topbar --}}

        {{-- content --}}
        <div class="w-full" style="height: calc(100% - (60px + 0px)); overflow-y: auto;">
            <x-admin.feedback />

            {{ $slot }}
        </div>
        {{-- /content --}}

    </main>
    {{-- /main --}}

</body>

</html>
