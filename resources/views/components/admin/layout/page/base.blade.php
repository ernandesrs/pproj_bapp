@php
    $pageContainerStyle = $this->page()->typeIsBlank() ? '' : 'bg-white';
@endphp

<div class="{{ $pageContainerStyle }} w-full min-h-full px-5 py-4">
    {{-- page header --}}
    @if (!$this->page()->typeIsBlank())
        <div class="flex items-center mb-5">
            {{-- title --}}
            @if ($this->page()->getTitle())
                <div class="flex items-center text-xl text-admin-font-base">
                    @if (!empty($this->page()->getIcon()))
                        <x-admin.icon name="{{ $this->page()->getIcon() }}" class="mr-2" />
                    @endif
                    <div class="font-semibold">{{ $this->page()->getTitle() }}</div>
                </div>
            @endif
            {{-- /title --}}

            {{-- actions --}}
            @if ($this->page()->hasActions())
                <div class="flex items-center ml-auto">
                    @foreach ($this->page()->getActions() as $action)
                        <a {{ $action['external'] ? '' : 'wire:navigate' }}
                            class="px-5 py-2 bg-admin-primary text-admin-light" href="{{ $action['href'] }}"
                            target="_{{ $action['external'] ? 'blank' : 'self' }}">
                            @isset($action['icon'])
                                <x-admin.icon name="{{ $action['icon'] }}" class="mr-2" />
                            @endisset
                            <span>{{ $action['label'] ?? ($action['text'] ?? '') }}</span>
                        </a>
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
