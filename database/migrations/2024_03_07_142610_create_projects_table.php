<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('project_short_name', 255);
            $table->text('project_description');

            // Исправлено: убраны дублирующие объявления
            $table->foreignId('priorities_id')->nullable()->constrained('priorities')->onDelete('set null');
            $table->foreignId('statuses_id')->nullable()->constrained('statuses')->onDelete('set null');
            $table->foreignId('goals_id')->nullable()->constrained('goals')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
