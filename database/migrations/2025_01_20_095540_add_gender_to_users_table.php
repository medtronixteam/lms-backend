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
            $table->string('gender');
            $table->string('father_cnic');
            $table->string('religion');
            $table->string('nationality');
            $table->string('domicile');
            $table->string('blood_group');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender')->nullable();
            $table->dropColumn('father_cnic')->nullable();
            $table->dropColumn('religion')->nullable();
            $table->dropColumn('nationality')->nullable();
            $table->dropColumn('domicile')->nullable();
            $table->dropColumn('blood_group')->nullable();
        });
    }
};
