@php
    $pageContainerStyle = $this->typeIsBlank() ? '' : '';
@endphp

<div class="{{ $pageContainerStyle }} w-full min-h-full px-5 {{ $this->typeIsBlank() ? 'py-5' : '' }}">
    {{-- page header --}}
    @if (!$this->typeIsBlank())
        <div class="flex items-center py-3 mb-5">
            <div>
                {{-- title --}}
                @if ($this->getTitle())
                    <div class="flex items-center text-xl text-gray-700">
                        @if (!empty($this->getIcon()))
                            <x-common.icon name="{{ $this->getIcon() }}" class="mr-2" />
                        @endif
                        <div class="font-semibold">{{ $this->getTitle() }}</div>
                    </div>
                @endif
                {{-- /title --}}

                {{-- /breadcrumb --}}
                @if ($this->getBreadcrumb(true))
                    <nav class="mt-4" aria-label="Breadcrumb">
                        <ol class="flex items-center gap-1 text-sm text-gray-500">
                            @php
                                $breadcrumbs = $this->getBreadcrumb(false);
                                $total = count($breadcrumbs);
                            @endphp
                            @foreach ($breadcrumbs as $key => $bread)
                                <li>
                                    <a wire:navigate href="{{ $bread['href'] }}" class="block transition hover:text-gray-700">
                                        <span> {{ $bread['label'] }} </span>
                                    </a>
                                </li>

                                {{-- arrow icon --}}
                                @if ($key + 1 < $total)
                                    <li class="rtl:rotate-180">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4"
                                            viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </li>
                                @endif
                            @endforeach
                        </ol>
                    </nav>
                @endif
                {{-- /breadcrumb --}}
            </div>

            {{-- actions --}}
            @if ($this->hasActions())
                <div class="flex items-center ml-auto">
                    @foreach ($this->getActions()->getActions() as $action)
                        <x-common.clickable
                            prepend-icon="{{ $action['icon'] }}"
                            label="{{ $action['label'] }}"
                            href="{{ $action['href'] }}"
                            color="{{ $action['color'] }}" />
                    @endforeach
                </div>
            @endif
            {{-- /actions --}}
        </div>
    @endif
    {{-- /page header --}}

    {{-- page content --}}
    <div class="mb-8">
        @if ($this->typeIsList())
            <div class="w-full overflow-x-auto">
                <table class="table-fixed min-w-full text-left">
                    <thead class="bg-slate-200 text-slate-600">
                        <tr>
                            @foreach ($this->getTableConfig()->getColumnLabels() as $label)
                                <th class="px-8 py-3">{{ $label['label'] }}</th>
                            @endforeach
                            @if ($this->getListActions())
                                <th>Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="text-slate-500">
                        @foreach ($this->getListItems() as $key => $listItem)
                            <tr
                                class="{{ ($key + 1) % 2 == 0 ? 'bg-slate-100' : 'bg-slate-50' }} hover:bg-opacity-75 duration-200">
                                @foreach ($this->getTableConfig()->getRowColumns() as $rowColumn)
                                    <td class="px-8 py-2" colspan="1">
                                        @if (!is_null($rowColumn['key']))
                                            @php
                                                $key = $rowColumn['key'];
                                            @endphp
                                            {{ $listItem->$key }}
                                        @elseif (!is_null($rowColumn['callback']))
                                            @php
                                                $callback = $rowColumn['callback'];
                                            @endphp
                                            {{ $callback($listItem) }}
                                        @elseif (!is_null($rowColumn['view']))
                                            @php
                                                $view = $rowColumn['view'];
                                            @endphp
                                            @include($view, [
                                                'item' => $listItem,
                                                'model' => $listItem,
                                            ])
                                        @endif
                                    </td>
                                @endforeach

                                @if ($this->getListActions())
                                    <td class="px-8 py-2 align-middle flex flex-wrap justify-start items-center gap-1">
                                        @if ($this->getListActions()->getShow())
                                            <x-common.clickable
                                                type="button"
                                                wire:click="show({{ $listItem->id }})"

                                                prepend-icon="eye" label="Show"
                                                class="bg-indigo-500 hover:bg-indigo-600 text-slate-100 hover:text-slate-100 text-xs py-1 px-2" />
                                        @endif

                                        @if ($this->getListActions()->getEdit())
                                            <x-common.clickable
                                                type="button"
                                                wire:click="edit({{ $listItem->id }})"

                                                prepend-icon="pencil" label="Edit"
                                                class="bg-blue-500 hover:bg-blue-600 text-slate-100 hover:text-slate-100 text-xs py-1 px-2" />
                                        @endif

                                        @if ($this->getListActions()->getDelete())
                                            <x-common.clickable
                                                type="button"
                                                wire:click="delete({{ $listItem->id }})"
                                                wire:confirm="Are you sure you want to delete this item?"

                                                prepend-icon="trash" label="Delete"
                                                class="bg-red-400 hover:bg-red-500 text-slate-100 hover:text-slate-100 text-xs py-1 px-2" />
                                        @endif
                                @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="w-full flex justify-content-center mt-3">
                {{ $this->getListitems()->onEachSide(1)->links() }}
            </div>
        @else
            {{ $slot }}
        @endif
    </div>
    {{-- /page content --}}
</div>
