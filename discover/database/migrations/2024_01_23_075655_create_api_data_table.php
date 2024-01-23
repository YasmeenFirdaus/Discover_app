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
            $table->foreign('api_id')->references('id')->on('add_api');
            $table->string('category')->nullable();
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
            $table->json('tags')->nullable();
            $table->json('metadata')->nullable();
            $table->string('post_id');
            $table->json('api_response');
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