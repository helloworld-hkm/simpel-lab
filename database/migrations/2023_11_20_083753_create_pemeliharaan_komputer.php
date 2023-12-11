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
        Schema::create('pemeliharaan_komputer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('sesi_id')
            ->constrained(
                table: 'sesi_pemeliharaan', indexName: 'sesi_pemeliharaan_id'
            )
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('pc_id')
            ->constrained(
                table: 'pc', indexName: 'pemeliharaanpc_id'
            )
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('user_id')
            ->constrained(
                table: 'users', indexName: 'pemeliharaanuser_id'
            )
            ->onUpdate('cascade');
            $table->dateTime('tanggal');
            $table->enum('perbaikan', ['butuh perbaikan', 'tidak butuh perbaikan']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeliharaan_komputer');
    }
};
