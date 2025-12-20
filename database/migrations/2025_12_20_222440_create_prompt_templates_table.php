<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prompt_templates', function (Blueprint $table) {
            $table->id();

                                             // Human/admin friendly
            $table->string('key')->unique(); // e.g. news.rewrite_translate.v1
            $table->string('name');          // e.g. News: Rewrite + Translate
            $table->text('description')->nullable();

            // Prompt content
            $table->longText('system_prompt');
            $table->longText('user_prompt');

                                                              // Model + tuning (kept flexible)
            $table->string('model')->default('gpt-4.1-mini'); // you can change later
            $table->decimal('temperature', 3, 2)->default(0.50);
            $table->unsignedSmallInteger('max_output_tokens')->default(1200);

            // Variables the template expects, stored as JSON array
            // Example: ["outlet_name","target_language","source_title","source_url","source_published_at","source_content"]
            $table->json('variables')->nullable();

            // Enable/disable and version control
            $table->unsignedInteger('version')->default(1);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prompt_templates');
    }
};
