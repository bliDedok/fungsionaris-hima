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
        Schema::create('letters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('period_id')->constrained()->cascadeOnDelete();
            $table->foreignId('letter_type_id')->constrained('letter_types')->cascadeOnDelete();

            $table->string('scope'); // INTERNAL | EXTERNAL (jadi I / II)
            $table->unsignedInteger('number_seq')->nullable();
            $table->string('number_full')->nullable()->unique();

            $table->string('title');
            $table->longText('body')->nullable();

            $table->string('to_name')->nullable();
            $table->string('to_address')->nullable();
            $table->date('letter_date')->nullable();

            $table->string('status')->default('draft'); // draft/submitted/approved/rejected/archived
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->dateTime('approved_at')->nullable();
            $table->text('rejected_reason')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letters');
    }
};
