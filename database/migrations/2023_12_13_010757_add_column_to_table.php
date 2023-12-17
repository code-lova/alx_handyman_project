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
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('email_status')->default('0')->after('email');
            $table->tinyInteger('is_active')->default('1');
            $table->tinyInteger('role_as')->default('0');
            $table->string('location')->nullable()->after('email');
            $table->string('phone')->nullable()->after('email');
            $table->string('verification_code')->nullable();
            $table->string('ip_address')->nullable();
            $table->dateTime('last_login')->nullable();
            $table->timestamp('last_seen')->nullable();
            $table->string('birth_date')->nullable()->after('location');
            $table->string('marital_status')->nullable()->after('location');
            $table->string('address')->nullable()->after('location');
            $table->string('user_image')->nullable()->after('location');
            $table->string('gender')->nullable()->after('location');
            $table->string('skills')->nullable()->after('location');
            $table->string('job_title')->nullable()->after('location');
            $table->string('job_type')->nullable()->after('location');
            $table->string('job_category')->nullable()->after('location');
            $table->string('url')->nullable()->after('gender');
            $table->string('education')->nullable()->after('gender');
            $table->string('experience')->nullable()->after('gender');
            $table->longText('description')->nullable()->after('password');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('email_status');
            $table->dropColumn('is_active');
            $table->dropColumn('role_as');
            $table->dropColumn('location');
            $table->dropColumn('phone');
            $table->dropColumn('verification_code');
            $table->dropColumn('ip_address');
            $table->dropColumn('last_login');
            $table->dropColumn('last_seen');
            $table->dropColumn('birth_date');
            $table->dropColumn('marital_status');
            $table->dropColumn('address');
            $table->dropColumn('user_image');
            $table->dropColumn('gender');
            $table->dropColumn('skills');
            $table->dropColumn('job_title');
            $table->dropColumn('job_type');
            $table->dropColumn('job_category');
            $table->dropColumn('url');
            $table->dropColumn('education');
            $table->dropColumn('experience');
            $table->dropColumn('description');

        });
    }
};
