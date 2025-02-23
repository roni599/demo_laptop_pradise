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
        Schema::create('POS', function (Blueprint $table) {
            $table->id();
            $table->integer('pro_id');
            $table->string('pro_name')->nullable();
            $table->string('pro_quantity')->nullable();
            $table->string('pro_price')->nullable();
            $table->string('sub_total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('POS');
    }
};
