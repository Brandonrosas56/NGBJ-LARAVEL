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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->double('price', 10, 2);
            $table->integer('stock');
            $table->integer('subtotal');
            $table->enum('status', ["active", "inactive"])->default("active");
            //Declaración llave foranea
            $table->bigInteger('invoice_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            //Union llave foranea
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('product_id')->references('id')->on('products');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
