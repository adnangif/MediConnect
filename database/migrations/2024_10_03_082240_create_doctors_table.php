<?php

use App\Enums\DoctorSpecializations;
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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id('doctor_id');
            $table->foreignId('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('name');
            $table->enum('specialization', DoctorSpecializations::toArray());
            $table->string('experience')->nullable();
            $table->string('contact')->nullable();
            $table->double('fee')->nullable();
            $table->string('cur_work')->nullable();
            $table->timestamps();
            $table->boolean('is_approved')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
