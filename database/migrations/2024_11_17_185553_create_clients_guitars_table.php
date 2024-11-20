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
        Schema::create('clients_guitars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('return_date'); 
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('guitar_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('guitar_id')->references('id')->on('guitars');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients_guitars');
    }
};
