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
        Schema::create('procesos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->nullable()->constrained()->onDelete('set null');
            $table->string('entidad');
            $table->string('numero_obligacion')->nullable();
            $table->string('tipo_tramite'); // Petición Inicial, Queja ante SIC, Acción de Tutela
            $table->date('fecha_apertura');
            $table->decimal('monto_disputa', 15, 2)->nullable();
            $table->string('estado_inicial'); // En Estudio, etc.
            $table->foreignId('responsible_id')->nullable()->constrained('responsibles')->onDelete('set null');
            $table->enum('prioridad', ['ALTA', 'MEDIA', 'BAJA'])->default('MEDIA');
            $table->string('codigo_interno')->unique();
            $table->string('sla_estimado')->nullable();
            $table->string('tipo_notificacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procesos');
    }
};
