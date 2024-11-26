<?php

use App\Enums\AppointmentStatusTypes;
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
            $table->id('appointment_id');
            $table->foreignId('doctor_id')
                ->references('doctor_id')->on('doctors')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('patient_id')
                ->references('patient_id')->on('patients')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->text('message');
            $table->date('date');
            $table->enum('status', AppointmentStatusTypes::toArray())
                ->default(AppointmentStatusTypes::PENDING);
            $table->time('time');
            $table->integer('duration')->default(30 * 60);
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
