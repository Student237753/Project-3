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
        Schema::create('DiagnosisOrgans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idDiagnosis');
            $table->unsignedBigInteger('idOrgans');
            $table->foreign('idDiagnosis')->references('id')->on('diagnosis')->onDelete('cascade');
            $table->foreign('idOrgans')->references('id')->on('organs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organs');
    }
};
