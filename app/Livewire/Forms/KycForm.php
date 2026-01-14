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
    public string $city = '';
    public string $state = '';
    public string $postal_code = '';
    public string $country = 'US';

    // Documents - Note the explicit type hinting for Livewire uploads
    public string $document_type = '';
    public ?TemporaryUploadedFile $document_front = null;
    public ?TemporaryUploadedFile $document_back = null;

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
    public function step2Rules(): array
    {
        return [
            'document_type' => ['required', new Enum(KycDocumentType::class)],
            'document_front' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            'document_back' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
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
            'gender',
            'nationality',
            'address_line1',
            'address_line2',
            'city',
            'state',
            'postal_code',
            'country',
            'document_type'
        ]);
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
