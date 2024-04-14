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
        Schema::create('working_hours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            // $table->unsignedBigInteger('day_of_week_id');
            $table->time('opening_time');
            $table->time('closing_time');
            $table->timestamps();

            // $table->foreign('day_of_week_id')->references('id')->on('days_of_week');
            $table->unsignedBigInteger('day_of_week_id');
            $table->foreign('day_of_week_id')->references('id')->on('days_of_week')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('working_hours');
    }
};
