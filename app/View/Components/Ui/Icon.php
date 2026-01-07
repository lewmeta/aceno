<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use Illuminate\View\Component;

class Icon extends Component
{
    public string $uuid;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public ?string $id = null,
        public ?string $label = null,
    ) {
        $this->uuid = "icon" . md5(serialize($this)) . $id;
    }

    public function icon(): string| Stringable
    {
        $name = Str::of($this->name);

        return $name->contains('.') ? $name->replace('.', '-') : "heroicon-{$this->name}";
    }

    public function labelClasses(): string
    {
        // Remove `w-*` and `h-*` classes because it applies only for icon
        return Str::replaceMatches('/(w-\w*)|(h-\w*)/', '', $this->attributes->get('class') ?? '');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.icon');
    }
}
