@php
    $pageContainerStyle = $this->typeIsBlank() ? '' : '';
@endphp

<div class="{{ $pageContainerStyle }} w-full min-h-full px-5 {{ $this->typeIsBlank() ? 'py-5' : '' }}">
    {{-- page header --}}
    @if (!$this->typeIsBlank())
        <div class="flex items-center py-3 mb-5">
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

            {{-- actions --}}
            @if ($this->hasActions())
                <div class="flex items-center ml-auto">
                    @foreach ($this->getActions() as $action)
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
                            @foreach ($this->getListColumnsLabel() as $label)
                                <th class="px-8 py-3">{{ $label['label'] }}</th>
                            @endforeach
                            @if (!$this->withoutListActions())
                                <th>Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="text-slate-500">
                        @foreach ($this->getListItems() as $key => $listItem)
                            <tr
                                class="{{ ($key + 1) % 2 == 0 ? 'bg-slate-100' : 'bg-slate-50' }} hover:bg-opacity-75 duration-200">
                                @foreach ($this->getListColumnsContent() as $content)
                                    <td class="px-8 py-2" colspan="1">
                                        @if (!is_null($content['key']))
                                            @php
                                                $key = $content['key'];
                                            @endphp
                                            {{ $listItem->$key }}
                                        @elseif (!is_null($content['callback']))
                                            @php
                                                $callback = $content['callback'];
                                            @endphp
                                            {{ $callback($listItem) }}
                                        @elseif (!is_null($content['view']))
                                            @php
                                                $view = $content['view'];
                                            @endphp
                                            @include($view, [
                                                'item' => $listItem,
                                                'model' => $listItem,
                                            ])
                                        @endif
                                    </td>
                                @endforeach
                                @if (!$this->withoutListActions())
                                    <td class="px-8 py-2 align-middle flex flex-wrap justify-start items-center gap-1">
                                        <x-common.clickable
                                            type="button"
                                            wire:click="show({{ $listItem->id }})"

                                            prepend-icon="eye" label="Show"
                                            class="bg-indigo-500 hover:bg-indigo-600 text-slate-100 hover:text-slate-100 text-xs py-1 px-2" />

                                        <x-common.clickable
                                            type="button"
                                            wire:click="edit({{ $listItem->id }})"

                                            prepend-icon="pencil" label="Edit"
                                            class="bg-blue-500 hover:bg-blue-600 text-slate-100 hover:text-slate-100 text-xs py-1 px-2" />

                                        <x-common.clickable
                                            type="button"
                                            wire:click="delete({{ $listItem->id }})"
                                            wire:confirm="Are you sure you want to delete this item?"

                                            prepend-icon="trash" label="Delete"
                                            class="bg-red-400 hover:bg-red-500 text-slate-100 hover:text-slate-100 text-xs py-1 px-2" />
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="w-full flex justify-content-center mt-3">
                {{ $this->getListitems()->links() }}
            </div>
        @else
            {{ $slot }}
        @endif
    </div>
    {{-- /page content --}}
</div>
