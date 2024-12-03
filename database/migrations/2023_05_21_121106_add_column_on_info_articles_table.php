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
        Schema::table('info_articles', function (Blueprint $table) {
            $table->boolean('has_faq')->default(false)->after('has_youtube_video');
            $table->boolean('is_published')->default(false)->after('has_faq');
            $table->string('feature_image', 800)->nullable()->after('is_published');
            $table->string('wp_status')->nullable()->after('format');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('info_articles', function (Blueprint $table) {
            $table->dropColumn('has_faq');
            $table->dropColumn('feature_image');
            $table->dropColumn('is_published');
        });
    }
};
