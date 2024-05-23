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
        Schema::create('city_weather', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('temperature', 5, 2);
            $table->float('pressure', 5, 2);
            $table->float('humidity', 5, 2);
            $table->float('min_temperature', 5, 2);
            $table->float('max_temperature', 5, 2);
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('city_weather');
    }
};
