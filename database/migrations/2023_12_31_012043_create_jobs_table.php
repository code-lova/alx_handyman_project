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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->string('email');
            $table->string('job_title');
            $table->string('job_location')->comment('Optional');
            $table->string('job_type');
            $table->string('job_category');
            $table->longText('job_description');
            $table->string('url')->nullable();
            $table->string('image')->nullable()->comment('Optional');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
