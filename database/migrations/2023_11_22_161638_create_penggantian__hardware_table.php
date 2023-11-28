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
        Schema::create('penggantian_hardware', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('perbaikan_id')
            ->constrained(
                table: 'perbaikan', indexName: 'penggantian_perbaikan_id'
            )
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('hardware_id')
            ->constrained(
                table: 'hardware', indexName: 'penggantian_hardware_id'
            )
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('pc_id')
            ->constrained(
                table: 'pc', indexName: 'penggantian_pc_id'
            )
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('hardware_lama');
            $table->string('hardware_baru');
            $table->date('tanggal_penggantian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggantian__hardware');
    }
};
