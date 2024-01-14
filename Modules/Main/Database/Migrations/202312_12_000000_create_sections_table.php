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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('title_color')->nullable();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('home')->nullable();
            $table->string('villa')->nullable();
            $table->string('client')->nullable();
            $table->string('years')->nullable();
            $table->longText('description')->nullable();
            $table->longText('sub_description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
