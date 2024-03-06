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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique()->comment('Название услуги');
            $table->text('description')->comment('Описание услуги');
            $table->string('price')->comment('Стоимость услуги');
            $table->string('image')->comment('Картинка услуги');
            $table->boolean('isActive')->default(0)->comment('Статус услуги');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
