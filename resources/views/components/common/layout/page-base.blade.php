@php
    $pageContainerStyle = $this->page()->typeIsBlank() ? '' : '';
@endphp

<div class="{{ $pageContainerStyle }} w-full min-h-full px-5 {{ $this->page()->typeIsBlank() ? 'py-5' : '' }}">
    {{-- page header --}}
    @if (!$this->page()->typeIsBlank())
        <div class="flex items-center py-3 mb-5">
            {{-- title --}}
            @if ($this->page()->getTitle())
                <div class="flex items-center text-xl text-gray-700">
                    @if (!empty($this->page()->getIcon()))
                        <x-common.icon name="{{ $this->page()->getIcon() }}" class="mr-2" />
                    @endif
                    <div class="font-semibold">{{ $this->page()->getTitle() }}</div>
                </div>
            @endif
            {{-- /title --}}

            {{-- actions --}}
            @if ($this->page()->hasActions())
                <div class="flex items-center ml-auto">
                    @foreach ($this->page()->getActions() as $action)
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
        @if ($this->page()->typeIsList())
            <table class="w-full text-left">
                <thead class="bg-slate-200 text-slate-600">
                    <tr>
                        @foreach ($this->page()->getListColumnsLabel() as $label)
                            <th class="px-8 py-3">{{ $label['label'] }}</th>
                        @endforeach
                        @if (!$this->page()->withoutListActions())
                            <th>Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-slate-500">
                    @foreach ($this->page()->getListItems() as $key => $listItem)
                        <tr
                            class="{{ ($key + 1) % 2 == 0 ? 'bg-slate-50' : 'bg-slate-100' }} hover:bg-opacity-75 duration-200">
                            @foreach ($this->page()->getListColumnsContent() as $content)
                                <td class="px-8 py-2">
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
                            @if (!$this->page()->withoutListActions())
                                <td class="px-8 py-2 align-middle">
                                    <x-common.clickable
                                        prepend-icon="trash" label="Delete"
                                        class="bg-red-400 hover:bg-red-500 text-slate-100 hover:text-slate-100 text-xs py-1 px-2" />
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="w-full flex justify-content-center mt-3">
                {{ $this->page()->getListitems()->links() }}
            </div>
        @else
            {{ $slot }}
        @endif
    </div>
    {{-- /page content --}}
</div>
