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
        Schema::create('analysis_queue_tasks', function (Blueprint $table) {
            $table->id();

            $table->string('image_path')->nullable();
            $table->date('creation_date')->nullable();

            $table->bigInteger('author_id');

            $table->boolean('is_ml_done')->default(false);
            $table->boolean('is_ml_sent')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analysis_queue_tasks');
    }
};
