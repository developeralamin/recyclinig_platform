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
        Schema::create('article_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('website_id')->nullable()->references('id')->on('websites')->onDelete('set null');
            $table->text('keywords')->nullable();
            $table->string('article_type', 100)->nullable();
            $table->string('format', 45)->nullable();
            $table->timestamps();
        });

        Schema::table('info_articles', function (Blueprint $table) {
            $table->foreignId('article_group_id')
                ->nullable()
                ->references('id')
                ->on('article_groups')
                ->onDelete('cascade')
                ->after('website_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_groups');
    }
};
