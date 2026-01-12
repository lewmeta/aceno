<?php

use App\Enums\KycStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kycs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();

            /** Status & Verification */
            $table->string('status')->default(KycStatus::PENDING->value)->index();
            $table->text('rejection_reason')->nullable();
            $table->timestamp('submitted_at')->nullable(); // When user submitted
            $table->timestamp('verified_at')->nullable(); // When admin approved
            $table->foreignId('verified_by')->nullable()->constrained('admins')->nullOnDelete();

            /** Personal information */
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->string('gender')->nullable(); // uses enum
            $table->string('nationality')->nullable();

            /** Document information */
            $table->string('document_type');
            $table->string('document_number')->nullable()->comment('Passport/ID number'); //
            $table->date('document_issue_date')->nullable();
            $table->date('document_expiry_date')->nullable();
            $table->string('document_issuing_country')->nullable();

            /* Document files */
            $table->string('document_front_path'); // Front of ID/passport
            $table->string('document_back_path')->nullable(); // Back of ID (if applicable)
            $table->string('selfie_path')->nullable(); // Selfie for verification (like Stripe)

            /** Verification Metadata */
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable()->comment('Browser info');
            $table->json('verification_notes')->nullable()->comment('Admin notes during review');
            $table->unsignedTinyInteger('attempt_number')->default(1);

            /** Retention & Legal Hold */
            $table->timestamp('eligible_for_purge_at')->nullable()->index();
            $table->boolean('legal_hold')->default(false)->comment('Prevents auto-purge during audits');

            /** Audit trails */
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kycs');
    }
};
