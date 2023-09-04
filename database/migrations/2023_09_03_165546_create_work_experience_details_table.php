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
        Schema::create('work_experience_details', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->unsignedBigInteger('user_id');
            $table->string('company_name');
            $table->date('job_start_date');
            $table->date('job_end_date')->nullable();
            $table->longText('job_description')->nullable();
            $table->boolean('job_current')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_experience_details');
    }
};
