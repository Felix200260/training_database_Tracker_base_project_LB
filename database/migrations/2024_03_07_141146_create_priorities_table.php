<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('priorities', function (Blueprint $table) {
            $table->id(); // Создает первичный ключ с именем priority_id
            $table->string('priorities_level', 50)->unique(); // Создает уникальное текстовое поле для уровня приоритета
            $table->timestamps(); // Создает поля created_at и updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('priorities');
    }
};