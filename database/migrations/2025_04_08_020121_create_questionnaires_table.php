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
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // nama kuesioner
            $table->integer('light_risk_requirement'); // persyaratan jumlah kuisoner tercentang untuk risiko ringan untuk dinyatakan risiko ringan
            $table->integer('medium_risk_requirement'); // persyaratan jumlah kuisoner tercentang untuk risiko sedang untuk dinyatakan risiko sedang
            $table->integer('heavy_risk_requirement'); // persyaratan jumlah kuisoner tercentang untuk risiko berat untuk dinyatakan risiko berat
            $table->text('light_risk_response'); // respon risiko ringan
            $table->text('medium_risk_response'); // respon risiko sedang
            $table->text('heavy_risk_response'); // respon risiko berat
            $table->text('unqualified_risk_response'); // respon tidak ada risiko yang terdeteksi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionnaires');
    }
};
