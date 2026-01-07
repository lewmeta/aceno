{{-- Button Component --}}
@php
    // Robust slot content check (handles whitespace and HTML comments)
    $hasContent = $hasSlotContent($slot);
    
    // Final square determination
    $isSquare = $square ?? (empty($label) && !$hasContent);
@endphp

@if($href)
    {{-- Render as link --}}
    <a
        href="{{ $href }}"
        wire:key="{{ $uuid }}"
        {{ $attributes->merge([
            'class' => $classes() . ' ' . ($isSquare ? $squareWidthClasses() : $paddingClasses()),
        ]) }}
        
        @if($external)
            target="_blank"
            rel="noopener noreferrer"
        @endif
        
        @if(!$external && !$noWireNavigate)
            wire:navigate
        @endif
        
        @if($tooltip)
            data-tip="{{ $tooltip }}"
        @endif
    >
        @include('components.ui.partials.button-content')
    </a>
@else
    {{-- Render as button --}}
    <button
        wire:key="{{ $uuid }}"
        {{ $attributes->merge([
            'type' => $type,
            'class' => $classes() . ' ' . ($isSquare ? $squareWidthClasses() : $paddingClasses()),
        ]) }}
        
        @if($tooltip)
            data-tip="{{ $tooltip }}"
        @endif
        
        @if($autoLoading && $spinnerTarget())
            wire:target="{{ $spinnerTarget() }}"
        @endif
        
        @if($autoLoading && $type !== 'submit')
            wire:loading.attr="data-loading"
        @endif
    >
        @include('components.ui.partials.button-content')
    </button>
@endif