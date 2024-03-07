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
        Schema::create('goals', function (Blueprint $table) {
            $table->id();
            $table->string('username', 255)->unique();
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->string('first_name', 255)->nullable();
            $table->string('last_name', 255)->nullable();

            // создание столбцов дял внешних ключей
            $table->unsignedBigInteger('priorities_id'); // Внешний ключ для priority
            $table->unsignedBigInteger('statuses_id'); // Внешний ключ для status
            $table->unsignedBigInteger('user_id'); // Внешний ключ для users

            // связывание столбцов с таблицами
            $table->foreign('priorities_id')->references('id')->on('priorities')->onDelete('cascade');
            $table->foreign('statuses_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            
            $table->timestamps();
        });
    }

    //test
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goals');
    }
};