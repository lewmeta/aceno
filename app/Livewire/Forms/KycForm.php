<?php

declare(strict_types=1);

namespace App\Livewire\Forms;

use App\Enums\Gender;
use App\Enums\KycDocumentType;
use Illuminate\Validation\Rules\Enum;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class KycForm extends Form
{
    // Personal info
    public string $full_name = '';
    public string $date_of_birth = '';
    public string $gender = '';
    public string $nationality = '';

    // Address Info
    public string $address_line1 = '';
    public string $address_line2 = '';
    public ?string $city = '';
    public ?string $state = '';
    public ?string $postal_code = '';
    public string $country = 'US';
    public ?string $document_issue_date;
    public ?string $document_issuing_country = '';
    public ?string $document_expiry_date = '';

    // Documents - Note the explicit type hinting for Livewire uploads
    public string $document_type = '';
    // public ?TemporaryUploadedFile $document_front = null;
    // public ?TemporaryUploadedFile $document_back = null;

    public $document_front = null;
    public $document_back = null;

    /**
     * Rules for step 1: Personal Details.
     */
    public function step1Rules(): array
    {
        return [
            'full_name' => 'required|string|min:3|max:100',
            'date_of_birth' => 'required|date|before:-18 years',
            'gender' => ['required', new Enum(Gender::class)],
            'nationality' => 'required|string|max:3',
        ];
    }

    /**
     * Rules for Step 2: Documents.
     */
    // public function step2Rules(): array
    // {
    //     $rules = [
    //         'document_type' => ['required', new Enum(KycDocumentType::class)],
    //         'document_front' => 'required|image|mimes:jpg,jpeg,webp,svg,png|max:5120',
    //         'document_issue_date' => 'required|date|before:today',
    //         'document_issuing_country' => 'required|string|size:3',
    //         'document_expiry_date' => 'required|date|after:today',
    //     ];

    //     // Access the Enum logic directly
    //     $docType = KycDocumentType::tryFrom($this->document_type);

    //     $rules['document_back'] = ($docType && $docType->requireBackSide())
    //         ? 'required|image|mimes:jpg,jpeg,png,svg,webp|max:5120'
    //         : 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:5120';

    //     return $rules;
    // }

    /**
     * Rules for Step 2: Documents.
     */
    public function step2Rules(): array
    {
        $docType = KycDocumentType::tryFrom($this->document_type);

        return [
            'document_type' => ['required', new Enum(KycDocumentType::class)],
            'document_issue_date' => 'required|date|before:today',
            'document_expiry_date' => 'required|date|after:today',
            'document_issuing_country' => 'required|string|size:3',

            // Smart Validation for Front
            'document_front' => $this->resolveRules('document_front', required: true),

            // Smart Validation for Back (Dynamic based on Enum)
            'document_back' => $this->resolveRules(
                field:'document_back',
                required: ($docType && $docType->requireBackSide())
            ),
        ];
    }

    /**
     * Precision Rule Resolver
     */
    private function resolveRules(string $field, bool $required): array
    {
        $value = $this->{$field};

        // Case 1: Existing file path in DB (Pragmatic 'Resume' state)
        if (is_string($value) && !empty($value)) {
            return ['nullable'];
        }

        // Case 2: Fresh upload or missing file
        return [
            $required ? 'required' : 'nullable',
            'image',
            'mimes:jpg,jpeg,webp,svg,png',
            'max:5120',
        ];
    }

    /**
     * Rules for step 3: Address.
     */
    public function step3Rules(): array
    {
        return [
            'address_line1' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|size:2',
        ];
    }

    /**
     * Laravel 12 Helper: Map only the persistent fields.
     */
    public function getMappedData(): array
    {
        // Exclude file objects as they are handled via $file->store()
        return $this->only([
            'full_name',
            'date_of_birth',
            'nationality',
            'address_line1',
            'address_line2',
            'city',
            'state',
            'postal_code',
            'country',
            'gender',
            'document_type'
        ]);
    }

    /**
     * Helper to get a previewable URL for the UI.
     */
    public function getPreviewUrl(string $field, int $kycId): ?string
    {
        $value = $this->{$field};

        if ($value instanceof TemporaryUploadedFile) {
            return $value->temporaryUrl();
        }

        // If it's a string, it's our private path. 
        // We route it through our new KycDocumentController.
        if (is_string($value) && !empty($value)) {
            $type = str_replace('document_', '', $field); // 'front' or 'back'
            return route('vendor.kyc.documents.download', [
                'kyc' => $kycId,
                'type' => $type
            ]);
        }

        return null;
    }

    /**
     * Helper to reset form submission.
     * 
     * @return void
     */
    public function clear(): void
    {
        $this->reset();
    }
}
