<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ai_job_logs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('raw_article_id')->nullable()->index();
            $table->unsignedBigInteger('article_id')->nullable()->index();

            $table->string('job_type')->default('rewrite_translate');
            $table->string('status')->index(); // queued, running, success, failed

            $table->text('message')->nullable();
            $table->longText('payload')->nullable(); // JSON string
            $table->longText('result')->nullable();  // JSON string
            $table->longText('error')->nullable();

            $table->timestamp('started_at')->nullable();
            $table->timestamp('finished_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ai_job_logs');
    }
};
