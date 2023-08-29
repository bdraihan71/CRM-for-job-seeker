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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('job_title');
            $table->string('company_name')->nullable();
            $table->string('job_source')->nullable();
            $table->string('location')->nullable();
            $table->unsignedBigInteger('country_id');
            $table->enum('job_nature', ['full_time', 'part_time', 'freelance', 'internship', 'volunteer'])->nullable();
            $table->enum('office_type', ['on_site', 'remote', 'hybrid'])->nullable();
            $table->json('salary_range')->nullable(); //100-200 USD
            $table->date('application_last_date')->nullable();
            $table->unsignedBigInteger('current_stage_id')->default(1);
            $table->text('detail')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('current_stage_id')->references('id')->on('stages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
