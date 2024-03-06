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
        Schema::create('kases', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table -> text('description');
            $table -> integer('price');
            $table->text('image');
            $table-> date('date');
            $table-> boolean('isActive')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kases');
    }
};
