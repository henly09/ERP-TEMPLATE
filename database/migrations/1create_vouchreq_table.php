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
        Schema::create('vouchreqs', function (Blueprint $table) {
            $table->id();
            $table->string('particulars');
            $table->integer('amount', false)->length(11);
            $table->string('requested_by');
            $table->string('check_by');
            $table->string('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchreqs');
    }
};
