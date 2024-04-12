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
        Schema::create('analysis_queue_task_results', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('task_id');

            $table->string('name');
            $table->text('description');
            $table->float('number_of_similarities');
            $table->string('image_path');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analysis_queue_task_results');
    }
};
