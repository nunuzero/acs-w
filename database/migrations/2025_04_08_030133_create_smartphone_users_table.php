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
        Schema::create('smartphone_users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // nama pengguna
            $table->string('username'); // username yang akan digunakan untuk masuk
            $table->string('address'); // alamat pengguna, sementara seperti ini, nanti akan diganti
            $table->date('birth_date'); // tanggal lahir
            $table->string('gender'); // jenis kelamin
            $table->string('whatsapp_number'); // nomor whatsapp
            $table->string('password'); // password yang akan digunakan untuk masuk
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smartphone_users');
    }
};
