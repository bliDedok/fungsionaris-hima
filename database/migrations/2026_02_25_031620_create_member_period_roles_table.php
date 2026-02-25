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
        Schema::create('member_period_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('period_id')->constrained()->cascadeOnDelete();
            $table->foreignId('member_id')->constrained()->cascadeOnDelete();
            $table->foreignId('division_id')->constrained()->cascadeOnDelete();
            $table->foreignId('position_id')->constrained()->cascadeOnDelete();

            $table->boolean('is_core')->default(false);   // inti fungsionaris (mis. BPH)
            $table->boolean('is_active')->default(true);
            $table->date('joined_at')->nullable();
            $table->timestamps();

            $table->unique(['period_id', 'member_id']); // 1 member 1 posisi utama per periode (kalau mau multi-jabatan, nanti diubah)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_period_roles');
    }
};
