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
        Schema::create('result_subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('result_card_id')->constrained()->cascadeOnDelete();
            $table->integer('marks_obtained');
            $table->integer('total_marks');
            $table->string('grade',20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('result_subjects');
    }
};
