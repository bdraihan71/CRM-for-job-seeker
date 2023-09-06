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
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('job_title');
            $table->string('company_name')->nullable();
            $table->string('job_source')->nullable();
            $table->string('location')->nullable();
            $table->foreignId('country_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->enum('job_nature', ['full_time', 'part_time', 'freelance', 'internship', 'volunteer'])->nullable();
            $table->enum('office_type', ['on_site', 'remote', 'hybrid'])->nullable();
            $table->json('salary_range')->nullable(); //100-200 USD
            $table->date('application_last_date')->nullable();
            $table->foreignId('current_stage_id')->default(1)->constrained('stages', 'id')->onUpdate('cascade')->onDelete('cascade');
            $table->text('detail')->nullable();
            $table->softDeletes();
            $table->timestamps();
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
