{{-- Shared button content (used by both button and link variants) --}}

{{-- Loading Indicator --}}
@if ($autoLoading)
    <div class="absolute inset-0 flex items-center justify-center opacity-0" data-loading-indicator>
        <svg class="h-5 w-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
            </path>
        </svg>
    </div>
@endif

{{-- Leading Icon --}}
@if ($computedIconLeading)
    <span @if ($autoLoading) class="transition-opacity" @endif>
        <x-ui.icon :name="$computedIconLeading" class="shrink-0" />
    </span>
@endif

{{-- Label or Slot Content --}}
@if ($label)
    <span @class([
        'transition-opacity' => $autoLoading,
        'hidden lg:inline' => $responsive,
    ])>
        {{ $label }}
    </span>

    {{-- Badge --}}
    @if ($badge)
        <span
            class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-medium rounded-full bg-zinc-100 text-zinc-800 dark:bg-zinc-800 dark:text-zinc-100 {{ $badgeClasses }}">
            {{ $badge }}
        </span>
    @endif
@elseif($hasContent)
    @if ($autoLoading || $computedIconLeading || $computedIconTrailing)
        <span @if ($autoLoading) class="transition-opacity" @endif>
            {{ $slot }}
        </span>
    @else
        {{ $slot }}
    @endif
@endif

{{-- Keyboard Shortcut Display --}}
@if ($kbd)
    <kbd
        class="hidden items-center gap-1 rounded border border-zinc-200 bg-zinc-100 px-1.5 py-0.5 font-mono text-xs dark:border-zinc-700 dark:bg-zinc-800 lg:inline-flex">
        {{ $kbd }}
    </kbd>
@endif

{{-- Trailing Icon --}}
@if ($computedIconTrailing)
    <span @if ($autoLoading) class="transition-opacity" @endif>
        <x-ui.icon :name="$computedIconTrailing" class="shrink-0" />
    </span>
@endif
