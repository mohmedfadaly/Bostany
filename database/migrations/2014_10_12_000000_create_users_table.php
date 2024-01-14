<?php

use App\Models\User;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('avatar')->default('default.jpg');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('password');
            $table->integer('role')->default(0);
            $table->enum('active',['0','1'])->default('1');
            $table->rememberToken();
            $table->timestamps();
        });

        $u = new User;
        $u->name     = 'mohamed hamada';
        $u->phone    = '01227580963';
        $u->email    = 'root@root.com';
        $u->password = bcrypt(111111);
        $u->role     = 1;
        $u->save();
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
