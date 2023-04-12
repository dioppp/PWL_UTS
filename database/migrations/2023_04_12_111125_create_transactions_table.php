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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('custId');
            $table->foreign('custId')->references('id')->on('customers');
            $table->string('empId', 5);
            $table->foreign('empId')->references('empId')->on('employees');
            $table->date('arrived');
            $table->enum('delivery', ['Ya','Tidak'])->default('Tidak');
            $table->double('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
