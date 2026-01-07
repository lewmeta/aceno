<?php

namespace App\Support\Helpers;

use App\Support\ClassBuilder;

if (!function_exists('ui_classes')) {
    /**
     * Create a new ClassBuilder instance 
     * 
     * @param string|array $base Base classes to start with
     * @return ClassBuilder
     */
    function ui_classes(string|array $base = ''): ClassBuilder
    {
        return new ClassBuilder($base);
    }
}

if (!function_exists('ui_uuid')) {
    /**
     * Generate a unique identifier for UI components
     * 
     * @param string|null $prefix
     * @param string|null $id
     * @return string
     */
    function ui_uuid(?string $prefix = 'ui', ?string $id = null): string
    {
        $hash = substr(md5(uniqid((string)mt_rand(), true)), 0, 8);
        return ($prefix ? $prefix . '-' : '') . $hash . ($id ? '-' . $id : '');
    }
}
