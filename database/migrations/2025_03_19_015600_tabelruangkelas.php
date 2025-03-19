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
        Schema::create('ruangkelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guru_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('siswa_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('kelas_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};