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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('document')->unique();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->foreignId('department_id')->constrained()->onDelete('restrict');
            $table->foreignId('municipality_id')->constrained()->onDelete('restrict');
            $table->foreignId('responsible_id')->nullable()->constrained('responsibles')->onDelete('set null');
            $table->string('initial_status');
            $table->string('bureau');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
