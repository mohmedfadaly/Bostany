<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Setting\Entities\Setting;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->json('mission')->nullable();
            $table->json('culture')->nullable();
            $table->string('culture_image')->nullable();
            $table->json('about')->nullable();
            $table->string('contact_image')->nullable();
            $table->string('manager_name')->nullable();
            $table->string('logo')->nullable();
            $table->json('manager_message')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('link_facebook')->nullable();
            $table->text('link_twitter')->nullable();
            $table->text('link_linkedin')->nullable();
            $table->json('address')->nullable();
            $table->string('long')->nullable();
            $table->string('lat')->nullable();
            $table->integer('zoom')->nullable();
            $table->text('youtube')->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linkedin')->nullable();
            $table->text('insta')->nullable();
            $table->timestamps();
        });

        $setting = new Setting();
        $setting->name  = 'إسم التطبيق';
        $setting->email = 'mohamed.hamada0103@gmail.com';
        $setting->phone = '01068549674';
        $setting->save();

    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
