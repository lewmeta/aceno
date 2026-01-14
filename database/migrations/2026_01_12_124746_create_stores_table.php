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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();

            // Brand & Identity 
            $table->foreignId('user_id')->unique()->constrained('users')->cascadeOnDelete();
            $table->string('name')->index(); // Store name
            $table->string('slug')->unique();

            // Media
            $table->string('logo_path')->nullable();
            $table->string('banner_path')->nullable();
            $table->string('favicon_path')->nullable();

            // Finance (Cents for Precision)
            $table->bigInteger('total_revenue_cents')->default(0);
            $table->char('currency', 3)->default('USD');
            $table->decimal('commission_rate', 5, 2)->default(10.00);

            // Store settings
            $table->boolean('is_active')->default(true)->index();
            $table->boolean('is_featured')->default(false)->index(); // Featured stores on homepage
            $table->boolean('vacation_mode')->default(false);
            $table->text('vacation_message')->nullable(); // "Back on Jan 20th"
            $table->timestamp('vacation_until')->nullable();

            /** Verification & Trust badges */
            $table->boolean('is_verified')->default(false)->index();
            $table->timestamp('verified_at')->nullable();
            $table->boolean('is_top_seller')->default(false); // Top seller badge (like eBay)

            // SEO & Policy
            $table->json('seo')->nullable(); // title, description, key words
            $table->json('policies')->nullable(); // return, shipping, privacy

            // Stats (Denormalized)
            $table->unsignedInteger('total_sales')->default(0);
            $table->decimal('rating', 3, 2)->default(0.00);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
