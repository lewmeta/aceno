<?php

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
        Schema::create('kyc_audit_logs', function (Blueprint $table) {
            $table->id();

            // Relationships
            $table->foreignId('kyc_id')->constrained('kycs')->cascadeOnDelete();
            $table->foreignId('admin_id')->constrained('admins')->cascadeOnDelete();

            // Action Tracking
            $table->string('action')->index(); // viewed, approved, rejected, flagged, unflagged
            $table->text('reason')->nullable();
            $table->json('metadata')->nullable();

            // Security tracking
            $table->ipAddress('ip_address')->nullable();
            $table->text('user_agent')->nullable();

            // Perfomance metrics
            $table->unsignedInteger('review_duration_seconds')->nullable()->comment('Time spent reviewing');

            $table->timestamp('created_at'); // No updated_at - audit logs are immutable

            // Indexes for reporting
            $table->index(['admin_id', 'created_at']); // Admin performance reports
            $table->index(['action', 'created_at']); // Action analytics
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kyc_audit_logs');
    }
};
