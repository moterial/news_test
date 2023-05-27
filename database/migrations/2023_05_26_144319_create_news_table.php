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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('content')->nullable();
            // $table->string('image')->nullable();
            // $table->string('image2')->nullable();
            // $table->string('image3')->nullable();
            // $table->string('image4')->nullable();
            // $table->string('image5')->nullable();
            // $table->string('image5')->nullable();
            $table->string('link')->nullable();
            $table->boolean('is_publish')->default(false);
            $table->string('author')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
