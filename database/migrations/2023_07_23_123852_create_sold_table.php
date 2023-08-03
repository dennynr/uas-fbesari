<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sold', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('stock');
            $table->decimal('purchase_price', 10, 2); // Harga beli
            $table->decimal('selling_price', 10, 2);  // Harga jual
            $table->date('date')->nullable(); // Tambahkan kolom 'date' dengan nullable() untuk mengizinkan nilai null
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sold');
    }
};
