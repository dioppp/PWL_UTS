<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('shoe_id');
            $table->foreign('shoe_id')->references('id')->on('shoes');
            $table->unsignedBigInteger('bund_id');
            $table->foreign('bund_id')->references('id')->on('bundles');
            $table->enum('delivery', ['Yes', 'No'])->default('Yes');
            $table->dateTime('ordered_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->enum('status', ['pending', 'on process', 'done'])->default('pending');
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
