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
        Schema::create('perbaikan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('pemeliharaan_id')->nullable()
            ->constrained(
                table: 'pemeliharaan_komputer', indexName: 'perbaikan_pemeliharaan_id'
            )
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('pc_id')
            ->constrained(
                table: 'pc', indexName: 'perbaikan_pc_id'
            )
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('lab_id')
            ->constrained(
                table: 'lab', indexName: 'kerusakanLab_id'
            )
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('kerusakan');
            $table->string('keterangan')->nullable()->default('-');
            $table->date('tgl_kerusakan');
            $table->date('tgl_selesai')->nullable()->default(null);
            $table->enum('status', ['selesai', 'Dalam Perbaikan','menunggu perbaikan'])->default('menunggu perbaikan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerusakan');
    }
};
