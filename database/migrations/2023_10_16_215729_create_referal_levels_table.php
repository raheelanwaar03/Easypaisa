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
        Schema::create('referal_levels', function (Blueprint $table) {
            $table->id();
            $table->string('level1');
            $table->string('level2');
            $table->string('level3');
            $table->string('level4');
            $table->string('level5');
            $table->string('level6');
            $table->string('level7');
            $table->string('level8');
            $table->string('level9');
            $table->string('level10');
            $table->string('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referal_levels');
    }
};
