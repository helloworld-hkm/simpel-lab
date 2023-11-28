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
        Schema::create('sesi_pemeliharaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('nama_sesi');
            $table->date('tanggal_mulai');
            $table->foreignId('lab_id')
            ->constrained(
                table: 'lab', indexName: 'sesiLab_id'
            )
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesi_pemeliharaan');
    }
};
