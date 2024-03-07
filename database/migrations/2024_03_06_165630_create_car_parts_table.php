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
        Schema::create('car_parts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('car_model');
            $table->enum('car_brand',['Toyota','Honda', 'Ford', 'Chevrolet', 'Volkswagen', 'Nissan', 'BMW', 'Mercedes-Benz', 'Audi', 'Hyundai', 'Kia', 'Subaru', 'Jeep', 'Tesla', 'Lexus', 'Mazda', 'Volvo', 'Porsche', 'Ferrari', 'Mitsubishi']);
            $table->decimal('price', 8,2);
            $table->string('point_price');
            $table->enum('usage_level', [ 'New', 'Like New', 'Good', 'Fair', 'Poor']);
            $table->string('car_part_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_parts');
    }
};
