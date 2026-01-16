<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Kyc;
// use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class KycDocumentController extends Controller
{
    /**
     * Download KYC document with authorization
     * 
     * Only document owner or admins can download
     * 
     * @param Kyc $kyc KYC record
     * @param string $type Document type: front, back, or selfie
     * @return StreamedResponse|Response

     */
    public function download(Kyc $kyc, ?string $type = 'front'): Response
    {
        // Authorize: User must own the KYC or be an admin
        if (!Gate::allows('download', $kyc)) {
            abort(403, 'Unauthorized');
        }
        // $this->authorize('download', $kyc);

        $filePath = match ($type) {
            'front' => $kyc->document_front_path,
            'back' => $kyc->document_back_path,
            default => abort(404)
        };

        if (!$filePath || !Storage::disk('private')->exists($filePath)) {
            abort(404);
        }

        // Get file path based on document type
        // $filePath = match ($type) {
        //     'front' => $kyc->document_front_path,
        //     'back' => $kyc->document_back_path,
        //     'selfie' => $kyc->selfie_path,
        // };

        // dd($kyc->document_front_path);

        // Stream file download (memory-efficient for large files)
        // return Storage::disk('private')->download($kyc->document_front_path);
        $absolutePath = Storage::disk('private')->path($filePath);
        return response()->download($absolutePath);
    }
}
