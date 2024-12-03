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
            $table->string('has_image')->nullable()->after('status');
            $table->longText('errors')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('info_articles', function (Blueprint $table) {
            $table->dropColumn('has_image');
            $table->dropColumn('errors');
        });
    }
};
