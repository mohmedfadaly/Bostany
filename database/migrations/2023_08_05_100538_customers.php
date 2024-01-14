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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('avatar')->default('default.png');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('key',10)->nullable();
            $table->string('phone')->nullable();
            $table->enum('gender',['male','female'])->default('male');
            $table->string('access_token')->nullable();
            $table->string('fb_token')->nullable();
            $table->string('code',4)->nullable();
            $table->string('last_send')->nullable();
            $table->string('delete_account_access_token')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
