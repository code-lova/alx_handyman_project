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
        Schema::create('message_handymen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->string('subject');
            $table->longText('message');
            $table->string('email');
            $table->string('status')->comment('High,Low,Medium');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_handymen');
    }
};
