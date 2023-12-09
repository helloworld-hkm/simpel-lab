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
        Schema::create('detail_perbaikan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('perbaikan_id')->nullable()
            ->constrained(
                table: 'perbaikan', indexName: 'detail_perbaikan_id'
            )
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->enum('jenis_perbaikan', ['perbaikan lainnya', 'penggantian hardware','instal software']);
            $table->String('perbaikan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_perbaikan');
    }
};
