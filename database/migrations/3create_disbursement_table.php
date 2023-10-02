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
        Schema::create('disbursements', function (Blueprint $table) {
            $table->id();
            $table->integer('total_amount', false)->length(11);
            $table->integer('beg_bank_balance', false)->length(11);
            $table->integer('col_per_dccr', false)->length(11);
            $table->integer('dis_per_dccr', false)->length(11);
            $table->integer('bank_balance', false)->length(11);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disbursements');
    }
};
