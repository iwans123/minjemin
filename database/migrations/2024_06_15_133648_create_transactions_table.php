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
            $table->string('customer_name');
            $table->integer('customer_nip');
            $table->integer('customer_telp');
            $table->foreignId('vehicle_id');
            $table->date('date_start');
            $table->date('date_end');
            $table->enum('status_transaction', ['proses', 'ditolak', 'disetujui']);
            $table->foreignId('userLow_id');
            $table->enum('status_userLow', ['proses', 'ditolak', 'disetujui']);
            $table->foreignId('userHigh_id');
            $table->enum('status_userHigh', ['proses', 'ditolak', 'disetujui']);
            $table->string('description');
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
