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
        Schema::table('disbursements', function (Blueprint $table) {
            $table->unsignedBigInteger('vouch_id'); // Assuming you want to reference 'id' column of 'users' table
            $table->foreign('vouch_id')->references('id')->on('vouchreqs')->onDelete('cascade');
            $table->unsignedBigInteger('cust_id'); // Assuming you want to reference 'id' column of 'users' table
            $table->foreign('cust_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('disbursements', function (Blueprint $table) {
            $table->dropForeign(['vouch_id']);
            $table->dropColumn('vouch_id');
            $table->dropForeign(['cust_id']);
            $table->dropColumn('cust_id');
        });
    }
};
