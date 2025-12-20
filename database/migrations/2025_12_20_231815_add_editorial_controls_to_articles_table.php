<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->timestamp('publish_at')->nullable()->after('published_at');
            $table->unsignedBigInteger('editor_id')->nullable()->after('status');

            $table->index(['status', 'publish_at']);
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropIndex(['status', 'publish_at']);
            $table->dropColumn(['publish_at', 'editor_id']);
        });
    }
};
