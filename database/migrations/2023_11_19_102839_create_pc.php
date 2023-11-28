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
        Schema::create('pc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('no_pc');

            $table->enum('status', ['Rusak', 'Normal'])->default('Normal');
            $table->foreignId('lab_id')
            ->constrained(
                table: 'lab', indexName: 'pclab_id'
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
        Schema::dropIfExists('pc');
    }
};
