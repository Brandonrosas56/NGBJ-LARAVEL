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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('names', 125);
            $table->string('surnames', 125);
            $table->string('cellphone', 20);
            $table->string('email', 125);
            $table->string('address', 125);
            $table->string('document_number', 30);
            $table->enum('status', ["active", "inactive"])->default("active");
            //Declaración llave foranea
            $table->bigInteger('document_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
