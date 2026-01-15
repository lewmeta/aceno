<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\KycStatus;
use App\Livewire\Forms\KycForm;
use App\Models\Kyc;
use App\Models\User;
use App\Traits\SecureUploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

/**
 * Finalizing KYC is a sensitive domain operation.
 * We use 'final' to prevent unintended inheritance and logic overrides.
 */
final class KycService
{
    use SecureUploadTrait;

    /**
     * Persist files and metadata immediately to prevent progress loss.
     */
    public function saveStep2(User $user, KycForm $form): void
    {
        $folder = "kyc-drafts/{$user->id}";
        $updates = [
            'document_type' => $form->document_type,
            'document_issue_date' => $form->document_issue_date,
            'document_expiry_date' => $form->document_expiry_date,
            'document_issuing_country' => $form->document_issuing_country,
        ];

        // Only uppload if a new file was actually provided
        if ($form->document_front instanceof TemporaryUploadedFile) {
            $updates['document_front_path'] = $this->uploadFile($form->document_front, 'private');
        }

        if ($form->document_back instanceof TemporaryUploadedFile) {
            $updates['document_back_path'] = $this->uploadFile($form->document_back);
        }

        $user->kyc->update($updates);
    }

    /**
     * Execute final transition from Draft to Pending
     * Uses a DB Transaction to ensure file I/O and DB state are atomic.
     */
    public function finalizeSubmission(User $user, KycForm $form): void
    {
        DB::transaction(function () use ($user, $form) {
            $user->kyc->update(array_merge($form->getMappedData(), [
                'status' => KycStatus::PENDING->value,
                'submitted_at' => now(),
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]));
        });
    }
    // public function finalizeSubmission(User $user, KycForm $form): Kyc
    // {
    //     return DB::transaction(function () use ($user, $form) {
    //         $kyc = $user->kyc;
    //         $folder = "kyc-documents/{$user->id}";

    //         // 1. Securely move files to private storage
    //         $frontPath = $this->uploadFile($form->document_front, 'private');

    //         $backPath = ($form->document_back)
    //             ? $this->uploadFile($form->document_back, 'private')
    //             : null;

    //         // 2. Update the record and flip status.
    //         $kyc->update(array_merge($form->getMappedData(), [
    //             'document_front_path' => $frontPath,
    //             'document_back_path' => $backPath,
    //             'status' => KycStatus::PENDING->value,
    //             'submitted_at' => now(),
    //             'ip_address' => request()->ip(),
    //             'user_agent' => request()->userAgent(),
    //         ]));

    //         Log::info("User {$user->id} submitted KYC for review.");
    //     });
    // }
}
