<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public string $uuid;
    public string $tooltipPosition = 'lg:tooltip-top';

    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $label = null,
        public ?string $icon = null,
        public ?string $iconRight = null,
        public ?string $spinner = null,
        public ?string $link = null,
        public ?bool $external = false,
        public ?bool $noWireNavigate = false,
        public ?bool $responsive = false,
        public ?string $badge = null,
        public ?string $badgeClasses = null,
        public ?string $tooltip = null,
        public ?string $tooltipLeft = null,
        public ?string $tooltipRight = null,
        public ?string $tooltipBottom = null,
    ) {
        // MD5 ensures a unique key for Livewire even if labels are repeated
        $this->uuid = "Uuid" . md5(serialize($this)) . $id;
        $this->tooltip = $this->tooltip ?? $this->tooltipLeft ?? $this->tooltipRight ?? $this->tooltipBottom;

        // $this->tooltipPosition = $this->tooltipLeft ? 'lg:tooltip-left' : ($this->toolTipRight ? 'lg:tooltip-right' : ($this->tooltipBottom ? 'lg:tooltip-bottom' : 'lg:tooltip-top'));
        $this->tooltipPosition = match (true) {
            (bool)$tooltipLeft => 'lg:tooltip-left',
            (bool)$tooltipRight => 'lg:tooltip-right',
            (bool)$tooltipBottom => 'lg:tooltip-bottom',
            default => 'lg:tooltip-top',
        };
    }

    /**
     * Detects if the spinner should target a specific wire:click action
     */
    public function spinnerTarget(): ?string 
    {
        if ($this->spinner === 1) {
            return $this->attributes->whereStartsWith('wire:click')->first();
        }

        return $this->spinner;
    }

    

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.button');
    }
}
