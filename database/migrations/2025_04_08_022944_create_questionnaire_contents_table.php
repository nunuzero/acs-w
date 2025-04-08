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
        Schema::create('questionnaire_contents', function (Blueprint $table) {
            $table->id();
            $table->string('questionnaire'); // kuisoner yang akan dicentang oleh pengguna
            $table->string('category'); // kategori apakah kuisoner ini ringan/sedang/berat
            $table->foreignId('questionnaire_id')->constrained('questionnaires')->cascadeOnDelete(); // relasi ke tabel questionnaires
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionnaire_contents');
    }
};
