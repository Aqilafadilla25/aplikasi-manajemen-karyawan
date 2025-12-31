<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            // RELASI KE JABATAN
            $table->unsignedBigInteger('jabatan_id');

            $table->string('nama');
            $table->text('alamat')->nullable();
            $table->string('no_hp')->nullable();
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');

            $table->timestamps();

            // FOREIGN KEY
            $table->foreign('jabatan_id')
                ->references('id')
                ->on('jabatans')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
