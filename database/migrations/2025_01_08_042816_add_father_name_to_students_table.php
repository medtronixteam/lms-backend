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
        Schema::table('students', function (Blueprint $table) {
            $table->string('father_name');
            $table->string('cnic');
            $table->string('password');
            $table->string('guardian_name');
            $table->string('guardian_number');
            $table->string('section');
            $table->string('fee_plan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn([
                'father_name',
                'cnic',
                'password',
                'guardian_name',
                'guardian_number',
                'section',
                'fee_plan',
            ]);
        });
    }
};
