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
            $table->string('father_name')->nullable();
            $table->string('cnic')->nullable();
            $table->string('dob')->nullable();
            $table->string('class')->nullable();
            $table->string('status')->nullable();
            $table->string('qualification')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_number')->nullable();
            $table->string('section')->nullable();
            $table->string('fee_plan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'father_name',
                'cnic',
                'dob',
                'class',
                'status',
                'qualification',
                'guardian_name',
                'guardian_number',
                'section',
                'fee_plan',
            ]);
        });
    }
};
