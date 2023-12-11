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
        Schema::create('aset', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('aset');
            $table->String('kondisi',16);
            // $table->String('keterangan',16);
            $table->foreignId('lab_id')
            ->constrained(
                table: 'lab', indexName: 'asetlab_id'
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
        Schema::dropIfExists('aset');
    }
};
