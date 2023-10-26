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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);  // Precio con 2 decimales
            $table->integer('stock')->default(0); // Stock del producto, lo iniciamos a 0 por defecto.
            $table->string('image')->nullable();  // Campo para la imagen del producto. Lo hacemos nullable porque podría no tener una imagen asociada inicialmente.
            $table->timestamps();

            // Clave foránea para la categoría del producto.
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
