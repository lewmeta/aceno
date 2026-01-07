<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use function App\Support\Helpers\ui_classes;
use function App\Support\Helpers\ui_uuid;

class Button extends Component
{
    public string $uuid;
    public bool $autoLoading;
    public ?string $computedIconLeading;
    public ?string $computedIconTrailing;

    /**
     * Create a new component instance.
     */
    public function __construct(
        // Content
        public ?string $label = null,

        // Icons
        public ?string $icon = null,
        public ?string $iconRight = null,
        public ?string $iconLeading = null,
        public ?string $iconTrailing = null,

        // Appearance
        public string $variant = 'primary',
        public string $size = 'base',
        public ?string $color = null,

        // Behavior
        public string $type = 'button',
        public ?string $href = null,
        public bool $external = false,
        public bool $noWireNavigate = false,

        // Layout
        public string $align = 'center',
        public ?bool $square = null,
        public ?bool $responsive = false,

        // Loading state
        public bool|string|null $spinner = null,

        // Tooltip
        public ?string $tooltip = null,
        public ?string $tooltipPosition = 'top',

        // Badge
        public ?string $badge = null,
        public ?string $badgeClasses = null,

        // Keyboard shorcut display
        public ?string $kbd = null,

        // ID
        public ?string $id = null,
    ) {
        // Generate unique ID for livewire wire:key
        $this->uuid = ui_uuid('btn', $id);

        // Normalize icon props (support both icon/iconRight and iconLeading/iconTrailing)
        $this->computedIconLeading = $iconLeading ?? $icon;
        $this->computedIconTrailing = $iconTrailing ?? $iconRight;

        // Auto-detect loading state (Flux pattern)
        $this->autoLoading = '';
    }

    /**
     * Determine if component should auto-show loading state
     */
    protected function shouldAutoLoad(): bool
    {
        // If spinner is explicitly false, don't auto-load
        if ($this->spinner === false) {
            return false;
        }

        // If spinner is explicily true or a string target, enable loading
        if ($this->spinner === true || is_string($this->spinner)) {
            return true;
        }

        // Auto-detect for submit buttons
        if ($this->type === 'submit' && !$this->attributes->has('disabled')) {
            return true;
        }

        // Auto-detect for wire:click without $js. prefix
        $wireClick = $this->attributes->whereStartsWith('wire:click')->first();
        if ($wireClick && !str_starts_with($wireClick, '$js.')) {
            return true;
        }

        return false;
    }

    /**
     * Get the wire:target for loading state
     */
    public function spinnerTarget(): ?string
    {
        // If spinner is a string, use it as the target
        if (is_string($this->spinner) && $this->spinner !== '') {
            return $this->spinner;
        }

        // Auto-detect from wire:click
        if ($this->spinner === true || $this->spinner === '1') {
            return $this->attributes->whereStartsWith('wire:click')->first();
        }

        return null;
    }

    /**
     * Determine if button should be rendered as a link
     */
    public function isLink(): bool
    {
        return !empty($this->href);
    }

    /**
     * Determine if button should be square (icon-only)
     * Note: Final check happens in view with access to $slot
     */
    public function isSquare(): bool
    {
        // Explicit square prop takes precedence
        if ($this->square !== null) {
            return $this->square;
        }

        // If label is provided, definitely not square
        if (!empty($this->label)) {
            return false;
        }

        // Otherwise, check will happen in view with hasSlotContent()
        return true; // Tentative, will be refined in view
    }

    /**
     * Check if slot has actual content (ignoring whitespace and comments)
     */
    public function hasSlotContent($slot): bool
    {
        if ($slot->isEmpty()) {
            return false;
        }

        // Get slot content as string
        $content = (string) $slot;

        // Strip HTML comments
        $content = preg_replace('/<!--.*?-->/s', '', $content);

        // Trim whitespace
        $content = trim($content);

        // Check if anything remains
        return $content !== '';
    }

    /**
     * Get all button classes
     */
    public function classes(): string
    {
        return ui_classes('relative inline-flex items-center font-medium transition-colors')
            ->add('disabled:opacity-75 disabled:cursor-not-allowed disabled:pointer-events-none')
            ->add('dark:disabled:opacity-75')
            ->add($this->alignClasses())
            ->add($this->sizeClasses())
            ->add($this->variantClasses())
            ->add($this->loadingClasses())
            ->add($this->colorClasses())
            ->add($this->tooltipClasses())
            ->get();
    }

    /**
     * Get alignment classes
     */
    protected function alignClasses(): string
    {
        return match ($this->align) {
            'start' => 'justify-start',
            'center' => 'justify-center',
            'end' => 'justify-end',
            default => '',
        };
    }

    /**
     * Get size classes with smart padding based on icons
     */
    // protected function sizeClasses(): string
    // {
    //     $isSquare = $this->isSquare();

    //     $base = match ($this->size) {
    //         'xs' => 'h-6 text-xs rounded-md',
    //         'sm' => 'h-8 text-sm rounded-md',
    //         'base' => 'h-10 text-sm rounded-lg',
    //         'lg' => 'h-11 text-base rounded-lg',
    //         'xl' => 'h-12 text-base rounded-xl',
    //         default => $this->size,
    //     };

    //     // Add width for square buttons or smart padding for regular buttons
    //     if ($isSquare) {
    //         $base .= ' ' . match ($this->size) {
    //             'xs' => 'w-6',
    //             'sm' => 'w-8',
    //             'base' => 'w-10',
    //             'lg' => 'w-11',
    //             'xl' => 'w-12',
    //             default => '',
    //         };
    //     } else {
    //         // Reduce padding on sides with icons (Flux pattern)
    //         $ps = $this->computedIconLeading ? 'ps-3' : 'ps-4';
    //         $pe = $this->computedIconTrailing ? 'pe-3' : 'pe-4';

    //         $base .= match ($this->size) {
    //             'xs' => ' px-2',
    //             'sm' => ' px-3',
    //             'base' => " {$ps} {$pe}",
    //             'lg' => " {$ps} {$pe}",
    //             'xl' => ' px-6',
    //             default => '',
    //         };
    //     }

    //     return $base . ' gap-2';
    // }

        /**
     * Get size classes with smart padding based on icons
     */
    protected function sizeClasses(): string
    {
        // Note: Final $isSquare check happens in view with slot access
        // This generates both square and non-square classes conditionally
        
        $base = match($this->size) {
            'xs' => 'h-6 text-xs rounded-md',
            'sm' => 'h-8 text-sm rounded-md',
            'md' => 'h-9 text-xs rounded-md',
            'base' => 'h-10 text-sm rounded-lg',
            'lg' => 'h-11 text-base rounded-lg',
            'xl' => 'h-12 text-base rounded-xl',
            default => $this->size,
        };
        
        // Gap for spacing between elements
        return $base . ' gap-2';
    }
    
    /**
     * Get padding classes for non-square buttons
     */
    public function paddingClasses(): string
    {
        // Reduce padding on sides with icons (Flux pattern)
        $ps = $this->computedIconLeading ? 'ps-3' : 'ps-4';
        $pe = $this->computedIconTrailing ? 'pe-3' : 'pe-4';
        
        return match($this->size) {
            'xs' => 'px-2',
            'sm' => 'px-3',
            'base' => "{$ps} {$pe}",
            'lg' => "{$ps} {$pe}",
            'xl' => 'px-6',
            default => 'px-4',
        };
    }
    
    /**
     * Get width classes for square buttons
     */
    public function squareWidthClasses(): string
    {
        return match($this->size) {
            'xs' => 'w-6',
            'sm' => 'w-8',
            'base' => 'w-10',
            'lg' => 'w-11',
            'xl' => 'w-12',
            default => 'w-10',
        };
    }

    /**
     * Get variant classes
     */
    protected function variantClasses(): string
    {
        return match ($this->variant) {
            'primary' => 'bg-zinc-900 text-white hover:bg-zinc-800 dark:bg-zinc-50 dark:text-zinc-900 dark:hover:bg-zinc-200 border border-black/5 dark:border-white/10 shadow-sm',
            'secondary' => 'bg-zinc-100 text-zinc-900 hover:bg-zinc-200 dark:bg-zinc-800 dark:text-zinc-100 dark:hover:bg-zinc-700',
            'destructive' => 'bg-red-600 text-white hover:bg-red-700 dark:bg-red-600 dark:hover:bg-red-500 shadow-sm',
            'outline' => 'border border-zinc-300 bg-white hover:bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 dark:hover:bg-zinc-800 text-zinc-900 dark:text-zinc-100',
            'ghost' => 'hover:bg-zinc-100 dark:hover:bg-zinc-800 text-zinc-700 dark:text-zinc-300',
            'link' => 'text-zinc-900 underline-offset-4 hover:underline dark:text-zinc-100',
            default => $this->variant,
        };
    }

    /**
     * Get loading state classes
     */
    protected function loadingClasses(): string
    {
        if (!$this->autoLoading) {
            return '';
        }

        $classes = ui_classes('*:transition-opacity');

        // Different selectors for submit vs wire:click
        if ($this->type === 'submit') {
            $classes->add('[&[disabled]>:not([data-loading-indicator])]:opacity-0');
            $classes->add('[&[disabled]>[data-loading-indicator]]:opacity-100');
            $classes->add('[&[disabled]]:pointer-events-none');
        } else {
            $classes->add('[&[data-loading]>:not([data-loading-indicator])]:opacity-0');
            $classes->add('[&[data-loading]>[data-loading-indicator]]:opacity-100');
            $classes->add('data-loading:pointer-events-none');
        }

        return $classes->get();
    }

    /**
     * Get color classes for primary variant
     */
    protected function colorClasses(): string
    {
        if ($this->variant !== 'primary' || !$this->color) {
            return '';
        }

        return match ($this->color) {
            'red' => 'bg-red-600 hover:bg-red-700 dark:bg-red-600 dark:hover:bg-red-500 text-white',
            'orange' => 'bg-orange-600 hover:bg-orange-700 dark:bg-orange-600 dark:hover:bg-orange-500 text-white',
            'amber' => 'bg-amber-500 hover:bg-amber-600 dark:bg-amber-500 dark:hover:bg-amber-400 text-white',
            'yellow' => 'bg-yellow-500 hover:bg-yellow-600 dark:bg-yellow-500 dark:hover:bg-yellow-400 text-yellow-950',
            'lime' => 'bg-lime-600 hover:bg-lime-700 dark:bg-lime-600 dark:hover:bg-lime-500 text-white',
            'green' => 'bg-green-600 hover:bg-green-700 dark:bg-green-600 dark:hover:bg-green-500 text-white',
            'emerald' => 'bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-600 dark:hover:bg-emerald-500 text-white',
            'teal' => 'bg-teal-600 hover:bg-teal-700 dark:bg-teal-600 dark:hover:bg-teal-500 text-white',
            'cyan' => 'bg-cyan-600 hover:bg-cyan-700 dark:bg-cyan-600 dark:hover:bg-cyan-500 text-white',
            'sky' => 'bg-sky-600 hover:bg-sky-700 dark:bg-sky-600 dark:hover:bg-sky-500 text-white',
            'blue' => 'bg-blue-600 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-500 text-white',
            'indigo' => 'bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-600 dark:hover:bg-indigo-500 text-white',
            'violet' => 'bg-violet-600 hover:bg-violet-700 dark:bg-violet-600 dark:hover:bg-violet-500 text-white',
            'purple' => 'bg-purple-600 hover:bg-purple-700 dark:bg-purple-600 dark:hover:bg-purple-500 text-white',
            'fuchsia' => 'bg-fuchsia-600 hover:bg-fuchsia-700 dark:bg-fuchsia-600 dark:hover:bg-fuchsia-500 text-white',
            'pink' => 'bg-pink-600 hover:bg-pink-700 dark:bg-pink-600 dark:hover:bg-pink-500 text-white',
            'rose' => 'bg-rose-600 hover:bg-rose-700 dark:bg-rose-600 dark:hover:bg-rose-500 text-white',
            default => '',
        };
    }

    /**
     * Get tooltip classes 
     */
    protected function tooltipClasses(): string
    {
        if (!$this->tooltip) {
            return '';
        }

        // Using DaisyUI tooltip classes
        return ui_classes('tooltip')
            ->add(match ($this->tooltipPosition) {
                'top' => 'tooltip-top',
                'bottom' => 'tooltip-bottom',
                'left' => 'tooltip-left',
                'right' => 'tooltip-right',
                default => 'tooltip-top',
            })
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.button');
    }
}
