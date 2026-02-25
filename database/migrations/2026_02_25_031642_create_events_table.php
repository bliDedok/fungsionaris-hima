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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('period_id')->constrained()->cascadeOnDelete();

            $table->string('type'); // FUNCTIONARY_MEETING | PROGRAM_MEETING
            $table->foreignId('program_id')->nullable()->constrained()->nullOnDelete(); // wajib kalau PROGRAM_MEETING

            $table->string('title');
            $table->dateTime('start_at');
            $table->dateTime('end_at')->nullable();

            $table->boolean('only_core')->default(false); // rapat inti saja?

            $table->string('attendance_mode')->default('MANUAL'); // MANUAL | QR
            $table->string('qr_token')->nullable()->unique();
            $table->dateTime('open_from')->nullable();
            $table->dateTime('open_until')->nullable();

            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->string('location')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
