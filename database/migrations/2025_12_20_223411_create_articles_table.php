<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('raw_article_id')
                ->nullable()
                ->constrained('raw_articles')
                ->nullOnDelete();

            $table->unsignedBigInteger('category_id')->nullable();

                                               // Editorial workflow
            $table->string('status')->index(); // ai_draft, needs_review, approved, published, rejected

            // Core content
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('lead')->nullable();
            $table->longText('body');

            // Media
            $table->string('hero_image_url')->nullable();
            $table->string('hero_image_alt')->nullable();

            // Meta
            $table->string('location_label')->nullable();
            $table->timestamp('published_at')->nullable();

            // SEO
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();

            // Engagement
            $table->unsignedBigInteger('view_count')->default(0);
            $table->boolean('is_featured')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
