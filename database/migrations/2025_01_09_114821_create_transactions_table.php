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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->double('debit')->default(0);
            $table->double('credit')->default(0);
            $table->integer('expense_id')->default(0);
            $table->date('transaction_date')->nullable();
            $table->string('transaction_type')->nullable();
            $table->string('transaction_from')->nullable();
            $table->text('transaction_remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
