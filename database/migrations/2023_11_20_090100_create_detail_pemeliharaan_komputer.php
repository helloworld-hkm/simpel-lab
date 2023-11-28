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
        Schema::create('detail_pemeliharaan_komputer', function (Blueprint $table) {
            $table->foreignId('pemeliharaan_id')
            ->constrained(
                table: 'pemeliharaan_komputer', indexName: 'pemeliharaan_komputer_id'
            )
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('prosedur_id')
            ->constrained(
                table: 'prosedur_pemeliharaan', indexName: 'prosedur_id'
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
        Schema::dropIfExists('detail_pemeliharaan_komputer');
    }
};
