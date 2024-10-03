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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('app_id');
            $table->foreignId('doctor_id')
                      ->references('doctor_id')->on('doctors')
                      ->onDelete('cascade')
                      ->onUpdate('cascade');
            $table->foreignId('patient_id')
                      ->references('patient_id')->on('patients')
                      ->onDelete('cascade')
                      ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
