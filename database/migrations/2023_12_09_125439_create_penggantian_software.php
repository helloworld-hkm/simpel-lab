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
        Schema::create('penggantian_software', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('perbaikan_id')
            ->constrained(
                table: 'perbaikan', indexName: 'penggantianSw_perbaikan_id'
            )
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('software_id')
            ->constrained(
                table: 'software', indexName: 'penggantian_software_id'
            )
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('pc_id')
            ->constrained(
                table: 'pc', indexName: 'penggantianSw_pc_id'
            )
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('software_lama');
            $table->string('software_baru');
            $table->dateTime('tanggal_penggantian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggantian_software');
    }
};
