<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('api_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('api_id');
            $table->foreign('api_id')->references('id')->on('apis');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('category_master');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->string('source_name', 100);
            $table->string('source_url')->nullable();
            $table->string('url')->nullable();
            $table->string('content_type', 50);
            $table->timestamp('published_at');
            $table->string('author_name', 100)->nullable();
            $table->string('author_url')->nullable();
            $table->string('category');
            $table->json('tags')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_data');
    }
};