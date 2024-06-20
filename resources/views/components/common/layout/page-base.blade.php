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
    <div>
        {{ $slot }}
    </div>
    {{-- /page content --}}
</div>
