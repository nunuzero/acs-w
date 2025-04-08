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
        Schema::create('questionnaire_results', function (Blueprint $table) {
            // sementara seperti ini, kemungkinan akan diganti
            $table->id();
            $table->string('result'); // hasil risiko ringan/sedang/berat
            $table->foreignId('smartphone_user_id')->constrained('smartphone_users')->cascadeOnDelete(); // relasi ke tabel smartphone_users
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionnaire_results');
    }
};
