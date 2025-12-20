<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            // Internal identifier used in URLs: /categories/{slug}
            $table->string('slug')->unique();

            // Display fields (can be Albanian now, English later; system doesn't care)
            $table->string('name');
            $table->text('description')->nullable();

            // SEO fields
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();

            // Ordering for nav + homepage
            $table->unsignedInteger('order_index')->default(0);
            $table->boolean('active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
