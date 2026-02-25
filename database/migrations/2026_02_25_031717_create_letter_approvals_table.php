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
        Schema::create('letter_approvals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('letter_id')->constrained()->cascadeOnDelete();
            $table->unsignedSmallInteger('step')->default(1);
            $table->string('required_role')->nullable(); // ketua, dll
            $table->foreignId('acted_by')->nullable()->constrained('users')->nullOnDelete();
            $table->string('status')->default('pending'); // pending/approved/rejected
            $table->text('note')->nullable();
            $table->dateTime('acted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter_approvals');
    }
};
