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
        Schema::create('letter_number_sequences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('period_id')->constrained()->cascadeOnDelete();

            $table->string('org_code');    // HIMAPRODI-TI
            $table->string('scope');       // INTERNAL/EXTERNAL
            $table->string('letter_code'); // SPM
            $table->unsignedTinyInteger('month'); // 1-12
            $table->unsignedSmallInteger('year'); // 2026
            $table->unsignedInteger('last_number')->default(0);

            $table->timestamps();
            $table->unique(['period_id','org_code','scope','letter_code','month','year'], 'uniq_letter_seq');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter_number_sequences');
    }
};
