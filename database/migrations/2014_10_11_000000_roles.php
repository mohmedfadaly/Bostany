<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;
use Illuminate\Support\Facades\Route;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('routes');
            $table->timestamps();
        });
        $routes = Route::getRoutes();

        // Extract route names from $routes
        $routeNames = [];
        foreach ($routes as $route) {
            $routeNames[] = $route->getName();
        }

        // Encode route names as JSON
        $jsonRoutes = json_encode($routeNames);

        // Assign the JSON-encoded route names to $role1->routes
        $role = new Role;
        $role->name ='مدير عام';
        $role->routes = $jsonRoutes;
        $role->save();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
