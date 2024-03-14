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
        Schema::create('decision', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('car_model');
            $table->enum('car_brand',['Toyota','Honda', 'Ford', 'Chevrolet', 'Volkswagen', 'Nissan', 'BMW', 'Mercedes-Benz', 'Audi', 'Hyundai', 'Kia', 'Subaru', 'Jeep', 'Tesla', 'Lexus', 'Mazda', 'Volvo', 'Porsche', 'Ferrari', 'Mitsubishi']);
            $table->year('year_of_prod');
            $table->enum('status',["pending","denied","approved"]);
            $table->string('decision_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('decision');
    }
};
