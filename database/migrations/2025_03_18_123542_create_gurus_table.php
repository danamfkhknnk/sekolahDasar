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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nuptk');
            $table->enum('jk',['laki-laki','perempuan']);
            $table->string('mapel');
            $table->string('tempatlahir');
            $table->date('tanggallahir');
            $table->text('alamat');
            $table->string('fotoguru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};