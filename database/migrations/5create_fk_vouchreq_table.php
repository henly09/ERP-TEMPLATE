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
        Schema::table('vouchreqs', function (Blueprint $table) {
            $table->unsignedBigInteger('cust_id'); // Assuming you want to reference 'id' column of 'users' table
            $table->foreign('cust_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vouchreqs', function (Blueprint $table) {
            $table->dropForeign(['cust_id']);
            $table->dropColumn('cust_id');
        });
    }
};
