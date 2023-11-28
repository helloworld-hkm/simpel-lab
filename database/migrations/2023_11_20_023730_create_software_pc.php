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
        Schema::create('software_pc', function (Blueprint $table) {
            $table->foreignId('pc_id')
            ->constrained(
                table: 'pc', indexName: 'swpc_id'
            )
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('software_id')
            ->constrained(
                table: 'software', indexName: 'software_id'
            )
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->String('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('software_pc');
    }
};
