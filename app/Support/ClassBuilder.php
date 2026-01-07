<?php

namespace App\Support;

use Stringable;

class ClassBuilder implements Stringable
{
    protected array $classes = [];

    public function __construct(string|array $base = '')
    {
        if (is_array($base)) {
            $this->classes = $base;
        } elseif ($base !== '') {
            $this->classes[] = $base;
        }
    }

    /**
     * Add one or more classes
     */
    public function add(string|array|null $classes): self
    {
        if ($classes === null) {
            return $this;
        }

        if (is_array($classes)) {
            foreach ($classes as $class) {
                if ($class !== null && $class !== '') {
                    $this->classes[] = $class;
                }
            }
        } elseif ($classes !== '') {
            $this->classes[] = $classes;
        }

        return $this;
    }

    /**
     * Conditionally add classes
     */
    public function when(bool $condition, string|array $classes, string|array $default = []): self
    {
        if ($condition) {
            return $this->add($classes);
        }

        return $this->add($default);
    }

    /**
     * Add classes unless conditions is true
     */
    public function unless(bool $condition, string|array $classes): self
    {
        return $this->when(!$condition, $classes);
    }

    /**
     * Merge with another ClassBuilder or string
     */
    public function merge(self|string $classes): self
    {
        if ($classes instanceof self) {
            $this->classes = array_merge($this->classes, $classes->classes);
        } else {
            $this->classes[] = $classes;
        }

        return $this;
    }

    /**
     * Get the final class string
     */
    public function get(): string
    {
        return implode(' ', array_filter(array_unique($this->classes)));
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
