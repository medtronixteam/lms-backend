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
            $table->string('gender')->nullable();
            $table->string('father_cnic')->nullable();
            $table->string('religion')->nullable();
            $table->string('nationality')->nullable();
            $table->string('domicile')->nullable();
            $table->string('blood_group')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('father_cnic');
            $table->dropColumn('religion');
            $table->dropColumn('nationality');
            $table->dropColumn('domicile');
            $table->dropColumn('blood_group');
        });
    }
};
