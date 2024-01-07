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
        Schema::table('job_contacteds', function (Blueprint $table) {
            $table->string('job_title')->nullable()->after('details');
            $table->string('job_category')->nullable()->after('details');
            $table->string('job_type')->nullable()->after('details');
            $table->string('job_location')->nullable()->after('details');
            $table->dateTime('start_date')->nullable()->after('status');
            $table->dateTime('end_date')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_contacteds', function (Blueprint $table) {
            $table->dropColumn('job_title');
            $table->dropColumn('job_category');
            $table->dropColumn('job_type');
            $table->dropColumn('job_location');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');

        });
    }
};
