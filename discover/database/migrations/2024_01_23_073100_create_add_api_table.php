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
        Schema::create('add_api', function (Blueprint $table) {
            $table->id();
            $table->string('api_name');
            $table->string('api_url');
            $table->string('category')->nullable();
            $table->boolean('fetched')->default(false);
            $table->string('created_by')->default('admin');
            $table->string('updated_by')->default('admin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apis');
    }
};
