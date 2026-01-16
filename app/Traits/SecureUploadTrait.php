<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait SecureUploadTrait
{
    /**
     * Store a file securely on a specific disk.
     */
    public function uploadFile(
        UploadedFile $file,
        string $folder = 'uploads',
        string $disk = 'private',
        ?string $oldPath = null
    ): string {
        // 1. Clean up the old file if it exists and isn't a default
        if ($oldPath && Storage::disk($disk)->exists($oldPath)) {
            $this->deleteFile($oldPath, $disk);
        }

        // 2. Generate a secure, unique filename
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

        // 3. Store and return the relative path
        return $file->storeAs($folder, $filename, $disk);
    }

    /**
     * Delete a file from a specific disk.
     */
    public function deleteFile(?string $path, string $disk = 'private'): bool
    {
        if (!$path) return false;

        if (Storage::disk($disk)->exists($path)) {
            return Storage::disk($disk)->delete($path);
        }

        return false;
    }

    /**
     * Generate user-friendly download filename.
     * 
     * Format: KYC_{user_id}_{type}_{timestamp}.{ext}
     * Example: KYC_123_front_20260115.jpg
     * 
     * @param Kyc $kyc KYC record
     * @param string $type Document type
     * @param string $path Original file path
     * @return string Friendly filename
     */
    // private function generateFilename(Kyc $kyc, string $type, string $path): string
    // {
    //     $extension = pathinfo($path, PATHINFO_EXTENSION);
    //     $timestamp = $kyc->created_at->format('Ymd');

    //     return "KYC_{$kyc->user_id}_{$type}_{$timestamp}.{$extension}";
    // }
}
