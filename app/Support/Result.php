<?php

declare(strict_types=1);

namespace App\Support;

/**
 * Result class
 * 
 * Standardized response object for serice layer operations
 * Provides consistent success/failure handling without exceptions.
 * Inspired by Rust's Result type and Laravel Pennant.
 */
final readonly class Result
{
    private function __construct(
        public bool $success,
        public mixed $data = null,
        public ?string $message = null,
    ) {}

    /**
     * Create a successful result.
     * 
     * @param mized $data Optional data to return
     * @param string|null Optional success message
     * @return self
     */
    public static function success(mixed $data = null, ?string $message = null): self
    {
        return new self(
            success: true,
            data: $data,
            message: $message
        );
    }

    /**
     * Create a failed result.
     * 
     * @param mized $data Optional Error message
     * @param mized $data Optional error context
     * @return self
     */
    public static function fail(string $message, mixed $data = null): self
    {
        return new self(
            success: false,
            data: $data,
            message: $message,
        );
    }

    /**
     * Check if result is successful.
     */
    public function succeeded(): bool
    {
        return $this->success;
    }

    /**
     * Check if result failed.
     */
    public function failed(): bool
    {
        return !$this->success;
    }

    /**
     * Get data or throw if failed.
     * 
     * @throws \RuntimeException
     */
    public function unwrap(): mixed
    {
        if ($this->failed()) {
            throw new \RuntimeException(
                $this->message ?? 'Operation failed'
            );
        }

        return $this->data;
    }

    /**
     * Get data or return defailt value.
     */
    public function unwrapOr(mixed $default): mixed
    {
        return $this->success ? $this->data : $default;
    }
}
