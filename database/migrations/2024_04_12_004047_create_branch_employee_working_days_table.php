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
        Schema::create('branch_employee_working_days', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('day_of_week_id');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            // $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('day_of_week_id')->references('id')->on('days_of_week')->onDelete('cascade');
            $table->foreign('day_of_week_id')->references('id')->on('days_of_week')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_employee_working_days');
    }
};
