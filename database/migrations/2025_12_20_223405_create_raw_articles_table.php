<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('raw_articles', function (Blueprint $table) {
            $table->id();

            $table->string('source_type');             // rss, api, manual
            $table->string('source_name')->nullable(); // Reuters, AP, etc (internal)
            $table->string('source_url')->unique();
            $table->string('source_title');
            $table->longText('source_content');
            $table->timestamp('source_published_at')->nullable();

            $table->string('content_hash')->index(); // for deduplication

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('raw_articles');
    }
};
