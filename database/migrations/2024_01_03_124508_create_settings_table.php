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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('app_name');
            $table->text('app_desc');
            $table->string('tawk_id');
            $table->string('email');
            $table->string('mobile');
            $table->longText('address');
            $table->string('working_hours');
            $table->tinyInteger('payment')->default('1');
            $table->tinyInteger('registration')->default('1');
            $table->tinyInteger('email_notify')->default('1');
            $table->tinyInteger('handyman')->default('0');
            $table->integer('pricing')->default('1');
            $table->integer('testimony')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
